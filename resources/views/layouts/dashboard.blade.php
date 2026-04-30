<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<title>@yield('title', 'My Dashboard') — Mambilla Legacy Farms</title>
<link rel="preconnect" href="https://fonts.googleapis.com"/>
<link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,600;0,700;1,600&family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet"/>
<style>
*{box-sizing:border-box;margin:0;padding:0}
:root{--pk:#FF5487;--pkd:#D81B7A;--gn:#8DC63F;--ink:#1A0A12;--pklx:#fff5f9;--pkl:#fce4ef}
body{font-family:'Plus Jakarta Sans',sans-serif;background:var(--pklx);color:var(--ink);min-height:100vh}

.dash-nav{background:#fff;border-bottom:1.5px solid var(--pkl);padding:.85rem 1.5rem;display:flex;align-items:center;justify-content:space-between;position:sticky;top:0;z-index:50;box-shadow:0 2px 12px rgba(255,84,135,.07)}
.dash-logo{display:flex;align-items:center;gap:.65rem}
.dash-mark{width:34px;height:34px;background:linear-gradient(135deg,var(--pkd),var(--pk));border-radius:9px;display:grid;place-items:center;font-size:.75rem;font-weight:800;color:#fff}
.dash-brand{font-size:.85rem;font-weight:700;color:var(--ink)}
.dash-links{display:flex;align-items:center;gap:1.25rem}
.dash-links a{font-size:.8rem;font-weight:500;color:#888;text-decoration:none;transition:color .15s}
.dash-links a:hover,.dash-links a.on{color:var(--pkd)}
.dash-user{display:flex;align-items:center;gap:.75rem;font-size:.78rem;color:#666}

.dash-wrap{max-width:900px;margin:0 auto;padding:2rem 1.25rem}

.alert{padding:.8rem 1rem;border-radius:10px;font-size:.84rem;margin-bottom:1.25rem}
.alert-success{background:rgba(141,198,63,.1);border:1px solid rgba(141,198,63,.25);color:#4a7c1f}

.badge{display:inline-block;padding:3px 12px;border-radius:20px;font-size:.72rem;font-weight:700}
.badge-yellow{background:rgba(245,166,35,.15);color:#a07000}
.badge-green {background:rgba(141,198,63,.15);color:#4a7c1f}
.badge-blue  {background:rgba(52,152,219,.15);color:#1a6fa0}
.badge-red   {background:rgba(231,76,60,.12);color:#c0392b}
.badge-purple{background:rgba(155,89,182,.12);color:#7d3c98}
</style>
@stack('styles')
</head>
<body>

<nav class="dash-nav">
  <div class="dash-logo">
    <div class="dash-mark">MLF</div>
    <div class="dash-brand">Mambilla Legacy Farms</div>
  </div>
  <div class="dash-links">
    <a href="{{ route('investor.dashboard') }}" class="{{ request()->routeIs('investor.dashboard') ? 'on' : '' }}">Dashboard</a>
    <a href="{{ route('investor.profile') }}"   class="{{ request()->routeIs('investor.profile') ? 'on' : '' }}">My Profile</a>
    <a href="{{ route('home') }}">Public Site</a>
  </div>
  <div class="dash-user">
    <span>{{ auth()->user()->name }}</span>
    <form method="POST" action="{{ route('logout') }}" style="display:inline">
      @csrf
      <button type="submit" style="background:none;border:none;color:var(--pkd);cursor:pointer;font-size:.78rem;font-family:inherit;font-weight:600">Logout</button>
    </form>
  </div>
</nav>

<div class="dash-wrap">
  @if(session('success'))
    <div class="alert alert-success">✅ {{ session('success') }}</div>
  @endif
  @yield('content')
</div>

@stack('scripts')
</body>
</html>
