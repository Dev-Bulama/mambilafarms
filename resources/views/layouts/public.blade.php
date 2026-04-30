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

{{-- Top announcement bar (desktop only) --}}
<div class="top-bar">
  <span>A SAB Foundation Initiative</span>
  <span class="dot">·</span>
  <span>Promoted by Successory Nigeria Ltd</span>
  <span class="dot">·</span>
  <span>Technical Partner: Farm Alert Ltd</span>
</div>

{{-- Navigation --}}
<nav id="nav" class="top">
  <div class="nav-inner">
    <a href="{{ route('home') }}" class="logo">
      <span class="logo-mark">MLF</span>
      <span class="logo-text">Mambilla<br><em>Legacy Farms</em></span>
    </a>
    <div class="nav-links">
      <a href="{{ route('home') }}"       data-p="home"  class="{{ request()->routeIs('home') ? 'on' : '' }}">Home</a>
      <a href="{{ route('about') }}"      data-p="about" class="{{ request()->routeIs('about') ? 'on' : '' }}">About</a>
      <a href="{{ route('what-we-do') }}" data-p="wwd"   class="{{ request()->routeIs('what-we-do') ? 'on' : '' }}">What We Do</a>
      <a href="{{ route('tiers') }}"      data-p="tiers" class="{{ request()->routeIs('tiers') ? 'on' : '' }}">Invest</a>
      <a href="{{ route('invest') }}"     data-p="ct"    class="{{ request()->routeIs('invest') ? 'on' : '' }}">Contact</a>
    </div>
    <div class="nav-right">
      @auth
        @if(auth()->user()->isAdmin())
          <a href="{{ route('admin.investors') }}" class="bp" style="font-size:.8rem;padding:.5rem 1rem">Admin Panel</a>
        @else
          <a href="{{ route('investor.dashboard') }}" class="bp" style="font-size:.8rem;padding:.5rem 1rem">My Dashboard</a>
        @endif
      @else
        <a href="{{ route('invest') }}" class="bp">Start Investing →</a>
      @endauth
    </div>
    <button class="hbg" onclick="tmob()" aria-label="Toggle menu">
      <span></span><span></span><span></span>
    </button>
  </div>
</nav>

{{-- Mobile menu --}}
<div class="mob-menu">
  <div class="mob-inner">
    <button class="mob-close" onclick="closeMob()">✕</button>
    <a href="{{ route('home') }}"       onclick="closeMob()">Home</a>
    <a href="{{ route('about') }}"      onclick="closeMob()">About</a>
    <a href="{{ route('what-we-do') }}" onclick="closeMob()">What We Do</a>
    <a href="{{ route('tiers') }}"      onclick="closeMob()">Investment Tiers</a>
    <a href="{{ route('invest') }}"     onclick="closeMob()">Contact / Invest</a>
    @auth
      @if(auth()->user()->isAdmin())
        <a href="{{ route('admin.investors') }}" onclick="closeMob()" class="bp" style="margin-top:1rem;text-align:center">Admin Panel</a>
      @else
        <a href="{{ route('investor.dashboard') }}" onclick="closeMob()" class="bp" style="margin-top:1rem;text-align:center">My Dashboard</a>
      @endif
    @else
      <a href="{{ route('invest') }}" onclick="closeMob()" class="bp" style="margin-top:1rem;text-align:center">Start Investing →</a>
    @endauth
  </div>
</div>

@yield('hero')

@yield('content')

<div class="stripe"></div>

<footer class="site-footer">
  <div class="wrap">
    <div class="foot-grid">
      <div class="foot-col">
        <div class="foot-logo"><span class="logo-mark">MLF</span> Mambilla Legacy Farms</div>
        <p class="foot-tagline">A SAB Foundation Initiative · Promoted by Successory Nigeria Ltd · Technical Partner: Farm Alert Ltd</p>
        <div class="foot-stats">
          <span><strong>1M+</strong> Cattle</span>
          <span><strong>57%</strong> Returns</span>
          <span><strong>50K+</strong> Jobs</span>
        </div>
      </div>
      <div class="foot-col">
        <h5>Navigate</h5>
        <a href="{{ route('home') }}">Home</a>
        <a href="{{ route('about') }}">About</a>
        <a href="{{ route('what-we-do') }}">What We Do</a>
        <a href="{{ route('tiers') }}">Investment Tiers</a>
        <a href="{{ route('invest') }}">Contact</a>
      </div>
      <div class="foot-col">
        <h5>Invest</h5>
        <a href="{{ route('invest') }}?tier=Starter">Starter — ₦10M</a>
        <a href="{{ route('invest') }}?tier=Bronze">Bronze — ₦20M</a>
        <a href="{{ route('invest') }}?tier=Silver">Silver — ₦50M</a>
        <a href="{{ route('invest') }}?tier=Gold">Gold — ₦100M</a>
        <a href="{{ route('invest') }}?tier=Platinum">Platinum — ₦200M</a>
        <a href="{{ route('invest') }}?tier=Diamond">Diamond — ₦1B+</a>
      </div>
      <div class="foot-col">
        <h5>Contact</h5>
        <span>invest@legacyfarms.ng</span>
        <span>www.legacyfarms.ng</span>
        <span>Mambilla Plateau, Taraba State</span>
        @guest
          <a href="{{ route('login') }}" style="margin-top:.75rem;display:inline-block;color:var(--pk);font-size:.8rem">Investor Login →</a>
        @endguest
      </div>
    </div>
    <div class="foot-bottom">
      <span>© {{ date('Y') }} Mambilla Legacy Farms. All rights reserved.</span>
    </div>
  </div>
</footer>

<script src="{{ asset('js/main.js') }}"></script>
@stack('scripts')
</body>
</html>
