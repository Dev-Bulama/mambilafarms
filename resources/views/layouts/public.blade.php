<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover"/>
<title>@yield('title', 'Mambilla Legacy Farms')</title>
<link rel="preconnect" href="https://fonts.googleapis.com"/>
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin/>
<link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,400;0,500;0,600;0,700;1,400;1,600&family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet"/>
<link rel="stylesheet" href="{{ asset('css/style.css') }}"/>
@stack('styles')
</head>
<body data-page="{{ $page ?? '' }}">

@php
try {
    $ann1 = \App\Models\Setting::get('site_ann_1', 'A SAB Foundation Initiative');
    $ann2 = \App\Models\Setting::get('site_ann_2', 'Promoted by Successory Nigeria Ltd');
    $ann3 = \App\Models\Setting::get('site_ann_3', 'Technical Partner: Farm Alert Ltd');
    $footEmail   = \App\Models\Setting::get('company_email', 'invest@legacyfarms.ng');
    $footPhone   = \App\Models\Setting::get('company_phone', '');
    $footAddress = \App\Models\Setting::get('company_address', 'Mambilla Plateau, Taraba State, Nigeria');
    $chatbotScript = \App\Models\Setting::get('chatbot_script', '');
} catch (\Exception $e) {
    $ann1 = 'A SAB Foundation Initiative';
    $ann2 = 'Promoted by Successory Nigeria Ltd';
    $ann3 = 'Technical Partner: Farm Alert Ltd';
    $footEmail   = 'invest@legacyfarms.ng';
    $footPhone   = '';
    $footAddress = 'Mambilla Plateau, Taraba State, Nigeria';
    $chatbotScript = '';
}
@endphp

{{-- Top announcement bar (desktop only) --}}
<div class="top-bar">
  <span>{{ $ann1 }}</span>
  <div class="top-dot"></div>
  <span>{{ $ann2 }}</span>
  <div class="top-dot"></div>
  <span>{{ $ann3 }}</span>
</div>

{{-- Navigation --}}
<nav id="nav" class="{{ ($page ?? '') === 'home' ? 'top' : '' }}">
  <div class="ni">
    <a href="{{ route('home') }}" class="logo">
      <span class="le">MLF</span>
      <span class="ln">Mambilla<br><em style="color:rgba(255,255,255,.55);font-style:normal;font-size:.85em">Legacy Farms</em></span>
    </a>
    <div class="nl">
      <a href="{{ route('home') }}"       data-p="home"  class="{{ request()->routeIs('home') ? 'on' : '' }}">Home</a>
      <a href="{{ route('about') }}"      data-p="about" class="{{ request()->routeIs('about') ? 'on' : '' }}">About</a>
      <a href="{{ route('what-we-do') }}" data-p="wwd"   class="{{ request()->routeIs('what-we-do') ? 'on' : '' }}">What We Do</a>
      <a href="{{ route('tiers') }}"      data-p="tiers" class="{{ request()->routeIs('tiers') ? 'on' : '' }}">Invest</a>
      @auth
        @if(auth()->user()->isAdmin())
          <a href="{{ route('admin.investors') }}" class="cta-nav">Admin Panel</a>
        @else
          <a href="{{ route('investor.dashboard') }}" class="cta-nav">My Dashboard</a>
        @endif
      @else
        <a href="{{ route('login') }}"  data-p="login" class="{{ request()->routeIs('login') ? 'on' : '' }}" style="color:rgba(255,255,255,.6)">Login</a>
        <a href="{{ route('invest') }}" data-p="ct"    class="cta-nav {{ request()->routeIs('invest') ? 'on' : '' }}">Start Investing →</a>
      @endauth
    </div>
    <button class="hbg" onclick="tmob()" aria-label="Toggle menu">
      <span></span><span></span><span></span>
    </button>
  </div>
</nav>

{{-- Mobile menu --}}
<div class="mob-menu">
  <a href="{{ route('home') }}"       onclick="closeMob()" data-p="home"  class="{{ request()->routeIs('home') ? 'on' : '' }}">Home <span>→</span></a>
  <a href="{{ route('about') }}"      onclick="closeMob()" data-p="about" class="{{ request()->routeIs('about') ? 'on' : '' }}">About <span>→</span></a>
  <a href="{{ route('what-we-do') }}" onclick="closeMob()" data-p="wwd"   class="{{ request()->routeIs('what-we-do') ? 'on' : '' }}">What We Do <span>→</span></a>
  <a href="{{ route('tiers') }}"      onclick="closeMob()" data-p="tiers" class="{{ request()->routeIs('tiers') ? 'on' : '' }}">Investment Tiers <span>→</span></a>
  <a href="{{ route('invest') }}"     onclick="closeMob()" data-p="ct"    class="{{ request()->routeIs('invest') ? 'on' : '' }}">Contact / Invest <span>→</span></a>
  @auth
    @if(auth()->user()->isAdmin())
      <a href="{{ route('admin.investors') }}" onclick="closeMob()" class="cta-mob">Admin Panel →</a>
    @else
      <a href="{{ route('investor.dashboard') }}" onclick="closeMob()" class="cta-mob">My Dashboard →</a>
    @endif
  @else
    <a href="{{ route('login') }}"  onclick="closeMob()" class="cta-mob" style="background:rgba(255,255,255,.08);box-shadow:none">Investor Login →</a>
    <a href="{{ route('invest') }}" onclick="closeMob()" class="cta-mob">Start Investing →</a>
  @endauth
</div>

@yield('hero')

@yield('content')

<div class="stripe"></div>

<footer>
  <div class="wrap">
    <div class="footer-grid">

      <div>
        <div class="ftl" style="margin-bottom:.75rem">Mambilla Legacy Farms</div>
        <p style="font-size:.8rem;color:rgba(255,255,255,.32);line-height:1.82;margin-bottom:1.1rem">A SAB Foundation Initiative · Promoted by Successory Nigeria Ltd · Technical Partner: Farm Alert Ltd</p>
        <div style="display:flex;gap:1.25rem;flex-wrap:wrap">
          <div style="text-align:center"><div style="font-size:1.15rem;font-weight:700;color:var(--pk);font-family:'Cormorant Garamond',serif">1M+</div><div style="font-size:.6rem;color:rgba(255,255,255,.28);text-transform:uppercase;letter-spacing:.08em">Cattle</div></div>
          <div style="text-align:center"><div style="font-size:1.15rem;font-weight:700;color:var(--gn);font-family:'Cormorant Garamond',serif">57%</div><div style="font-size:.6rem;color:rgba(255,255,255,.28);text-transform:uppercase;letter-spacing:.08em">Returns</div></div>
          <div style="text-align:center"><div style="font-size:1.15rem;font-weight:700;color:var(--pk);font-family:'Cormorant Garamond',serif">50K+</div><div style="font-size:.6rem;color:rgba(255,255,255,.28);text-transform:uppercase;letter-spacing:.08em">Jobs</div></div>
        </div>
      </div>

      <div>
        <h5>Navigate</h5>
        <a href="{{ route('home') }}">Home</a>
        <a href="{{ route('about') }}">About</a>
        <a href="{{ route('what-we-do') }}">What We Do</a>
        <a href="{{ route('tiers') }}">Investment Tiers</a>
        <a href="{{ route('invest') }}">Contact</a>
      </div>

      <div>
        <h5>Invest</h5>
        <a href="{{ route('invest') }}?tier=Starter">Starter — ₦10M</a>
        <a href="{{ route('invest') }}?tier=Bronze">Bronze — ₦20M</a>
        <a href="{{ route('invest') }}?tier=Silver">Silver — ₦50M</a>
        <a href="{{ route('invest') }}?tier=Gold">Gold — ₦100M</a>
        <a href="{{ route('invest') }}?tier=Platinum">Platinum — ₦200M</a>
        <a href="{{ route('invest') }}?tier=Diamond">Diamond — ₦1B+</a>
      </div>

      <div>
        <h5>Contact</h5>
        @if($footEmail)<a href="mailto:{{ $footEmail }}">{{ $footEmail }}</a>@endif
        @if($footPhone)<a href="tel:{{ $footPhone }}">{{ $footPhone }}</a>@endif
        <span style="font-size:.82rem;color:rgba(255,255,255,.38);display:block;padding:.18rem 0;line-height:1.6">{{ $footAddress }}</span>
        <div style="margin-top:.9rem;display:flex;flex-direction:column;gap:.35rem">
          @guest
            <a href="{{ route('login') }}"  style="color:var(--pk);font-size:.8rem;font-weight:600;display:inline-flex;align-items:center;gap:.3rem">🔐 Investor Login</a>
            <a href="{{ route('invest') }}" style="color:rgba(255,255,255,.38);font-size:.78rem">Register as Investor →</a>
          @endguest
          @auth
            @if(auth()->user()->isAdmin())
              <a href="{{ route('admin.investors') }}" style="color:var(--pk);font-size:.8rem">⚙️ Admin Panel →</a>
            @else
              <a href="{{ route('investor.dashboard') }}" style="color:var(--pk);font-size:.8rem">📊 My Dashboard →</a>
            @endif
          @endauth
        </div>
      </div>

    </div>
    <div class="foot-bottom">
      © {{ date('Y') }} Mambilla Legacy Farms. All rights reserved.
    </div>
  </div>
</footer>

<script src="{{ asset('js/main.js') }}"></script>
@stack('scripts')
@if($chatbotScript)
{!! $chatbotScript !!}
@endif
</body>
</html>
