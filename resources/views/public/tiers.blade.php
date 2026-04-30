@extends('layouts.public')
@php
$page = 'tiers';
try {
  $heroTitle     = \App\Models\Setting::get('tiers_hero_title', 'Investment Tiers');
  $heroSub       = \App\Models\Setting::get('tiers_hero_sub', 'Six structured tiers from ₦10M to ₦1B+. Every tier includes insurance, dashboard access and quarterly reporting.');
  $secHeading    = \App\Models\Setting::get('tiers_section_heading', 'Choose Your Investment Level');
  $secSub        = \App\Models\Setting::get('tiers_section_sub', 'Every tier includes livestock insurance, digital dashboard, and quarterly reports.');
} catch (\Exception $e) {
  $heroTitle = 'Investment Tiers';
  $heroSub   = 'Six structured tiers from ₦10M to ₦1B+. Every tier includes insurance, dashboard access and quarterly reporting.';
  $secHeading = 'Choose Your Investment Level';
  $secSub = 'Every tier includes livestock insurance, digital dashboard, and quarterly reports.';
}
@endphp
@section('title', 'Investment Tiers — Mambilla Legacy Farms')

@section('hero')
<div class="page-top">
  <div class="pb" style="background-image:url('https://images.unsplash.com/photo-1500595046743-cd271d694d30?w=1600&q=80')">
    <div class="pbc">
      <div class="chip" style="color:var(--pk)">Investment Options</div>
      <h1 style="font-size:clamp(2rem,6vw,3.8rem);color:#fff;font-weight:600;line-height:1.1;margin-top:.4rem">{{ $heroTitle }}</h1>
      <p style="color:rgba(255,255,255,.65);max-width:440px;line-height:1.72;margin-top:.75rem;font-size:.92rem">{{ $heroSub }}</p>
    </div>
  </div>
  <div class="stripe"></div>
</div>
@endsection

@section('content')

<section style="background:var(--pklx)">
  <div class="wrap">
    <div style="text-align:center;margin-bottom:2.5rem">
      <div class="chip">Individual Tiers</div>
      <h2 class="st">{{ $secHeading }}</h2>
      @if($secSub)<p style="color:var(--t2,#666);max-width:480px;margin:.6rem auto 0;line-height:1.75;font-size:.9rem">{{ $secSub }}</p>@endif
    </div>

    <div class="g3">
      @foreach([
        ['Starter',  '₦10,000,000',   '5',    '34–57%',   '₦18.5M–₦25.4M', false, 'var(--pk)'],
        ['Bronze',   '₦20,000,000',   '10',   '34–57%',   '₦37M–₦50.9M',   false, 'var(--pk)'],
        ['Silver',   '₦50,000,000',   '25',   '40–65%',   '₦92.3M–₦127M',  true,  'var(--pk)'],
        ['Gold',     '₦100,000,000',  '50',   '57–80%',   '₦184.5M–₦254M', false, 'var(--pkd)'],
        ['Platinum', '₦200,000,000',  '100',  '200–250%', '₦400M–₦500M',   false, 'var(--gn)'],
        ['Diamond',  '₦1,000,000,000+','500+','250–300%', '₦2.5B–₦3B+',    false, 'var(--gn)'],
      ] as [$name,$amt,$cows,$roi,$profit,$popular,$color])
      <div class="rev tc {{ $popular ? 'feat' : '' }}" style="position:relative">
        @if($popular)
          <div style="position:absolute;top:-.55rem;left:50%;transform:translateX(-50%);background:var(--pk);color:#fff;font-size:.58rem;font-weight:800;padding:.18rem .7rem;border-radius:100px;letter-spacing:.06em;text-transform:uppercase;white-space:nowrap;z-index:2">⭐ Most Popular</div>
        @endif
        <div class="th">
          <div class="tn" style="color:{{ $color }}">{{ $name }}</div>
          <div class="tp">{{ $amt }}</div>
          <div class="sl" style="font-size:.8rem;margin-top:.2rem">{{ $cows }} cattle &nbsp;·&nbsp; {{ $roi }} p.a.</div>
        </div>
        <div class="tb">
          <div class="tr"><span>5-yr Profit Range</span><strong>{{ $profit }}</strong></div>
          <div class="tr"><span>Dashboard Access</span><strong style="color:var(--gnd)">✓ Included</strong></div>
          <div class="tr"><span>Livestock Insurance</span><strong style="color:var(--gnd)">✓ Included</strong></div>
          <div class="tr"><span>Quarterly Reports</span><strong style="color:var(--gnd)">✓ Included</strong></div>
          @if(in_array($name, ['Platinum','Diamond']))
          <div class="tr"><span>Board Seat Eligible</span><strong style="color:var(--gnd)">✓ Yes</strong></div>
          @endif
          <a href="{{ route('invest') }}?tier={{ $name }}"
             class="{{ $popular ? 'bp' : 'bo' }}"
             style="margin-top:1.1rem;display:block;text-align:center;width:100%">
            Invest in {{ $name }} →
          </a>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>

<section style="background:#fff">
  <div class="wrap">
    <div style="text-align:center;margin-bottom:2rem">
      <div class="chip">Exit Strategy</div>
      <h2 class="st">Your Exit <em>Options</em></h2>
    </div>
    <div class="g4">
      @foreach([
        ['🔒','Lock-in Period','Years 1–2','Capital deployed for land, infrastructure and herd acquisition.'],
        ['🔄','Secondary Transfer','Year 3+','Transfer subscription to a qualified third party on the secondary market.'],
        ['💰','Full Settlement','Year 5','Principal return plus accrued returns paid out in full.'],
        ['♾','Reinvestment','Post Year 5','Roll returns into a new 5-year cycle for continued compounding.'],
      ] as [$icon,$title,$when,$desc])
      <div class="rev" style="background:var(--pklx);border-radius:14px;padding:1.4rem;text-align:center">
        <div style="font-size:2rem;margin-bottom:.65rem">{{ $icon }}</div>
        <div style="font-size:.62rem;font-weight:700;color:var(--pkd);text-transform:uppercase;letter-spacing:.1em;margin-bottom:.3rem">{{ $when }}</div>
        <h4 style="margin-bottom:.5rem">{{ $title }}</h4>
        <p style="font-size:.8rem;color:var(--t2);line-height:1.65">{{ $desc }}</p>
      </div>
      @endforeach
    </div>
  </div>
</section>

<section style="background:linear-gradient(135deg,var(--pkd),var(--pk));text-align:center">
  <h2 style="font-size:clamp(1.5rem,4vw,2.2rem);color:#fff;margin-bottom:.75rem">Ready to Invest?</h2>
  <p style="color:rgba(255,255,255,.78);margin-bottom:1.5rem">Select your tier above or complete the subscription form now.</p>
  <a href="{{ route('invest') }}" style="display:inline-block;background:#fff;color:var(--pkd);padding:.9rem 2rem;border-radius:10px;font-weight:700;text-decoration:none">Fill Subscription Form →</a>
</section>

@endsection
