@extends('layouts.public')
@php $page = 'home'; @endphp
@section('title', 'Mambilla Legacy Farms — Invest in Nigeria\'s Cattle Revolution')

@section('hero')
<section class="hero-wrap">
  <div class="hero" style="margin-top:0">
    <div class="slide s0 on"></div>
    <div class="slide s1"></div>
    <div class="slide s2"></div>
    <div class="slide s3"></div>
    <div class="slide s4"></div>
    <div class="hero-overlay"></div>
    <div class="hero-content">
      <div class="chip">Nigeria's Cattle Revolution</div>
      <h1>Build Lasting Wealth<br><em>Through Livestock</em></h1>
      <p>Join a structured 5-year cattle investment programme delivering 34–300% returns, backed by an SPV legal structure, livestock insurance and quarterly reporting.</p>
      <div class="hero-cta">
        <a href="{{ route('invest') }}" class="bp">Start Investing Today →</a>
        <a href="{{ route('tiers') }}" class="bg">View Tiers</a>
      </div>
    </div>
    <div class="hero-dots" id="hdots">
      <button class="hd on" onclick="gs(0)"></button>
      <button class="hd" onclick="gs(1)"></button>
      <button class="hd" onclick="gs(2)"></button>
      <button class="hd" onclick="gs(3)"></button>
      <button class="hd" onclick="gs(4)"></button>
    </div>
  </div>
  <div class="hstats">
    <div class="hs"><div class="hsn">1M</div><div class="hsl">Head of Cattle</div></div>
    <div class="hs"><div class="hsn" style="color:var(--gn)">57%</div><div class="hsl">Annual Returns</div></div>
    <div class="hs"><div class="hsn">50K+</div><div class="hsl">Jobs Created</div></div>
    <div class="hs"><div class="hsn" style="color:var(--gn)">₦5T</div><div class="hsl">GDP Contribution</div></div>
    <div class="hs"><div class="hsn">5yrs</div><div class="hsl">Investment Horizon</div></div>
  </div>
</section>
@endsection

@section('content')
<!-- THREE PILLARS -->
<section style="background:#fff">
  <div class="wrap">
    <div style="text-align:center;margin-bottom:2.5rem">
      <div class="chip">Revenue Streams</div>
      <h2 style="font-size:clamp(1.7rem,4vw,2.6rem);margin-top:.4rem">Three Pillars of <em>Sustainable Returns</em></h2>
    </div>
    <div class="three-grid">
      <div class="rev pillar-card">
        <div class="pillar-icon">🥛</div>
        <h3>Dairy &amp; Artisan Products</h3>
        <p>Fresh milk, yogurt, artisan cheese, butter and ghee from Friesian crossbreeds. Premium pricing, year-round demand.</p>
        <div class="pillar-tag">Quarterly payouts from Year 3</div>
      </div>
      <div class="rev pillar-card" style="--delay:.1s">
        <div class="pillar-icon">🥩</div>
        <h3>Premium Beef &amp; Abattoir</h3>
        <p>Feedlot-finished premium cuts, branded packaging and ECOWAS regional export through a modern certified abattoir.</p>
        <div class="pillar-tag">Event payouts from Year 3</div>
      </div>
      <div class="rev pillar-card" style="--delay:.2s">
        <div class="pillar-icon">🧬</div>
        <h3>AI Breeding Stock</h3>
        <p>F1 crossbreeds (Friesian × Simmental × Gudali) sold to smallholder farmers and government programmes nationwide.</p>
        <div class="pillar-tag">Proportionate share from Year 3</div>
      </div>
    </div>
  </div>
</section>

<!-- WHY INVEST -->
<section class="dots-bg" style="background:var(--ink)">
  <div class="wrap">
    <div style="display:grid;grid-template-columns:1fr;gap:2rem;align-items:center" class="two-col">
      <div class="revl">
        <div class="chip" style="color:var(--pk)">Why Mambilla</div>
        <h2 style="font-size:clamp(1.6rem,4vw,2.4rem);color:#fff;margin-top:.4rem">A Structured Pathway to <em style="color:var(--pk)">Agricultural Wealth</em></h2>
        <p style="color:rgba(255,255,255,.6);line-height:1.85;margin:1rem 0">The Mambilla Plateau—Nigeria's highest grassland—offers optimal conditions: cool climate, vast water resources, rich pasture and government-backed agricultural zones, giving our herd a natural competitive advantage.</p>
        <a href="{{ route('about') }}" class="bo">Learn About the Programme →</a>
      </div>
      <div class="revr" style="position:relative">
        <div style="border-radius:18px;overflow:hidden;aspect-ratio:4/3">
          <img src="https://images.unsplash.com/photo-1500595046743-cd271d694d30?w=800&q=80" alt="Cattle herd" style="width:100%;height:100%;object-fit:cover"/>
        </div>
        <div style="position:absolute;bottom:-1rem;right:-1rem;background:linear-gradient(135deg,var(--pkd),var(--pk));border-radius:14px;padding:1rem 1.2rem;text-align:center;box-shadow:0 8px 28px rgba(255,84,135,.35)">
          <div style="font-size:1.8rem;font-weight:800;color:#fff;font-family:'Cormorant Garamond',serif">57%</div>
          <div style="font-size:.7rem;color:rgba(255,255,255,.7);text-transform:uppercase;letter-spacing:.08em">Annual Returns</div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- TIERS PREVIEW -->
<section class="dots-bg" style="background:var(--ink)">
  <div class="wrap">
    <div style="text-align:center;margin-bottom:2rem">
      <div class="chip" style="color:var(--pk)">Investment Tiers</div>
      <h2 style="font-size:clamp(1.6rem,4vw,2.4rem);color:#fff;margin-top:.4rem">Choose Your <em>Investment Level</em></h2>
      <p style="color:rgba(255,255,255,.55);max-width:440px;margin:.75rem auto;line-height:1.8;font-size:.9rem">Every tier includes livestock insurance, digital dashboard, and quarterly reports.</p>
    </div>
    <div style="display:grid;grid-template-columns:1fr 1fr;gap:.85rem;margin-bottom:2rem">
      @foreach([
        ['Starter','₦10M','5 cows · 34–57% p.a.',false],
        ['Bronze','₦20M','10 cows · 34–57% p.a.',false],
        ['Silver','₦50M','25 cows · 40–65% p.a.',true],
        ['Gold','₦100M','50 cows · 57–80% p.a.',false],
      ] as [$name,$amt,$desc,$popular])
      <a href="{{ route('invest') }}?tier={{ $name }}"
         style="background:{{ $popular ? 'rgba(255,84,135,.2)' : 'rgba(255,255,255,.06)' }};border:{{ $popular ? '2px solid var(--pk)' : '1px solid rgba(255,84,135,.15)' }};border-radius:14px;padding:1.1rem;text-align:center;display:block;position:relative;text-decoration:none">
        @if($popular)
          <div style="position:absolute;top:-.55rem;left:50%;transform:translateX(-50%);background:var(--pk);color:#fff;font-size:.58rem;font-weight:800;padding:.15rem .65rem;border-radius:100px;letter-spacing:.06em;text-transform:uppercase;white-space:nowrap">⭐ Most Popular</div>
        @endif
        <div style="font-family:'Cormorant Garamond',serif;color:{{ $popular ? 'var(--pk)' : 'rgba(255,255,255,.48)' }};font-size:.88rem;margin-bottom:.2rem">{{ $name }}</div>
        <div style="font-family:'Cormorant Garamond',serif;color:#fff;font-size:1.6rem;font-weight:600">{{ $amt }}</div>
        <div style="font-size:.65rem;color:rgba(255,255,255,.35);margin-top:.2rem">{{ $desc }}</div>
      </a>
      @endforeach
      <a href="{{ route('invest') }}?tier=Platinum"
         style="background:rgba(141,198,63,.12);border:1px solid rgba(141,198,63,.3);border-radius:14px;padding:1.1rem;text-align:center;cursor:pointer;display:block;grid-column:span 2;text-decoration:none">
        <div style="font-family:'Cormorant Garamond',serif;color:var(--gn);font-size:.88rem;margin-bottom:.2rem">Platinum</div>
        <div style="font-family:'Cormorant Garamond',serif;color:#fff;font-size:1.6rem;font-weight:600">₦200M</div>
        <div style="font-size:.65rem;color:rgba(255,255,255,.4);margin-top:.2rem">100 cows · 200–250% over 5 years</div>
      </a>
    </div>
    <a href="{{ route('tiers') }}" class="bp" style="display:flex;justify-content:center">View All Tiers &amp; Start Investing →</a>
  </div>
</section>

<!-- PROTECTIONS -->
<section style="background:var(--pklx)">
  <div class="wrap">
    <div style="text-align:center;margin-bottom:2rem">
      <div class="chip">Investor Protection</div>
      <h2 style="font-size:clamp(1.6rem,4vw,2.4rem);margin-top:.4rem">Your Investment, <em>Protected</em></h2>
    </div>
    <div class="prot-grid">
      @foreach([
        ['🏛️','SPV Legal Structure','Ring-fenced assets under a Special Purpose Vehicle registered in Nigeria.'],
        ['🛡️','Livestock Insurance','Full herd coverage against mortality, disease and natural disasters.'],
        ['📊','Quarterly Reports','Detailed financial reports every quarter — no surprises.'],
        ['📱','Real-time Dashboard','Live visibility into your herd metrics and financials.'],
        ['🔍','Annual Audit','Independent audit by accredited Nigerian accounting firms.'],
        ['📡','RFID Tracking','Every animal tagged and tracked from allotment to settlement.'],
      ] as [$icon,$title,$desc])
      <div class="rev prot-card">
        <div class="prot-icon">{{ $icon }}</div>
        <h4>{{ $title }}</h4>
        <p>{{ $desc }}</p>
      </div>
      @endforeach
    </div>
  </div>
</section>

<!-- CTA BANNER -->
<section style="background:linear-gradient(135deg,var(--pkd),var(--pk));padding:3rem 1rem;text-align:center">
  <div style="max-width:520px;margin:0 auto">
    <h2 style="font-size:clamp(1.5rem,4vw,2.2rem);color:#fff;margin-bottom:.75rem">Ready to Build Your <em>Legacy?</em></h2>
    <p style="color:rgba(255,255,255,.75);line-height:1.8;margin-bottom:1.5rem">Complete the subscription form and our team will contact you within 24 hours.</p>
    <a href="{{ route('invest') }}" style="display:inline-block;background:#fff;color:var(--pkd);padding:.85rem 2rem;border-radius:10px;font-weight:700;text-decoration:none;font-size:.95rem">Fill Subscription Form →</a>
  </div>
</section>
@endsection

@push('scripts')
<script>
// Hero slider
let cur=0;
const slides=document.querySelectorAll('.slide');
const dots=document.querySelectorAll('.hd');
function gs(n){
  slides[cur].classList.remove('on');dots[cur].classList.remove('on');
  cur=n;slides[cur].classList.add('on');dots[cur].classList.add('on');
}
setInterval(()=>gs((cur+1)%slides.length),5000);
</script>
@endpush
