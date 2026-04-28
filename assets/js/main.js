/* Mambilla Legacy Farms — WordPress Theme JS */

// Mobile menu toggle
function tmob() {
  var btn  = document.querySelector('.hbg');
  var menu = document.querySelector('.mob-menu');
  if (!btn || !menu) return;
  btn.classList.toggle('open');
  menu.classList.toggle('open');
  document.body.style.overflow = menu.classList.contains('open') ? 'hidden' : '';
}

function closeMob() {
  var btn  = document.querySelector('.hbg');
  var menu = document.querySelector('.mob-menu');
  if (btn)  btn.classList.remove('open');
  if (menu) menu.classList.remove('open');
  document.body.style.overflow = '';
}

// Close mobile menu when a link inside it is tapped
document.addEventListener('DOMContentLoaded', function () {
  var menu = document.querySelector('.mob-menu');
  if (menu) {
    menu.querySelectorAll('a').forEach(function (a) {
      a.addEventListener('click', closeMob);
    });
  }
});

// Nav scroll effect — transparent when at very top of page
(function () {
  var n = document.getElementById('nav');
  if (!n) return;
  function tick() {
    n.classList.toggle('top', window.scrollY < 50);
  }
  window.addEventListener('scroll', tick, { passive: true });
  tick(); // run once on load
})();

// Scroll-reveal animations (IntersectionObserver)
function rv() {
  var els = document.querySelectorAll('.rev,.revl,.revr');
  if (!els.length) return;
  var ob = new IntersectionObserver(function (entries) {
    entries.forEach(function (e) {
      if (e.isIntersecting) {
        e.target.classList.add('v');
        ob.unobserve(e.target);
      }
    });
  }, { threshold: 0.1, rootMargin: '0px 0px -30px 0px' });
  els.forEach(function (el) {
    el.classList.remove('v');
    ob.observe(el);
  });
}
document.addEventListener('DOMContentLoaded', rv);
