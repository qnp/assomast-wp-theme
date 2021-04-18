(() => {
  // MOUSE
  const root = document.documentElement;
  root.addEventListener('mousemove', e => {
    root.style.setProperty('--mouse-x', e.clientX + 'px');
    root.style.setProperty('--mouse-y', e.clientY + 'px');
  });

  // NAV
  const navElement = document.querySelector('#menu');
  function setNavClass() {
    if (window.scrollY > 10) {
      navElement.classList.add('nav--plain');
    } else {
      navElement.classList.remove('nav--plain');
    }
  }
  window.addEventListener('scroll', e => {
    setNavClass();
  });
  setNavClass();

  // LOGO
  const logoElement = document.querySelector('.logo');
  logoElement.addEventListener('mouseenter', e => {
    if (
      [1, 2, 3].some(i => logoElement.classList.contains('logo--animate-' + i))
    ) {
      return;
    }
    logoElement.classList.add('logo--animate-1');
    setTimeout(() => {
      logoElement.classList.add('logo--animate-2');
      setTimeout(() => {
        logoElement.classList.add('logo--animate-3');
        setTimeout(() => {
          logoElement.classList.remove('logo--animate-1');
          logoElement.classList.remove('logo--animate-2');
          logoElement.classList.remove('logo--animate-3');
        }, 750);
      }, 10);
    }, 4000);
  });
})();
