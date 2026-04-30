@extends('layouts.public')
@php $page = 'tiers'; @endphp
@section('title', 'Investment Tiers — Mambilla Legacy Farms')
@section('hero')
<div class="page-top">
  <div class="pb" style="background-image:url('https://images.unsplash.com/photo-1500595046743-cd271d694d30?w=1600&q=80')">
    <div class="pbc">
      <div class="chip" style="color:var(--pk)">Investment Options</div>
      <h1 style="font-size:clamp(2rem,6vw,3.8rem);color:#fff;font-weight:600;line-height:1.1;margin-top:.4rem">Investment Tiers</h1>
      <p style="color:rgba(255,255,255,.65);max-width:440px;line-height:1.72;margin-top:.75rem;font-size:.92rem">Six structured tiers from ₦10M to ₦1B+. Every tier includes insurance, dashboard access and quarterly reporting.</p>
    </div>
  </div>
  <div class="stripe"></div>
</div>
@endsection
@section('content')
<section style="background:var(--pklx)"><div class="wrap">
  <div style="text-align:center;margin-bottom:2.5rem">
    <div class="chip">Individual Tiers</div>
    <h2 style="font-size:clamp(1.6rem,4vw,2.4rem);margin-top:.4rem">Choose Your <em>Investment Level</em></h2>
  </div>
  <div class="tiers-grid">
    @foreach([
      ['Starter','₦10,000,000','5','34–57%','₦18.5M–₦25.4M',false,'var(--pk)'],
      ['Bronze','₦20,000,000','10','34–57%','₦37M–₦50.9M',false,'var(--pk)'],
      ['Silver','₦50,000,000','25','40–65%','₦92.3M–₦127M',true,'var(--pk)'],
      ['Gold','₦100,000,000','50','57–80%','₦184.5M–₦254M',false,'var(--pkd)'],
      ['Platinum','₦200,000,000','100','200–250%','₦400M–₦500M',false,'var(--gn)'],
      ['Diamond','₦1,000,000,000+','500+','250–300%','₦2.5B–₦3B+',false,'var(--gn)'],
    ] as [$name,$amt,$cows,$roi,$profit,$popular,$color])
    <div class="rev tier-card {{ $popular ? 'tier-featured' : '' }}">
      @if($popular)<div class="tier-badge">⭐ Most Popular</div>@endif
      <div class="tier-name" style="color:{{ $color }}">{{ $name }}</div>
      <div class="tier-amt">{{ $amt }}</div>
      <div class="tier-sub">{{ $cows }} cattle · {{ $roi }} p.a.</div>
      <div class="tier-divider"></div>
      <div class="tier-row"><span>5-yr Profit Range</span><strong>{{ $profit }}</strong></div>
      <div class="tier-row"><span>Dashboard Access</span><strong style="color:var(--gn)">✓</strong></div>
      <div class="tier-row"><span>Insurance</span><strong style="color:var(--gn)">✓</strong></div>
      <div class="tier-row"><span>Quarterly Reports</span><strong style="color:var(--gn)">✓</strong></div>
      @if(in_array($name,['Platinum','Diamond']))
      <div class="tier-row"><span>Board Seat Eligible</span><strong style="color:var(--gn)">✓</strong></div>
      @endif
      <a href="{{ route('invest') }}?tier={{ $name }}" class="{{ $popular ? 'bp' : 'bo' }}" style="margin-top:1.1rem;display:block;text-align:center">Invest in {{ $name }} →</a>
    </div>
    @endforeach
  </div>
</div></section>

<section style="background:#fff"><div class="wrap">
  <div style="text-align:center;margin-bottom:2rem">
    <div class="chip">Exit Strategy</div>
    <h2 style="font-size:clamp(1.5rem,4vw,2.2rem);margin-top:.4rem">Your Exit <em>Options</em></h2>
  </div>
  <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(200px,1fr));gap:1rem">
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
      <p style="font-size:.8rem;color:#666;line-height:1.65">{{ $desc }}</p>
    </div>
    @endforeach
  </div>
</div></section>

<section style="background:linear-gradient(135deg,var(--pkd),var(--pk));padding:3rem 1rem;text-align:center">
  <h2 style="font-size:clamp(1.5rem,4vw,2.2rem);color:#fff;margin-bottom:.75rem">Ready to Invest?</h2>
  <p style="color:rgba(255,255,255,.75);margin-bottom:1.5rem">Select your tier above or complete the subscription form now.</p>
  <a href="{{ route('invest') }}" style="display:inline-block;background:#fff;color:var(--pkd);padding:.85rem 2rem;border-radius:10px;font-weight:700;text-decoration:none">Fill Subscription Form →</a>
</section>
@endsection
