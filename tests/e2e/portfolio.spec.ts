import { expect, test } from '@playwright/test';

test('la navigation mène de l’accueil à la page d’un projet', async ({ page }) => {
	await page.goto('/');
	await page.getByRole('link', { name: 'Voir mes projets' }).click();

	await expect(page).toHaveURL(/\/Pages\/MesProjets\.php$/);
	const portfolioCard = page.locator('[data-project-list] .project-card').filter({
		has: page.getByRole('heading', { name: 'Portfolio personnel' }),
	});
	await portfolioCard.click();

	await expect(page).toHaveURL(/\/Pages\/portfolio-personnel\.php$/);
	await expect(page.getByRole('heading', { level: 1, name: 'Portfolio personnel' })).toBeVisible();
});

test('le filtre technologie affiche les projets correspondants et peut être effacé', async ({ page }) => {
	await page.goto('/Pages/MesProjets.php');

	const technologySearch = page.getByRole('combobox', { name: 'Filtrer les projets par technologie' });
	await technologySearch.fill('Python');
	await page.getByRole('option', { name: 'Python', exact: true }).click();

	const projectCards = page.locator('[data-project-list] .project-card');
	await expect(projectCards.filter({ has: page.getByRole('heading', { name: 'Bot discord' }) })).toBeVisible();
	await expect(projectCards.filter({ has: page.getByRole('heading', { name: 'Portfolio personnel' }) })).toBeHidden();
	await expect(page.locator('[data-project-status]')).toHaveText('1 projet trouvé');

	await page.getByRole('button', { name: 'Effacer le filtre' }).click();
	await expect(projectCards).toHaveCount(3);
	await expect(page.locator('[data-project-status]')).toHaveText('3 projets trouvés');
});

test('les onglets de compétences changent de panneau', async ({ page }) => {
	await page.goto('/');

	const backendTab = page.getByRole('tab', { name: /Développement backend/ });
	await backendTab.click();

	await expect(backendTab).toHaveAttribute('aria-selected', 'true');
	await expect(page.getByRole('tabpanel', { name: /Développement backend/ })).toBeVisible();
	await expect(page.getByRole('button', { name: 'Voir un exemple PHP et Symfony' })).toBeVisible();
});