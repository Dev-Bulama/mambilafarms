/* shared-components.js — injects top-bar, nav, mob-menu, footer */
(function(){
  const page=document.body.dataset.page||'home';
  const links=[
    {p:'home',label:'Home',href:'index.html'},
    {p:'about',label:'About',href:'about.html'},
    {p:'wd',label:'What We Do',href:'whatwedo.html'},
    {p:'ti',label:'Invest',href:'tiers.html'},
    {p:'ct',label:'Contact',href:'contact.html'},
  ];
  function li(d,mobile){
    return links.map(l=>`<a href="${l.href}" data-p="${l.p}" class="${l.p===page?'on':''}">${l.label}</a>`).join('')
      +(mobile?`<a href="contact.html" class="cta-mob">→ Start Investing Now</a>`:`<a href="contact.html" class="cta-nav">Start Investing →</a>`);
  }

  // TOP BAR
  const bar=document.createElement('div');
  bar.className='top-bar';
  bar.innerHTML=`<span>A SAB Foundation Initiative</span><span class="top-dot"></span><span>Promoted by Successory Nigeria Ltd</span><span class="top-dot"></span><span>Technical Partner: Farm Alert Ltd</span>`;
  document.body.prepend(bar);

  // NAV
  const nav=document.createElement('nav');
  nav.id='nav';
  nav.innerHTML=`
  <div class="ni">
    <a class="logo" href="index.html">
      <div class="le">MLF</div>
      <div><div class="ln">Mambilla Legacy Farms</div><div class="ls">SAB Foundation · Mambilla Plateau</div></div>
    </a>
    <div class="nl">${li(links,false)}</div>
    <div class="hbg" onclick="tmob()"><span></span><span></span><span></span></div>
  </div>`;
  bar.after(nav);

  // MOBILE MENU
  const mob=document.createElement('div');
  mob.className='mob-menu';
  mob.innerHTML=li(links,true);
  nav.after(mob);

  // FOOTER
  const ft=document.querySelector('footer.site-footer');
  if(ft){
    ft.innerHTML=`
    <div class="wrap">
      <div class="footer-grid">
        <div>
          <div class="ftl" style="margin-bottom:.25rem">Mambilla Legacy Farms</div>
          <div style="font-size:.68rem;color:var(--pk);font-weight:600;letter-spacing:.06em;text-transform:uppercase;margin-bottom:.9rem">A SAB Foundation Initiative · ...Touching Lives</div>
          <p style="font-size:.82rem;line-height:1.8;color:rgba(255,255,255,.38);max-width:240px;margin-bottom:1rem">Transforming Nigeria's livestock sector from the cool highlands of the Mambilla Plateau, Taraba State.</p>
          <div style="font-size:.72rem;color:rgba(255,255,255,.22);line-height:1.8">Promoter: SAB Foundation<br>Technical: Farm Alert Ltd<br>BD Partner: Successory Nigeria Ltd</div>
        </div>
        <div>
          <h5>Navigate</h5>
          <a href="index.html">Home</a><a href="about.html">About Us</a>
          <a href="whatwedo.html">What We Do</a><a href="tiers.html">Investment Tiers</a>
          <a href="contact.html">Contact & Invest</a>
        </div>
        <div>
          <h5>Invest</h5>
          <a href="tiers.html">Starter – ₦10M</a><a href="tiers.html">Bronze – ₦20M</a>
          <a href="tiers.html">Silver – ₦50M</a><a href="tiers.html">Gold – ₦100M</a>
          <a href="tiers.html">Platinum – ₦200M</a><a href="tiers.html">Diamond – ₦1B+</a>
        </div>
        <div>
          <h5>Contact</h5>
          <div style="font-size:.82rem;color:rgba(255,255,255,.38);line-height:2">📧 invest@legacyfarms.ng<br>🌐 www.legacyfarms.ng<br>📍 Mambilla Plateau,<br>&nbsp;&nbsp;Taraba State, Nigeria</div>
        </div>
      </div>
      <div style="height:1px;background:rgba(255,84,135,.12);margin-bottom:1.25rem"></div>
      <div style="display:flex;flex-wrap:wrap;justify-content:space-between;gap:.75rem">
        <span style="font-size:.73rem;color:rgba(255,255,255,.22)">© 2025 Mambilla Legacy Farms · SAB Foundation · All rights reserved</span>
        <span style="font-size:.7rem;color:rgba(255,255,255,.15)">1M Cattle · 50K+ Jobs · ₦4–5T GDP</span>
      </div>
    </div>`;
  }

  // init nav scroll state
  const n=document.getElementById('nav');
  if(n&&window.scrollY<50)n.classList.add('top');
})();
