/// <reference types="node" />
import { defineConfig } from '@playwright/test';
import { env } from 'node:process';

export default defineConfig({
  testDir: './tests/e2e',
  timeout: 30_000,
  retries: env.CI ? 1 : 0,
  reporter: env.CI ? [['github'], ['html', { open: 'never' }]] : [['list'], ['html', { open: 'never' }]],
  use: {
    baseURL: env.E2E_BASE_URL || 'http://127.0.0.1:8000',
    trace: 'on-first-retry',
    screenshot: 'only-on-failure',
    video: 'retain-on-failure',
  },
  webServer: {
    command: 'php -S 127.0.0.1:8000 -t .',
    url: 'http://127.0.0.1:8000',
    reuseExistingServer: !env.CI,
    timeout: 60_000,
  },
});