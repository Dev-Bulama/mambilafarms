@extends('layouts.public')
@php
$page = 'about';
try {
  $heroTitle  = \App\Models\Setting::get('about_hero_title', 'About the Programme');
  $heroSub    = \App\Models\Setting::get('about_hero_sub', "A structured, transparent pathway to wealth through Nigeria's cattle economy.");
  $visHeading = \App\Models\Setting::get('about_vision_heading', "Building Nigeria's Largest Cattle Economy");
  $visBody1   = \App\Models\Setting::get('about_vision_body1', "Mambilla Legacy Farms is a structured 5-year livestock investment programme targeting a 1-million-head cattle herd on the Mambilla Plateau, Taraba State. The programme targets 50,000+ jobs, ₦4–5 trillion in GDP contribution and sustainable generational wealth for Nigerian investors.");
  $visBody2   = \App\Models\Setting::get('about_vision_body2', "Leveraging indigenous Adamawa Gudali genetics enhanced through AI-assisted breeding with Friesian and Simmental crosses, we target superior milk yields, premium beef quality and highly sought-after breeding stock.");
  $ctaHeading = \App\Models\Setting::get('about_cta_heading', 'Ready to Join?');
  $ctaBody    = \App\Models\Setting::get('about_cta_body', 'Choose your tier and complete the subscription form. Our team responds within 24 hours.');

  $storedHero = \App\Models\Setting::get('hero_about');
  $aboutHeroImg = $storedHero ? asset('storage/'.$storedHero) : 'https://images.unsplash.com/photo-1500595046743-cd271d694d30?w=1600&q=80';
  $storedVision = \App\Models\Setting::get('about_vision_image');
  $aboutVisionImg = $storedVision ? asset('storage/'.$storedVision) : 'https://images.unsplash.com/photo-1493962853295-0fd70327578a?w=800&q=80';

  $partnerDefaults = [
    ['SAB Foundation','Promoter','Provides governance oversight, ensures SPV compliance and investor protection frameworks.'],
    ['Farm Alert Ltd','Technical Partner','Responsible for herd management, veterinary services, AI breeding and operational oversight.'],
    ['Successory Nigeria Ltd','Business Development','Drives investor relations, subscription marketing and institutional partnerships.'],
  ];
  $partners = [];
  for ($pi = 1; $pi <= 3; $pi++) {
    $partners[] = [
      \App\Models\Setting::get('about_partner_'.$pi.'_name', $partnerDefaults[$pi-1][0]),
      \App\Models\Setting::get('about_partner_'.$pi.'_role', $partnerDefaults[$pi-1][1]),
      \App\Models\Setting::get('about_partner_'.$pi.'_desc', $partnerDefaults[$pi-1][2]),
    ];
  }
} catch (\Exception $e) {
  $heroTitle = 'About the Programme';
  $heroSub   = "A structured, transparent pathway to wealth through Nigeria's cattle economy.";
  $visHeading = "Building Nigeria's Largest Cattle Economy";
  $visBody1 = "Mambilla Legacy Farms is a structured 5-year livestock investment programme targeting a 1-million-head cattle herd on the Mambilla Plateau, Taraba State.";
  $visBody2 = "Leveraging indigenous Adamawa Gudali genetics enhanced through AI-assisted breeding with Friesian and Simmental crosses, we target superior milk yields, premium beef quality and highly sought-after breeding stock.";
  $ctaHeading = 'Ready to Join?'; $ctaBody = 'Choose your tier and complete the subscription form. Our team responds within 24 hours.';
  $aboutHeroImg = 'https://images.unsplash.com/photo-1500595046743-cd271d694d30?w=1600&q=80';
  $aboutVisionImg = 'https://images.unsplash.com/photo-1493962853295-0fd70327578a?w=800&q=80';
  $partners = [
    ['SAB Foundation','Promoter','Provides governance oversight, ensures SPV compliance and investor protection frameworks.'],
    ['Farm Alert Ltd','Technical Partner','Responsible for herd management, veterinary services, AI breeding and operational oversight.'],
    ['Successory Nigeria Ltd','Business Development','Drives investor relations, subscription marketing and institutional partnerships.'],
  ];
}
@endphp
@section('title', 'About — Mambilla Legacy Farms')

@section('hero')
<div class="page-top">
  <div class="pb" style="background-image:url('{{ $aboutHeroImg }}')">
    <div class="pbc">
      <div class="chip" style="color:var(--pk)">Our Story</div>
      <h1 style="font-size:clamp(2rem,6vw,3.8rem);color:#fff;font-weight:600;line-height:1.1;margin-top:.4rem">{{ $heroTitle }}</h1>
      <p style="color:rgba(255,255,255,.65);max-width:440px;line-height:1.72;margin-top:.75rem;font-size:.92rem">{{ $heroSub }}</p>
    </div>
  </div>
  <div class="stripe"></div>
</div>
@endsection

@section('content')
<section style="background:#fff"><div class="wrap">
  <div class="two-col">
    <div class="revl">
      <div class="chip">Vision &amp; Mission</div>
      <h2 style="font-size:clamp(1.6rem,4vw,2.4rem);margin-top:.4rem">{{ $visHeading }}</h2>
      <p style="color:#555;line-height:1.85;margin:1rem 0">{{ $visBody1 }}</p>
      <p style="color:#555;line-height:1.85">{{ $visBody2 }}</p>
    </div>
    <div class="revr">
      <img src="{{ $aboutVisionImg }}" alt="Nigerian Gudali cattle herd" style="width:100%;border-radius:16px;object-fit:cover;aspect-ratio:4/3"/>
    </div>
  </div>
</div></section>

<section style="background:var(--pklx)"><div class="wrap">
  <div style="text-align:center;margin-bottom:2.5rem">
    <div class="chip">Our Partners</div>
    <h2 style="font-size:clamp(1.6rem,4vw,2.4rem);margin-top:.4rem">The Team <em>Behind the Vision</em></h2>
  </div>
  <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(260px,1fr));gap:1.25rem">
    @foreach($partners as [$pname,$prole,$pdesc])
    <div class="rev" style="background:#fff;border-radius:16px;padding:1.5rem;box-shadow:0 3px 18px rgba(255,84,135,.07);border-top:3px solid var(--pk)">
      <div style="font-size:.62rem;font-weight:700;color:var(--pkd);text-transform:uppercase;letter-spacing:.1em;margin-bottom:.4rem">{{ $prole }}</div>
      <h3 style="font-size:1.1rem;margin-bottom:.7rem">{{ $pname }}</h3>
      <p style="font-size:.84rem;color:#666;line-height:1.7">{{ $pdesc }}</p>
    </div>
    @endforeach
  </div>
</div></section>

<section style="background:var(--ink)" class="dots-bg"><div class="wrap">
  <div style="text-align:center;margin-bottom:2.5rem">
    <div class="chip" style="color:var(--pk)">5-Year Roadmap</div>
    <h2 style="font-size:clamp(1.6rem,4vw,2.4rem);color:#fff;margin-top:.4rem">The Journey to <em>Full Returns</em></h2>
  </div>
  <div style="display:flex;flex-direction:column;gap:1rem;max-width:680px;margin:0 auto">
    @foreach([
      ['Year 1','Foundation & Acquisition','Land preparation, initial herd acquisition, infrastructure groundwork and team mobilisation.'],
      ['Year 2','Infrastructure Build-out','Abattoir construction, dairy processing plant, cold chain, RFID implementation and pasture development.'],
      ['Year 3','Production & First Payouts','Dairy production begins, first beef processing cycle, quarterly payout distributions commence.'],
      ['Year 5','Full Settlement','Complete investor principal return plus accrued returns, exit or reinvestment option available.'],
      ['Post Year 5','National Scale','Expansion to additional plateaus and states, institutional partnerships and regional export growth.'],
    ] as [$yr,$title,$desc])
    <div class="rev" style="background:rgba(255,255,255,.04);border:1px solid rgba(255,255,255,.07);border-radius:14px;padding:1.2rem 1.4rem;display:flex;gap:1.1rem;align-items:flex-start">
      <div style="background:linear-gradient(135deg,var(--pkd),var(--pk));border-radius:9px;padding:.45rem .75rem;font-size:.72rem;font-weight:800;color:#fff;flex-shrink:0;white-space:nowrap">{{ $yr }}</div>
      <div>
        <div style="font-weight:700;color:#fff;margin-bottom:.3rem">{{ $title }}</div>
        <div style="font-size:.83rem;color:rgba(255,255,255,.55);line-height:1.65">{{ $desc }}</div>
      </div>
    </div>
    @endforeach
  </div>
</div></section>

<section style="background:#fff"><div class="wrap" style="text-align:center">
  <h2 style="font-size:clamp(1.5rem,4vw,2.2rem);margin-bottom:.75rem">{{ $ctaHeading }}</h2>
  <p style="color:#666;margin-bottom:1.5rem">{{ $ctaBody }}</p>
  <a href="{{ route('invest') }}" class="bp">Start Your Investment →</a>
</div></section>
@endsection
