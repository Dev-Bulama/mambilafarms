<?php
/**
 * Template Name: Start Investing
 * Template Post Type: page
 */
get_header();
?>

<div class="page-top">
  <div class="pb" style="background-image:url('https://images.unsplash.com/photo-1567201080580-bfcc97dae346?w=1600&q=80')">
    <div class="pbc">
      <div class="chip" style="color:var(--pk)">Get Involved</div>
      <h1 style="font-size:clamp(2rem,6vw,3.8rem);color:#fff;font-weight:600;line-height:1.1;margin-top:.4rem">Start Investing</h1>
      <p style="color:rgba(255,255,255,.65);max-width:420px;line-height:1.72;margin-top:.75rem;font-size:.92rem">Complete the subscription form below. Our team responds within 24 hours.</p>
    </div>
  </div>
  <div class="stripe"></div>
</div>

<section class="dots-bg" style="background:var(--pklx)">
  <div class="wrap">

    <!-- CONTACT CARDS -->
    <div style="display:grid;grid-template-columns:1fr 1fr;gap:.85rem;margin-bottom:2rem">
      <div style="background:linear-gradient(135deg,var(--pkd),var(--pk));border-radius:14px;padding:1.1rem;display:flex;flex-direction:column;gap:.35rem">
        <div style="font-size:.62rem;font-weight:700;color:rgba(255,255,255,.55);text-transform:uppercase;letter-spacing:.08em">Email</div>
        <div style="font-size:.82rem;color:#fff;font-weight:600;word-break:break-all">invest@legacyfarms.ng</div>
      </div>
      <div style="background:var(--ink);border-radius:14px;padding:1.1rem;display:flex;flex-direction:column;gap:.35rem">
        <div style="font-size:.62rem;font-weight:700;color:rgba(255,255,255,.38);text-transform:uppercase;letter-spacing:.08em">Location</div>
        <div style="font-size:.82rem;color:rgba(255,255,255,.75);font-weight:500;line-height:1.4">Mambilla Plateau, Taraba State</div>
      </div>
    </div>

    <!-- FORM + SIDEBAR LAYOUT -->
    <div style="display:grid;grid-template-columns:1fr;gap:2rem" id="form-layout">

      <!-- SUBSCRIPTION FORM -->
      <div style="background:#fff;border-radius:20px;padding:1.75rem;box-shadow:0 5px 32px rgba(255,84,135,.1)">
        <div style="display:flex;align-items:center;gap:.85rem;margin-bottom:1.75rem;padding-bottom:1.25rem;border-bottom:1.5px solid var(--pkl)">
          <div style="width:42px;height:42px;background:linear-gradient(135deg,var(--pkd),var(--pk));border-radius:10px;display:grid;place-items:center;font-size:1.1rem;flex-shrink:0">&#x1F4CB;</div>
          <div><h2 style="font-size:1.3rem;margin-bottom:.1rem">Subscription Form</h2><p style="font-size:.74rem;color:var(--t2)">Mambilla Legacy Farms &middot; V1.0 &middot; Ref: LF/SUB/____</p></div>
        </div>

        <form id="sf" onsubmit="fs(event)" novalidate>

          <!-- PART 1: PERSONAL INFO -->
          <div style="background:var(--pkl);border-radius:9px;padding:.72rem 1rem;margin-bottom:1.25rem"><span style="font-weight:700;font-size:.67rem;letter-spacing:.1em;text-transform:uppercase;color:var(--pkd)">Part 1 &mdash; Personal Information</span></div>
          <div class="form-grid">
            <div class="fi"><label>Full Legal Name *</label><input type="text" id="fn" placeholder="As on your ID" required/></div>
            <div class="fi"><label>Date of Birth *</label><input type="date" id="fd" required/></div>
            <div class="fi"><label>BVN / RC Number *</label><input type="text" id="fb" placeholder="Bank Verification Number"/></div>
            <div class="fi"><label>Tax ID (TIN)</label><input type="text" id="ft2" placeholder="Optional"/></div>
            <div class="fi"><label>Primary Phone *</label><input type="tel" id="fp" placeholder="+234 xxx xxx xxxx" required/></div>
            <div class="fi"><label>Alternate Phone</label><input type="tel" id="fp2" placeholder="+234 xxx xxx xxxx"/></div>
          </div>
          <div class="fi"><label>Email Address *</label><input type="email" id="fe" placeholder="you@example.com" required/></div>
          <div class="fi"><label>Residential / Registered Address *</label><input type="text" id="fa" placeholder="Street Address" required/></div>
          <div class="form-grid">
            <div class="fi"><label>City / State</label><input type="text" id="fc" placeholder="Lagos, Lagos State"/></div>
            <div class="fi"><label>Country *</label><input type="text" id="fco" placeholder="Nigeria" required/></div>
          </div>
          <div class="fi">
            <label>Preferred Communication</label>
            <div class="comm-row">
              <label><input type="checkbox" style="accent-color:var(--pk)"/> Email</label>
              <label><input type="checkbox" style="accent-color:var(--pk)"/> Phone</label>
              <label><input type="checkbox" style="accent-color:var(--pk)"/> WhatsApp</label>
              <label><input type="checkbox" style="accent-color:var(--pk)"/> SMS</label>
            </div>
          </div>
          <div class="fi">
            <label>Type of Investor *</label>
            <select id="fit" required>
              <option value="">Select investor type...</option>
              <option>Individual Investor</option>
              <option>Corporate or Institutional Investor</option>
              <option>Joint Investor</option>
              <option>Foreign Investor</option>
              <option>Diaspora Investor</option>
            </select>
          </div>

          <!-- PART 2: SUBSCRIPTION DETAILS -->
          <div style="background:var(--pkl);border-radius:9px;padding:.72rem 1rem;margin:1.5rem 0 1.25rem"><span style="font-weight:700;font-size:.67rem;letter-spacing:.1em;text-transform:uppercase;color:var(--pkd)">Part 2 &mdash; Subscription Details</span></div>
          <div class="fi">
            <label>Select Investment Tier *</label>
            <select id="ftier" required onchange="tgc(this.value)">
              <option value="">Choose your tier...</option>
              <option value="Starter">Starter &mdash; &#8358;10M (5 cows) &middot; 34&ndash;57% p.a.</option>
              <option value="Bronze">Bronze &mdash; &#8358;20M (10 cows) &middot; 34&ndash;57% p.a.</option>
              <option value="Silver">Silver &mdash; &#8358;50M (25 cows) &middot; 40&ndash;65% p.a.</option>
              <option value="Gold">Gold &mdash; &#8358;100M (50 cows) &middot; 57&ndash;80% p.a.</option>
              <option value="Platinum">Platinum &mdash; &#8358;200M (100 cows) &middot; 200&ndash;250%</option>
              <option value="Diamond">Diamond &mdash; &#8358;1B+ (500+ cows) &middot; 250&ndash;300%</option>
              <option value="Custom">Custom Amount</option>
            </select>
          </div>
          <div class="fi" id="caf" style="display:none">
            <label>Custom Amount (&#8358;)</label>
            <input type="text" id="fca" placeholder="e.g. 30,000,000 for 15 cows"/>
          </div>
          <div class="fi">
            <label>Preferred Payment Method</label>
            <select id="fpm">
              <option>Bank Transfer</option>
              <option>RTGS</option>
              <option>Cheque</option>
              <option>Other</option>
            </select>
          </div>
          <div class="fi">
            <label>Additional Notes</label>
            <textarea id="fno" placeholder="Any questions or special instructions for our team..."></textarea>
          </div>

          <!-- PART 3: DECLARATIONS -->
          <div style="background:var(--pkl);border-radius:9px;padding:.72rem 1rem;margin:1.5rem 0 1.1rem"><span style="font-weight:700;font-size:.67rem;letter-spacing:.1em;text-transform:uppercase;color:var(--pkd)">Part 3 &mdash; Declarations</span></div>
          <div class="cr"><input type="checkbox" id="d1" required/><label for="d1" style="cursor:pointer">I have reviewed the Mambilla Legacy Farms Business Plan and understand projected returns are estimates, not guaranteed.</label></div>
          <div class="cr"><input type="checkbox" id="d2" required/><label for="d2" style="cursor:pointer">I confirm investment funds are from lawful sources and I can commit capital for the full 5-year horizon.</label></div>
          <div class="cr"><input type="checkbox" id="d3" required/><label for="d3" style="cursor:pointer">I agree to be contacted by the Mambilla Legacy Farms investor relations team regarding this subscription.</label></div>

          <button type="submit" class="bp" style="margin-top:1.4rem;font-size:.9rem">Submit Subscription Request &rarr;</button>
          <p style="font-size:.74rem;color:var(--t2);text-align:center;margin-top:.65rem">We respond within 24 hours &middot; invest@legacyfarms.ng</p>
        </form>
      </div>

      <!-- SIDEBAR -->
      <div style="display:flex;flex-direction:column;gap:1.1rem">
        <div style="background:linear-gradient(135deg,var(--pkd),var(--pk));border-radius:16px;padding:1.4rem">
          <h4 style="font-size:.7rem;font-weight:700;color:rgba(255,255,255,.5);text-transform:uppercase;letter-spacing:.08em;font-family:'Plus Jakarta Sans',sans-serif;margin-bottom:1rem">Investor Protections</h4>
          <div style="display:flex;flex-direction:column;gap:.42rem;font-size:.84rem;color:rgba(255,255,255,.82)">
            <span>&#x2705; SPV legal structure (Nigeria)</span>
            <span>&#x2705; Livestock insurance included</span>
            <span>&#x2705; Quarterly financial reports</span>
            <span>&#x2705; Real-time digital dashboard</span>
            <span>&#x2705; Annual independent audit</span>
            <span>&#x2705; RFID herd tracking</span>
            <span>&#x2705; Pre-emptive rights on new tranches</span>
          </div>
        </div>
        <div style="background:#fff;border-radius:16px;padding:1.4rem;border-top:3px solid var(--pk);box-shadow:0 3px 18px rgba(255,84,135,.07)">
          <h4 style="font-size:.7rem;font-weight:700;color:var(--pkd);text-transform:uppercase;letter-spacing:.08em;font-family:'Plus Jakarta Sans',sans-serif;margin-bottom:1rem">&#x1F4B0; Payment Tranches</h4>
          <div style="font-size:.84rem;color:var(--t1);display:flex;flex-direction:column;gap:.42rem">
            <div style="display:flex;justify-content:space-between;padding:.38rem 0;border-bottom:1px solid var(--pkl)"><span>Tranche 1 &mdash; On signing</span><strong style="color:var(--pkd)">50%</strong></div>
            <div style="display:flex;justify-content:space-between;padding:.38rem 0;border-bottom:1px solid var(--pkl)"><span>Tranche 2 &mdash; 60 days</span><strong style="color:var(--pkd)">30%</strong></div>
            <div style="display:flex;justify-content:space-between;padding:.38rem 0"><span>Tranche 3 &mdash; 90 days</span><strong style="color:var(--pkd)">20%</strong></div>
          </div>
          <div style="margin-top:.8rem;padding:.65rem;background:var(--pklx);border-radius:9px;font-size:.74rem;color:var(--t2);line-height:1.55">Pay to: <strong style="color:var(--pkd)">Mambilla Legacy Farms</strong><br/>Ref: LF / [Your Name] / [Tier]</div>
        </div>
      </div>

    </div><!-- /#form-layout -->
  </div>
</section>
<div class="stripe"></div>

<!-- SUCCESS MODAL -->
<div class="ov" id="modal">
  <div class="mo">
    <div style="font-size:2.5rem;margin-bottom:.9rem">&#x1F404;</div>
    <h3 style="font-size:1.4rem;color:var(--pkd);margin-bottom:.65rem">Submission Received!</h3>
    <p style="color:var(--t2);line-height:1.75;margin-bottom:1.4rem;font-size:.88rem">Thank you for your interest in Mambilla Legacy Farms. Our team will contact you at <strong id="cmail" style="color:var(--pkd)"></strong> within 24 hours with your reference number and onboarding details.</p>
    <button class="bp" onclick="document.getElementById('modal').classList.remove('open')">Close</button>
  </div>
</div>

<script>
// Responsive sidebar (sticky on desktop)
(function(){
  function layout(){
    var fl=document.getElementById('form-layout');
    if(!fl)return;
    if(window.innerWidth>=960){
      fl.style.gridTemplateColumns='2fr 1fr';
      var sidebar=fl.children[1];
      sidebar.style.position='sticky';
      sidebar.style.top='112px';
      sidebar.style.alignSelf='start';
    } else {
      fl.style.gridTemplateColumns='1fr';
      var sidebar=fl.children[1];
      sidebar.style.position='';
      sidebar.style.top='';
    }
  }
  window.addEventListener('resize',layout,{passive:true});
  layout();
})();

// Pre-fill tier from URL query param ?tier=Silver
(function(){
  var p=new URLSearchParams(window.location.search);
  var t=p.get('tier');
  if(!t)return;
  var s=document.getElementById('ftier');
  if(!s)return;
  Array.from(s.options).forEach(function(o){
    if(o.value===t){ s.value=t; tgc(t); }
  });
})();

function tgc(v){
  document.getElementById('caf').style.display=(v==='Custom')?'block':'none';
}

function fs(e){
  e.preventDefault();
  var f=e.target;
  var required=f.querySelectorAll('[required]');
  var ok=true;
  required.forEach(function(el){
    if(!el.checkValidity()){
      ok=false;
      el.style.borderColor='var(--pkd)';
      el.addEventListener('input',function(){ el.style.borderColor=''; },{once:true});
    }
  });
  if(!ok)return;
  var emailEl=document.getElementById('fe');
  document.getElementById('cmail').textContent=emailEl?emailEl.value:'your email';
  document.getElementById('modal').classList.add('open');
  f.reset();
}
</script>

<?php get_footer(); ?>
