(() => {
  const root = document.documentElement;
  const navElement = document.querySelector('#menu');

  root.addEventListener('mousemove', e => {
    root.style.setProperty('--mouse-x', e.clientX + 'px');
    root.style.setProperty('--mouse-y', e.clientY + 'px');
  });

  window.addEventListener('scroll', e => {
    if (window.scrollY > 10) {
      navElement.classList.add('nav--plain');
    } else {
      navElement.classList.remove('nav--plain');
    }
  });
})();
