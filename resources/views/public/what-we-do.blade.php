@extends('layouts.public')
@php
$page = 'wwd';
try {
  $heroTitle = \App\Models\Setting::get('wwd_hero_title', 'What We Do');
  $heroSub   = \App\Models\Setting::get('wwd_hero_sub', 'Three integrated revenue streams delivering consistent, compounding returns from Year 3.');
  $procHead  = \App\Models\Setting::get('wwd_process_heading', 'How Your Investment Works');

  $storedWwdHero = \App\Models\Setting::get('hero_wwd');
  $wwdHeroImg = $storedWwdHero ? asset('storage/'.$storedWwdHero) : 'https://images.unsplash.com/photo-1548550023-2bdb3c5beed7?w=1600&q=80';

  $streamDefaults = [
    ['🥛','Dairy &amp; Artisan Products','Our Friesian crossbreeds produce premium A2 milk processed into fresh milk, artisan yogurt, aged cheese, cultured butter and pure ghee for the Nigerian premium market and ECOWAS exports.','Quarterly payouts from Year 3'],
    ['🥩','Premium Beef &amp; Abattoir','A modern certified abattoir processes feedlot-finished cattle into branded premium cuts for top-tier Nigerian restaurants, hotels and supermarket chains, with export capability to ECOWAS markets.','Event payouts from Year 3'],
    ['🧬','AI Breeding &amp; Superior Genetics','Our AI-assisted breeding programme crosses indigenous Adamawa Gudali with Friesian and Simmental genetics to produce F1 crossbreeds sold to smallholder farmers and government programmes across Nigeria.','Proportionate share from Year 3'],
  ];
  $streams = [];
  for ($si = 1; $si <= 3; $si++) {
    $streams[] = [
      \App\Models\Setting::get('wwd_stream_'.$si.'_icon',   $streamDefaults[$si-1][0]),
      \App\Models\Setting::get('wwd_stream_'.$si.'_title',  $streamDefaults[$si-1][1]),
      \App\Models\Setting::get('wwd_stream_'.$si.'_body',   $streamDefaults[$si-1][2]),
      \App\Models\Setting::get('wwd_stream_'.$si.'_payout', $streamDefaults[$si-1][3]),
    ];
  }
} catch (\Exception $e) {
  $heroTitle = 'What We Do';
  $heroSub   = 'Three integrated revenue streams delivering consistent, compounding returns from Year 3.';
  $procHead  = 'How Your Investment Works';
  $streams = [
    ['🥛','Dairy &amp; Artisan Products','Our Friesian crossbreeds produce premium A2 milk...','Quarterly payouts from Year 3'],
    ['🥩','Premium Beef &amp; Abattoir','A modern certified abattoir processes feedlot-finished cattle...','Event payouts from Year 3'],
    ['🧬','AI Breeding &amp; Superior Genetics','Our AI-assisted breeding programme...','Proportionate share from Year 3'],
  ];
  $wwdHeroImg = 'https://images.unsplash.com/photo-1548550023-2bdb3c5beed7?w=1600&q=80';
}
@endphp
@section('title', 'What We Do — Mambilla Legacy Farms')

@section('hero')
<div class="page-top">
  <div class="pb" style="background-image:url('{{ $wwdHeroImg }}')">
    <div class="pbc">
      <div class="chip" style="color:var(--pk)">Operations</div>
      <h1 style="font-size:clamp(2rem,6vw,3.8rem);color:#fff;font-weight:600;line-height:1.1;margin-top:.4rem">{{ $heroTitle }}</h1>
      <p style="color:rgba(255,255,255,.65);max-width:440px;line-height:1.72;margin-top:.75rem;font-size:.92rem">{{ $heroSub }}</p>
    </div>
  </div>
  <div class="stripe"></div>
</div>
@endsection

@section('content')
@php
$streamFeatures = [
  ['Fresh &amp; UHT Milk','Artisan Yogurt &amp; Kefir','Premium Aged Cheese','Cultured Butter &amp; Ghee'],
  ['Feedlot Finishing Programme','Branded Premium Cuts','Hotel &amp; Restaurant Supply','ECOWAS Regional Export'],
  ['Adamawa Gudali × Friesian F1','× Simmental High-growth Crosses','AI Semen Programme','Government Breeding Contracts'],
];
$streamBg = ['#fff','var(--pklx)','#fff'];
@endphp

@foreach($streams as $si => [$sicon,$stitle,$sbody,$spay])
<section style="background:{{ $streamBg[$si] }}"><div class="wrap">
  <div class="two-col">
    <div class="revl">
      <div style="font-size:3rem;margin-bottom:.75rem">{!! $sicon !!}</div>
      <h2 style="font-size:clamp(1.6rem,4vw,2.3rem);margin-bottom:.8rem">{!! $stitle !!}</h2>
      <p style="color:#555;line-height:1.85;margin-bottom:1.25rem">{{ $sbody }}</p>
      <div style="display:grid;grid-template-columns:1fr 1fr;gap:.5rem;margin-bottom:1.25rem">
        @foreach($streamFeatures[$si] as $f)
        <div style="background:var(--pklx);border-radius:8px;padding:.5rem .75rem;font-size:.78rem;font-weight:600;color:var(--pkd)">{!! $f !!}</div>
        @endforeach
      </div>
      <div style="display:inline-block;background:linear-gradient(135deg,var(--pkd),var(--pk));color:#fff;padding:.45rem 1rem;border-radius:20px;font-size:.75rem;font-weight:700">{{ $spay }}</div>
    </div>
  </div>
</div></section>
@endforeach

<section style="background:var(--ink)" class="dots-bg"><div class="wrap">
  <div style="text-align:center;margin-bottom:2rem">
    <div class="chip" style="color:var(--pk)">The Process</div>
    <h2 style="font-size:clamp(1.6rem,4vw,2.4rem);color:#fff;margin-top:.4rem">How <em>{{ $procHead }}</em></h2>
  </div>
  <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(200px,1fr));gap:1rem">
    @foreach([
      ['1','Subscribe','Complete the form. Our team reviews and sends your SPV subscription agreement.'],
      ['2','Allotment','Cattle are allotted and RFID-tagged in your name after payment tranches are completed.'],
      ['3','Grow &amp; Harvest','Your herd grows. Dairy, beef and breeding stock generate your quarterly distributions from Year 3.'],
      ['4','Settlement','Full principal return plus returns at Year 5. Option to reinvest for continued compounding.'],
    ] as [$n,$title,$desc])
    <div class="rev" style="background:rgba(255,255,255,.04);border:1px solid rgba(255,255,255,.07);border-radius:14px;padding:1.4rem;text-align:center">
      <div style="width:40px;height:40px;background:linear-gradient(135deg,var(--pkd),var(--pk));border-radius:50%;display:grid;place-items:center;font-size:1rem;font-weight:800;color:#fff;margin:0 auto .85rem">{{ $n }}</div>
      <h4 style="color:#fff;margin-bottom:.5rem">{!! $title !!}</h4>
      <p style="font-size:.82rem;color:rgba(255,255,255,.5);line-height:1.65">{{ $desc }}</p>
    </div>
    @endforeach
  </div>
  <div style="text-align:center;margin-top:2rem">
    <a href="{{ route('invest') }}" class="bp">Start Your Investment →</a>
  </div>
</div></section>
@endsection
