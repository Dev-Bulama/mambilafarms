@extends('layouts.public')
@php
$page = 'home';
try {
  $heroEyebrow = \App\Models\Setting::get('site_hero_eyebrow', "Nigeria's Cattle Revolution");
  $heroTitle   = \App\Models\Setting::get('site_hero_title', 'Build Lasting Wealth Through Livestock');
  $heroBody    = \App\Models\Setting::get('site_hero_body', 'Join a structured 5-year cattle investment programme delivering 34–300% returns, backed by an SPV legal structure, livestock insurance and quarterly reporting.');

  $stats = [];
  $statDefaults = [
    ['1M','Head of Cattle','var(--pk)'],
    ['57%','Annual Returns','var(--gn)'],
    ['50K+','Jobs Created','var(--pk)'],
    ['₦5T','GDP Contribution','var(--gn)'],
    ['5yrs','Investment Horizon','var(--pk)'],
  ];
  for ($si = 1; $si <= 5; $si++) {
    $stats[] = [
      \App\Models\Setting::get('home_stat_'.$si.'_num',   $statDefaults[$si-1][0]),
      \App\Models\Setting::get('home_stat_'.$si.'_label', $statDefaults[$si-1][1]),
      $statDefaults[$si-1][2],
    ];
  }

  $pillars = [];
  $pillarDefaults = [
    ['🥛','Dairy & Artisan Products','Fresh milk, yogurt, artisan cheese, butter and ghee from Friesian crossbreeds. Premium pricing, year-round demand.','Quarterly payouts from Year 3'],
    ['🥩','Premium Beef & Abattoir','Feedlot-finished premium cuts, branded packaging and ECOWAS regional export through a modern certified abattoir.','Event payouts from Year 3'],
    ['🧬','AI Breeding Stock','F1 crossbreeds (Friesian × Simmental × Gudali) sold to smallholder farmers and government programmes nationwide.','Proportionate share from Year 3'],
  ];
  for ($pi = 1; $pi <= 3; $pi++) {
    $pillars[] = [
      \App\Models\Setting::get('home_pillar_'.$pi.'_icon',  $pillarDefaults[$pi-1][0]),
      \App\Models\Setting::get('home_pillar_'.$pi.'_title', $pillarDefaults[$pi-1][1]),
      \App\Models\Setting::get('home_pillar_'.$pi.'_body',  $pillarDefaults[$pi-1][2]),
      \App\Models\Setting::get('home_pillar_'.$pi.'_tag',   $pillarDefaults[$pi-1][3]),
    ];
  }

  $whyChip    = \App\Models\Setting::get('home_why_chip', 'Why Mambilla');
  $whyHeading = \App\Models\Setting::get('home_why_heading', 'A Structured Pathway to Agricultural Wealth');
  $whyBody    = \App\Models\Setting::get('home_why_body', "The Mambilla Plateau—Nigeria's highest grassland—offers optimal conditions: cool climate, vast water resources, rich pasture and government-backed agricultural zones, giving our herd a natural competitive advantage.");
  $whyStat    = \App\Models\Setting::get('home_why_stat', '57%');

  $ctaHeading = \App\Models\Setting::get('home_cta_heading', 'Ready to Build Your Legacy?');
  $ctaBody    = \App\Models\Setting::get('home_cta_body', 'Complete the subscription form and our team will contact you within 24 hours.');

  // Hero slide images — Nigerian cattle defaults, overridable via admin CMS
  $slideDefaultUrls = [
    'https://images.unsplash.com/photo-1500595046743-cd271d694d30?w=1600&q=80',
    'https://images.unsplash.com/photo-1548550023-2bdb3c5beed7?w=1600&q=80',
    'https://images.unsplash.com/photo-1535591273668-578e31182c4f?w=1600&q=80',
    'https://images.unsplash.com/photo-1527153818091-1a9638521e2a?w=1600&q=80',
    'https://images.unsplash.com/photo-1560493676-04071c5f467b?w=1600&q=80',
  ];
  $slideImages = [];
  for ($si = 1; $si <= 5; $si++) {
    $stored = \App\Models\Setting::get('hero_home_slide_'.$si);
    $slideImages[] = $stored ? asset('storage/'.$stored) : $slideDefaultUrls[$si-1];
  }
} catch (\Exception $e) {
  $heroEyebrow = "Nigeria's Cattle Revolution";
  $heroTitle   = 'Build Lasting Wealth Through Livestock';
  $heroBody    = 'Join a structured 5-year cattle investment programme delivering 34–300% returns, backed by an SPV legal structure, livestock insurance and quarterly reporting.';
  $stats = [['1M','Head of Cattle','var(--pk)'],['57%','Annual Returns','var(--gn)'],['50K+','Jobs Created','var(--pk)'],['₦5T','GDP Contribution','var(--gn)'],['5yrs','Investment Horizon','var(--pk)']];
  $pillars = [
    ['🥛','Dairy & Artisan Products','Fresh milk, yogurt, artisan cheese, butter and ghee from Friesian crossbreeds. Premium pricing, year-round demand.','Quarterly payouts from Year 3'],
    ['🥩','Premium Beef & Abattoir','Feedlot-finished premium cuts, branded packaging and ECOWAS regional export through a modern certified abattoir.','Event payouts from Year 3'],
    ['🧬','AI Breeding Stock','F1 crossbreeds (Friesian × Simmental × Gudali) sold to smallholder farmers and government programmes nationwide.','Proportionate share from Year 3'],
  ];
  $whyChip = 'Why Mambilla'; $whyHeading = 'A Structured Pathway to Agricultural Wealth';
  $whyBody = "The Mambilla Plateau—Nigeria's highest grassland—offers optimal conditions.";
  $whyStat = '57%'; $ctaHeading = 'Ready to Build Your Legacy?';
  $ctaBody = 'Complete the subscription form and our team will contact you within 24 hours.';
  $slideDefaultUrls = [
    'https://images.unsplash.com/photo-1500595046743-cd271d694d30?w=1600&q=80',
    'https://images.unsplash.com/photo-1548550023-2bdb3c5beed7?w=1600&q=80',
    'https://images.unsplash.com/photo-1535591273668-578e31182c4f?w=1600&q=80',
    'https://images.unsplash.com/photo-1527153818091-1a9638521e2a?w=1600&q=80',
    'https://images.unsplash.com/photo-1560493676-04071c5f467b?w=1600&q=80',
  ];
  $slideImages = $slideDefaultUrls;
}
@endphp
@section('title', 'Mambilla Legacy Farms — Invest in Nigeria\'s Cattle Revolution')

@section('hero')
<div class="hero">
  @foreach($slideImages as $si => $sUrl)
  <div class="slide{{ $si === 0 ? ' on' : '' }}" style="background-image:url('{{ $sUrl }}')"></div>
  @endforeach

  <div class="hc">
    <div class="eye"><i></i>{{ $heroEyebrow }}</div>
    <h1 class="h1">{{ $heroTitle }}</h1>
    <div class="rule"></div>
    <p class="hp">{{ $heroBody }}</p>
    <div class="ha">
      <a href="{{ route('invest') }}" class="bp">Start Investing Today →</a>
      <a href="{{ route('tiers') }}" class="bg">View Tiers</a>
    </div>
  </div>

  <div class="sdnav" id="hdots">
    <button class="sd on" onclick="gs(0)"></button>
    <button class="sd" onclick="gs(1)"></button>
    <button class="sd" onclick="gs(2)"></button>
    <button class="sd" onclick="gs(3)"></button>
    <button class="sd" onclick="gs(4)"></button>
  </div>

  <div class="hstats">
    @foreach($stats as [$snum,$slabel,$scolor])
    <div class="hs"><div class="hsn" style="color:{{ $scolor }}">{{ $snum }}</div><div class="hsl">{{ $slabel }}</div></div>
    @endforeach
  </div>
</div>
@endsection

@section('content')

<!-- THREE PILLARS -->
<section style="background:#fff">
  <div class="wrap">
    <div style="text-align:center;margin-bottom:2.5rem">
      <div class="chip">Revenue Streams</div>
      <h2 class="st">Three Pillars of <em>Sustainable Returns</em></h2>
    </div>
    <div class="g3">
      @foreach($pillars as [$picon,$ptitle,$pbody,$ptag])
      <div class="rev pillar-card">
        <div class="pillar-icon">{{ $picon }}</div>
        <h3>{{ $ptitle }}</h3>
        <p>{{ $pbody }}</p>
        <div class="pillar-tag">{{ $ptag }}</div>
      </div>
      @endforeach
    </div>
  </div>
</section>

<!-- WHY INVEST -->
<section class="dots-bg" style="background:var(--ink)">
  <div class="wrap">
    <div class="g2">
      <div class="revl">
        <div class="chip" style="color:var(--pk)">{{ $whyChip }}</div>
        <h2 class="st" style="color:#fff">{{ $whyHeading }}</h2>
        <p style="color:rgba(255,255,255,.6);line-height:1.85;margin:1rem 0 1.4rem">{{ $whyBody }}</p>
        <a href="{{ route('about') }}" class="bo">Learn About the Programme →</a>
      </div>
      <div class="revr" style="position:relative">
        <div style="border-radius:18px;overflow:hidden;aspect-ratio:4/3">
          <img src="https://images.unsplash.com/photo-1493962853295-0fd70327578a?w=800&q=80" alt="Nigerian Gudali cattle" style="width:100%;height:100%;object-fit:cover"/>
        </div>
        <div style="position:absolute;bottom:-1rem;right:-1rem;background:linear-gradient(135deg,var(--pkd),var(--pk));border-radius:14px;padding:1rem 1.2rem;text-align:center;box-shadow:0 8px 28px rgba(255,84,135,.35)">
          <div style="font-size:1.8rem;font-weight:800;color:#fff;font-family:'Cormorant Garamond',serif">{{ $whyStat }}</div>
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
      <h2 class="st" style="color:#fff">Choose Your <em>Investment Level</em></h2>
      <p style="color:rgba(255,255,255,.5);max-width:440px;margin:.75rem auto 0;line-height:1.8;font-size:.9rem">Every tier includes livestock insurance, digital dashboard, and quarterly reports.</p>
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
        <div style="font-family:'Cormorant Garamond',serif;color:{{ $popular ? 'var(--pk)' : 'rgba(255,255,255,.5)' }};font-size:.88rem;margin-bottom:.2rem">{{ $name }}</div>
        <div style="font-family:'Cormorant Garamond',serif;color:#fff;font-size:1.6rem;font-weight:600">{{ $amt }}</div>
        <div style="font-size:.65rem;color:rgba(255,255,255,.35);margin-top:.2rem">{{ $desc }}</div>
      </a>
      @endforeach
      <a href="{{ route('invest') }}?tier=Platinum"
         style="background:rgba(141,198,63,.12);border:1px solid rgba(141,198,63,.3);border-radius:14px;padding:1.1rem;text-align:center;display:block;grid-column:span 2;text-decoration:none">
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
      <h2 class="st">Your Investment, <em>Protected</em></h2>
    </div>
    <div class="g3">
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
<section style="background:linear-gradient(135deg,var(--pkd),var(--pk));text-align:center">
  <div style="max-width:520px;margin:0 auto">
    <h2 style="font-size:clamp(1.5rem,4vw,2.2rem);color:#fff;margin-bottom:.75rem">{{ $ctaHeading }}</h2>
    <p style="color:rgba(255,255,255,.78);line-height:1.8;margin-bottom:1.5rem">{{ $ctaBody }}</p>
    <a href="{{ route('invest') }}" style="display:inline-block;background:#fff;color:var(--pkd);padding:.9rem 2rem;border-radius:10px;font-weight:700;text-decoration:none;font-size:.95rem">Fill Subscription Form →</a>
  </div>
</section>

@endsection

@push('scripts')
<script>
let cur = 0;
const slides = document.querySelectorAll('.slide');
const dots   = document.querySelectorAll('.sd');
function gs(n){
  slides[cur].classList.remove('on'); dots[cur].classList.remove('on');
  cur = n;
  slides[cur].classList.add('on');  dots[cur].classList.add('on');
}
setInterval(() => gs((cur + 1) % slides.length), 5000);
</script>
@endpush
