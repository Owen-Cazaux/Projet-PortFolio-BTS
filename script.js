document.addEventListener('DOMContentLoaded', () => {
  const body = document.body;
  const switchButton = document.querySelector('.header-switch');
  const navLinks = document.querySelectorAll('.nav a');

  if (!switchButton) return;

  switchButton.addEventListener('click', () => {
    const isOpen = body.classList.toggle('sidebar-open');
    switchButton.setAttribute('aria-expanded', String(isOpen));
  });

  navLinks.forEach((link) => {
    link.addEventListener('click', () => {
      body.classList.remove('sidebar-open');
      switchButton.setAttribute('aria-expanded', 'false');
    });
  });
});
