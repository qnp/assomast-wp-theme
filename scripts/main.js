(() => {
  // avoid orphans
  document.querySelectorAll('h1, h2, h3, h4, h5, h6').forEach(element => {
    const arr = element.textContent.split(' ');
    let repl = element.textContent.replace(/ ([^ ]*)$/, '&nbsp$1');
    if (arr.slice(Math.max(arr.length - 3, 1)).join(' ').length < 15) {
      repl = repl.replace(/ ([^ ]*)$/, '&nbsp$1');
    }
    element.innerHTML = repl;
  });

  // MOUSE
  const root = document.documentElement;
  root.addEventListener('mousemove', e => {
    root.style.setProperty('--mouse-x', e.clientX + 'px');
    root.style.setProperty('--mouse-y', e.clientY + 'px');
  });

  // NAV
  const navElement = document.querySelector('#menu');
  function scrollHandler() {
    if (window.scrollY > 1) {
      navElement.classList.add('nav--plain');
    } else {
      navElement.classList.remove('nav--plain');
    }
    if (window.scrollY > document.body.scrollHeight - window.innerHeight - 10) {
      document.querySelector('html').classList.add('bottom');
    } else {
      document.querySelector('html').classList.remove('bottom');
    }
    const opacity = 1 - window.scrollY / (window.innerHeight / 2);
    document.querySelector('.scroll-discover').style.opacity = opacity;
    const containerTop = document.querySelector('#container').offsetTop;
    if (window.scrollY > containerTop) {
      navElement.classList.add('nav--at-container');
    } else {
      navElement.classList.remove('nav--at-container');
    }
  }
  window.addEventListener('scroll', e => {
    scrollHandler();
  });
  scrollHandler();

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

  // HERO
  jQuery('.scroll-discover').on('click', () => {
    var container = jQuery('#container');
    jQuery('html, body').animate({ scrollTop: container.offset().top - 160 });
  });
})();
