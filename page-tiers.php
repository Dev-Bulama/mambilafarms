<?php
/**
 * Template Name: Investment Tiers
 * Template Post Type: page
 */
get_header();
?>

<div class="page-top">
  <div class="pb" style="background-image:url('https://images.unsplash.com/photo-1416879595882-3373a0480b5b?w=1600&q=80')">
    <div class="pbc">
      <div class="chip" style="color:var(--pk)">Grow Your Wealth</div>
      <h1 style="font-size:clamp(2rem,6vw,3.8rem);color:#fff;font-weight:600;line-height:1.1;margin-top:.4rem">Investment Tiers</h1>
      <p style="color:rgba(255,255,255,.65);max-width:440px;line-height:1.72;margin-top:.75rem;font-size:.92rem">Each cow unit is &#8358;2,000,000. Choose the tier that matches your ambition.</p>
    </div>
  </div>
  <div class="stripe"></div>
</div>

<!-- INDIVIDUAL & RETAIL TIERS -->
<section class="dots-bg" style="background:var(--sur)">
  <div class="wrap">
    <div style="text-align:center;margin-bottom:2.5rem">
      <div class="chip" style="justify-content:center">Individual &amp; Retail</div>
      <h2 class="st">Personal <em>Investment</em> Packages</h2>
      <p class="sl" style="max-width:480px;margin:0 auto;text-align:center;font-size:.9rem">Start with 5 cows. Each &#8358;2M unit = one Adamawa Gudali foundation cow plus initial infrastructure allocation.</p>
    </div>

    <div style="display:grid;grid-template-columns:1fr;gap:1.25rem">

      <!-- STARTER -->
      <div class="tc rev">
        <div class="th" style="background:var(--pklx)">
          <div class="tn" style="color:var(--pkd)">Starter</div>
          <div class="tp" style="color:var(--pkd)">&#8358;10M</div>
          <div class="tu" style="color:var(--t2)">5 Cow Units</div>
        </div>
        <div class="tb">
          <div class="tr"><span style="color:var(--t2)">5-Year Profit</span><strong style="color:var(--pkd)">&#8358;18.5M&ndash;&#8358;25.4M</strong></div>
          <div class="tr"><span style="color:var(--t2)">Annual ROI</span><strong style="color:var(--pk)">34%&ndash;57%</strong></div>
          <div class="tr"><span style="color:var(--t2)">Digital Dashboard</span><strong style="color:var(--gnd)">&#10003; Included</strong></div>
          <div class="tr"><span style="color:var(--t2)">Board Seat</span><span style="color:var(--t2)">&ndash;</span></div>
          <a href="<?php echo esc_url( home_url( '/contact/?tier=Starter' ) ); ?>" class="bp" style="margin-top:1.1rem;display:flex">Select Starter &rarr;</a>
        </div>
      </div>

      <!-- BRONZE -->
      <div class="tc rev" style="animation-delay:.06s">
        <div class="th" style="background:#f9f3e8">
          <div class="tn" style="color:#7B4A1A">Bronze</div>
          <div class="tp" style="color:#7B4A1A">&#8358;20M</div>
          <div class="tu" style="color:#a07040">10 Cow Units</div>
        </div>
        <div class="tb">
          <div class="tr"><span style="color:var(--t2)">5-Year Profit</span><strong style="color:var(--pkd)">&#8358;37M&ndash;&#8358;50.9M</strong></div>
          <div class="tr"><span style="color:var(--t2)">Annual ROI</span><strong style="color:var(--pk)">34%&ndash;57%</strong></div>
          <div class="tr"><span style="color:var(--t2)">Digital Dashboard</span><strong style="color:var(--gnd)">&#10003; Included</strong></div>
          <div class="tr"><span style="color:var(--t2)">Board Seat</span><span style="color:var(--t2)">&ndash;</span></div>
          <a href="<?php echo esc_url( home_url( '/contact/?tier=Bronze' ) ); ?>" class="bp" style="margin-top:1.1rem;display:flex">Select Bronze &rarr;</a>
        </div>
      </div>

      <!-- SILVER (featured) -->
      <div class="tc feat rev" style="animation-delay:.12s">
        <div style="background:linear-gradient(135deg,var(--pkd),var(--pk));padding:.38rem;text-align:center"><span style="font-size:.65rem;color:#fff;font-weight:800;letter-spacing:.08em;text-transform:uppercase">&#11088; Most Popular</span></div>
        <div class="th" style="background:linear-gradient(155deg,var(--pkd),var(--pk))">
          <div class="tn" style="color:#fff">Silver</div>
          <div class="tp" style="color:#fff">&#8358;50M</div>
          <div class="tu" style="color:rgba(255,255,255,.62)">25 Cow Units</div>
        </div>
        <div class="tb">
          <div class="tr"><span style="color:var(--t2)">5-Year Profit</span><strong style="color:var(--pkd)">&#8358;92.3M&ndash;&#8358;127M</strong></div>
          <div class="tr"><span style="color:var(--t2)">Annual ROI</span><strong style="color:var(--pk)">40%&ndash;65%</strong></div>
          <div class="tr"><span style="color:var(--t2)">Digital Dashboard</span><strong style="color:var(--gnd)">&#10003; Included</strong></div>
          <div class="tr"><span style="color:var(--t2)">Board Seat</span><span style="color:var(--t2)">&ndash;</span></div>
          <a href="<?php echo esc_url( home_url( '/contact/?tier=Silver' ) ); ?>" class="bp" style="margin-top:1.1rem;display:flex;background:var(--pkd)">Select Silver &rarr;</a>
        </div>
      </div>

      <!-- GOLD -->
      <div class="tc rev" style="animation-delay:.18s">
        <div class="th" style="background:#fefce8">
          <div class="tn" style="color:#856404">Gold</div>
          <div class="tp" style="color:#856404">&#8358;100M</div>
          <div class="tu" style="color:#a08030">50 Cow Units</div>
        </div>
        <div class="tb">
          <div class="tr"><span style="color:var(--t2)">5-Year Profit</span><strong style="color:var(--pkd)">&#8358;184.5M&ndash;&#8358;254M</strong></div>
          <div class="tr"><span style="color:var(--t2)">Annual ROI</span><strong style="color:var(--pk)">57%&ndash;80%</strong></div>
          <div class="tr"><span style="color:var(--t2)">Digital Dashboard</span><strong style="color:var(--gnd)">&#10003; Included</strong></div>
          <div class="tr"><span style="color:var(--t2)">Board Seat</span><span style="color:var(--t2)">&ndash;</span></div>
          <a href="<?php echo esc_url( home_url( '/contact/?tier=Gold' ) ); ?>" class="bp" style="margin-top:1.1rem;display:flex">Select Gold &rarr;</a>
        </div>
      </div>

      <!-- PLATINUM -->
      <div class="tc rev" style="animation-delay:.24s">
        <div class="th" style="background:var(--gnl)">
          <div class="tn" style="color:var(--gnd)">Platinum</div>
          <div class="tp" style="color:var(--gnd)">&#8358;200M</div>
          <div class="tu" style="color:var(--gnd);opacity:.7">100 Cow Units</div>
        </div>
        <div class="tb">
          <div class="tr"><span style="color:var(--t2)">5-Year Returns</span><strong style="color:var(--pkd)">&#8358;369M&ndash;&#8358;508.8M</strong></div>
          <div class="tr"><span style="color:var(--t2)">Annual ROI</span><strong style="color:var(--gnd)">200%&ndash;250%</strong></div>
          <div class="tr"><span style="color:var(--t2)">Digital Dashboard</span><strong style="color:var(--gnd)">&#10003; Included</strong></div>
          <div class="tr"><span style="color:var(--t2)">Board Seat</span><strong style="color:var(--gnd)">&#10003; Eligible</strong></div>
          <a href="<?php echo esc_url( home_url( '/contact/?tier=Platinum' ) ); ?>" class="bpg" style="margin-top:1.1rem;display:flex">Select Platinum &rarr;</a>
        </div>
      </div>

      <!-- DIAMOND -->
      <div class="tc rev" style="background:linear-gradient(155deg,var(--ink),#2A0520);border-color:var(--pk);animation-delay:.3s">
        <div class="th">
          <div class="tn" style="color:var(--pk)">&#x1F48E; Diamond</div>
          <div class="tp" style="color:#fff">&#8358;1B+</div>
          <div class="tu" style="color:rgba(255,255,255,.42)">500+ Cow Units</div>
        </div>
        <div class="tb" style="border-top-color:rgba(255,84,135,.2)">
          <div class="tr" style="border-bottom-color:rgba(255,84,135,.12)"><span style="color:rgba(255,255,255,.5)">5-Year Returns</span><strong style="color:var(--pk)">&#8358;1.85B+</strong></div>
          <div class="tr" style="border-bottom-color:rgba(255,84,135,.12)"><span style="color:rgba(255,255,255,.5)">Annual ROI</span><strong style="color:var(--pk)">250%&ndash;300%</strong></div>
          <div class="tr" style="border-bottom-color:rgba(255,84,135,.12)"><span style="color:rgba(255,255,255,.5)">Digital Dashboard</span><strong style="color:var(--gn)">&#10003; Included</strong></div>
          <div class="tr" style="border-bottom-color:rgba(255,84,135,.12)"><span style="color:rgba(255,255,255,.5)">Board Seat</span><strong style="color:var(--gn)">&#10003; Guaranteed</strong></div>
          <a href="<?php echo esc_url( home_url( '/contact/?tier=Diamond' ) ); ?>" style="margin-top:1.1rem;display:flex;background:var(--pk);color:#fff;padding:.88rem 1.6rem;border-radius:10px;font-weight:700;font-size:.88rem;align-items:center;justify-content:center;gap:.45rem;box-shadow:0 5px 18px rgba(255,84,135,.4)">Enquire About Diamond &rarr;</a>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- INSTITUTIONAL TABLE -->
<section style="background:#fff">
  <div class="wrap">
    <div style="text-align:center;margin-bottom:2.25rem">
      <div class="chipg" style="justify-content:center">Institutional</div>
      <h2 class="st">Corporate &amp; <em class="gn">Institutional</em> Packages</h2>
    </div>
    <div class="tw rev">
      <table>
        <thead>
          <tr>
            <th>Package</th>
            <th>Investment Range</th>
            <th>Focus Area</th>
            <th>5-Yr ROI</th>
            <th style="text-align:center">Board Seat</th>
          </tr>
        </thead>
        <tbody>
          <tr><td style="font-weight:700;color:var(--pkd)">Starter</td><td>&#8358;50M&ndash;&#8358;250M</td><td>Herd acquisition</td><td style="font-weight:700;color:var(--pk)">40%&ndash;60%</td><td style="text-align:center;color:var(--t2)">&ndash;</td></tr>
          <tr><td style="font-weight:700;color:var(--pkd)">Silver</td><td>&#8358;250M&ndash;&#8358;1B</td><td>AI centers, vet clinics</td><td style="font-weight:700;color:var(--pk)">80%&ndash;120%</td><td style="text-align:center;color:var(--t2)">&ndash;</td></tr>
          <tr><td style="font-weight:700;color:var(--pkd)">Gold</td><td>&#8358;1B&ndash;&#8358;5B</td><td>Feedlots, branded beef</td><td style="font-weight:700;color:var(--pk)">150%&ndash;200%</td><td style="text-align:center;color:var(--t2)">&ndash;</td></tr>
          <tr><td style="font-weight:700;color:var(--gnd)">Platinum</td><td>&#8358;5B&ndash;&#8358;20B</td><td>Infrastructure, exports</td><td style="font-weight:700;color:var(--gnd)">200%&ndash;250%</td><td style="text-align:center;font-weight:700;color:var(--gnd)">&#10003;</td></tr>
          <tr style="background:var(--pklx)"><td style="font-weight:800;color:var(--pk)">&#x1F48E; Diamond</td><td>&#8358;20B+</td><td>Anchor &mdash; all divisions</td><td style="font-weight:700;color:var(--pk)">250%&ndash;300%</td><td style="text-align:center;font-weight:800;color:var(--pk)">&#10003; Guaranteed</td></tr>
        </tbody>
      </table>
    </div>
    <div style="text-align:center;margin-top:1.75rem">
      <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="bp" style="display:inline-flex;width:auto">Discuss Institutional Packages &rarr;</a>
    </div>
  </div>
</section>

<!-- EXIT STRATEGY -->
<section style="background:var(--pklx)">
  <div class="wrap">
    <div style="text-align:center;margin-bottom:2.5rem">
      <div class="chip" style="justify-content:center">Exit Strategy</div>
      <h2 class="st">Your <em>Exit</em> Options</h2>
    </div>
    <div style="display:grid;grid-template-columns:1fr 1fr;gap:1rem">
      <div class="card rev" style="padding:1.35rem;border-top:4px solid #ccc"><div style="font-weight:700;color:var(--pkd);font-size:.9rem;margin-bottom:.2rem">Year 1&ndash;2</div><span class="tag-pk" style="margin-bottom:.65rem;display:inline-block">Lock-In Period</span><p class="sl" style="font-size:.82rem;line-height:1.65">Capital actively deployed for herd acquisition and infrastructure. No exit available.</p></div>
      <div class="card rev" style="padding:1.35rem;border-top:4px solid var(--gn);animation-delay:.08s"><div style="font-weight:700;color:var(--pkd);font-size:.9rem;margin-bottom:.2rem">Year 3</div><span class="tag-gn" style="margin-bottom:.65rem;display:inline-block">Secondary Transfer</span><p class="sl" style="font-size:.82rem;line-height:1.65">Transfer units to an approved party. 2% fee. Distributions also begin this year.</p></div>
      <div class="card rev" style="padding:1.35rem;border-top:4px solid var(--pk);animation-delay:.16s"><div style="font-weight:700;color:var(--pkd);font-size:.9rem;margin-bottom:.2rem">Year 5</div><span class="tag-pk" style="margin-bottom:.65rem;display:inline-block">Full Settlement</span><p class="sl" style="font-size:.82rem;line-height:1.65">Full principal and profit distribution executed. Clean, complete exit for all subscribers.</p></div>
      <div class="dcard rev" style="padding:1.35rem;animation-delay:.24s"><div style="font-weight:700;color:var(--pk);font-size:.9rem;margin-bottom:.2rem">Post Year 5</div><span style="display:inline-block;background:rgba(141,198,63,.2);color:var(--gn);padding:.2rem .65rem;border-radius:100px;font-size:.66rem;font-weight:700;letter-spacing:.06em;text-transform:uppercase;margin-bottom:.65rem">Reinvestment</span><p style="font-size:.82rem;color:rgba(255,255,255,.55);line-height:1.65">Roll returns into Phase 2 across Northern Nigeria. Compound further.</p></div>
    </div>
  </div>
</section>
<div class="stripe"></div>

<?php get_footer(); ?>
