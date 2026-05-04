/* Mambilla Legacy Farms — shared JS */

// Mobile menu
function tmob(){
  const btn=document.querySelector('.hbg');
  const menu=document.querySelector('.mob-menu');
  if(!btn||!menu)return;
  btn.classList.toggle('open');
  menu.classList.toggle('open');
  document.body.style.overflow=menu.classList.contains('open')?'hidden':'';
}
function closeMob(){
  const btn=document.querySelector('.hbg');
  const menu=document.querySelector('.mob-menu');
  if(btn)btn.classList.remove('open');
  if(menu)menu.classList.remove('open');
  document.body.style.overflow='';
}

// Nav scroll effect — transparent only on homepage
const _isHome=document.body.dataset.page==='home';
if(!_isHome){
  const _n=document.getElementById('nav');
  if(_n)_n.classList.remove('top');
}
window.addEventListener('scroll',()=>{
  if(!_isHome)return;
  const n=document.getElementById('nav');
  if(!n)return;
  n.classList.toggle('top',window.scrollY<50);
},{passive:true});

// Scroll reveals
function rv(){
  const els=document.querySelectorAll('.rev,.revl,.revr');
  if(!els.length)return;
  const ob=new IntersectionObserver(entries=>{
    entries.forEach(e=>{if(e.isIntersecting){e.target.classList.add('v');ob.unobserve(e.target)}});
  },{threshold:.1,rootMargin:'0px 0px -30px 0px'});
  els.forEach(el=>{el.classList.remove('v');ob.observe(el)});
}
document.addEventListener('DOMContentLoaded',rv);

// Mark active nav link
(function(){
  const page=document.body.dataset.page;
  document.querySelectorAll('[data-p]').forEach(a=>{
    a.classList.toggle('on',a.dataset.p===page);
  });
})();
