<?php

use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

final class PortfolioPagesTest extends TestCase
{
    private const PROJECT_ROOT = __DIR__ . '/..';

    public static function pageRoutes(): array
    {
        return [
            'home' => ['index.php', 'Owen'],
            'projects' => ['Pages/MesProjets.php', 'Mes projets'],
            'contact' => ['Pages/Contact.php', 'Parlons de votre projet'],
            'personal portfolio' => ['Pages/portfolio-personnel.php', 'Portfolio personnel'],
            'Discord bot' => ['Pages/bot-discord.php', 'Bot Discord'],
            'UI/UX redesign' => ['Pages/refonte-ui-ux.php', 'Refonte UI/UX'],
        ];
    }

    #[DataProvider('pageRoutes')]
    public function testPagesRenderWithSharedResources(string $route, string $expectedHeading): void
    {
        $html = $this->renderPage($route);
        $basePath = str_starts_with($route, 'Pages/') ? '..' : '.';

        self::assertStringContainsString($expectedHeading, $html);
        self::assertStringContainsString('href="' . $basePath . '/css/style.css"', $html);
        self::assertStringContainsString('src="' . $basePath . '/js/script.js"', $html);
        self::assertStringContainsString($basePath . '/assets/images/lamp-toggle-on.png', $html);
        self::assertStringContainsString($basePath . '/assets/images/palette-dark.png', $html);
        self::assertStringContainsString('class="site-footer"', $html);

        if (str_contains($route, 'portfolio-personnel.php') || str_contains($route, 'bot-discord.php') || str_contains($route, 'refonte-ui-ux.php')) {
            self::assertStringContainsString('class="project-gallery"', $html);
            self::assertSame(2, substr_count($html, 'class="project-shot__placeholder"'));
            self::assertStringContainsString('class="project-shot__image"', $html);
            self::assertStringContainsString('Ce que j’ai fait', $html);
        }

        foreach ([
            'brush-dark.png',
            'brush-dark@2x.png',
            'brush-light.png',
            'brush-light@2x.png',
            'lamp-toggle-off.png',
            'lamp-toggle-on.png',
            'palette-dark.png',
            'palette-light.png',
        ] as $asset) {
            self::assertFileExists(self::PROJECT_ROOT . '/assets/images/' . $asset);
        }

        $stylesheet = file_get_contents(self::PROJECT_ROOT . '/css/style.css');
        self::assertNotFalse($stylesheet);
        foreach (['brush-dark.png', 'brush-dark@2x.png', 'brush-light.png', 'brush-light@2x.png'] as $asset) {
            self::assertStringContainsString('../assets/images/' . $asset, $stylesheet);
        }
    }

    public function testPaletteHasEightUniqueColorsAndSideSelectors(): void
    {
        $header = file_get_contents(self::PROJECT_ROOT . '/HTML-components/header.php');
        self::assertNotFalse($header);

        preg_match_all('/<button[^>]*data-paint="([^"]+)"[^>]*style="([^"]+)"[^>]*>/s', $header, $matches, PREG_SET_ORDER);
        self::assertCount(8, $matches);

        $paintNames = array_column($matches, 1);
        self::assertCount(8, array_unique($paintNames));

        $sidePositions = [];
        foreach ($matches as $match) {
            if (!in_array($match[1], ['rose-poudre', 'bleu-glacier'], true)) {
                continue;
            }

            preg_match('/--swatch-x:\s*([\d.]+)%/', $match[2], $xMatch);
            self::assertNotEmpty($xMatch);
            $sidePositions[$match[1]] = (float) $xMatch[1];
        }

        self::assertLessThan(30, $sidePositions['rose-poudre']);
        self::assertGreaterThan(80, $sidePositions['bleu-glacier']);
    }

    public function testProjectCardsLinkToDedicatedPagesFromBothLists(): void
    {
        $home = $this->renderPage('index.php');
        $projects = $this->renderPage('Pages/MesProjets.php');

        $projectRoutes = [
            'portfolio-personnel.php' => [
                '2026',
                'Portfolio personnel',
                'Une vitrine web personnelle pour présenter mon profil, mes compétences et mes projets.',
                'HTML',
                'CSS',
                'JS',
                'PHP',
            ],
            'bot-discord.php' => [
                '2026',
                'Bot discord',
                "Création de commandes dans le but de facilité l'assignation de rôles discord à de grand nombre d'utilisateur.",
                'Python',
                'Discord.py',
            ],
            'refonte-ui-ux.php' => [
                '2026',
                'Refonte UI/UX',
                "Dashboard unique et d'un projet interne d'entreprise",
                'Symfony',
                'Vue',
                'Tailwind/CSS',
                'Twig',
            ],
        ];

        foreach ($projectRoutes as $route => $projectInfo) {
            self::assertStringContainsString('href="Pages/' . $route . '"', $home);
            self::assertStringContainsString('href="' . $route . '"', $projects);
            self::assertFileExists(self::PROJECT_ROOT . '/Pages/' . $route);

            foreach ($projectInfo as $info) {
                self::assertStringContainsString($info, $home);
                self::assertStringContainsString($info, $projects);
            }
        }
    }

    private function renderPage(string $route): string
    {
        $previousScriptName = $_SERVER['SCRIPT_NAME'] ?? null;
        $_SERVER['SCRIPT_NAME'] = '/' . $route;

        ob_start();
        try {
            include self::PROJECT_ROOT . '/' . $route;
            return (string) ob_get_contents();
        } finally {
            ob_end_clean();
            if ($previousScriptName === null) {
                unset($_SERVER['SCRIPT_NAME']);
            } else {
                $_SERVER['SCRIPT_NAME'] = $previousScriptName;
            }
        }
    }
}