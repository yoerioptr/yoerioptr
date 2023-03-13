((Drupal) => {
  Drupal.behaviors.sidebarToggle = {
    attach: () => {
      window.addEventListener('resize', () => {
        document.querySelector('.app').classList.add('collapsed');
      });

      const element = document.querySelector('.app .toggle');
      element.addEventListener('click', () => {
        document.querySelector('.app').classList.toggle('collapsed');
      });
    }
  };
})(Drupal)
