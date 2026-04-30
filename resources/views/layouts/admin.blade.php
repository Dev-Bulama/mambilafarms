<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<title>@yield('title', 'Admin') — Mambilla Legacy Farms</title>
<link rel="preconnect" href="https://fonts.googleapis.com"/>
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet"/>
<style>
*{box-sizing:border-box;margin:0;padding:0}
:root{
  --pk:#FF5487;--pkd:#D81B7A;--gn:#8DC63F;--gnd:#5E8F1A;
  --bg:#0a0610;--card:#130d1a;--card2:#1a1024;--border:rgba(255,255,255,.07);
  --t1:#f0eaf5;--t2:rgba(240,234,245,.5);--t3:rgba(240,234,245,.22);
  --sidebar:220px;
}
body{font-family:'Plus Jakarta Sans',sans-serif;background:var(--bg);color:var(--t1);display:flex;min-height:100vh;overflow-x:hidden}

/* ── Sidebar ── */
.sidebar{
  width:var(--sidebar);background:var(--card);border-right:1px solid var(--border);
  display:flex;flex-direction:column;position:fixed;top:0;left:0;bottom:0;z-index:200;
  transition:transform .25s ease;
}
.sb-logo{padding:1.4rem 1.2rem;border-bottom:1px solid var(--border);display:flex;align-items:center;gap:.75rem}
.sb-mark{width:36px;height:36px;background:linear-gradient(135deg,var(--pkd),var(--pk));border-radius:9px;display:grid;place-items:center;font-size:.85rem;font-weight:800;color:#fff;flex-shrink:0}
.sb-title{font-size:.82rem;font-weight:700;line-height:1.3;color:var(--t1)}
.sb-title small{font-size:.65rem;color:var(--t2);font-weight:400;display:block}
.sb-nav{flex:1;padding:1rem .75rem;display:flex;flex-direction:column;gap:.15rem;overflow-y:auto}
.sb-label{font-size:.6rem;font-weight:700;color:var(--t3);text-transform:uppercase;letter-spacing:.1em;padding:.4rem .6rem;margin-top:.6rem}
.sb-link{display:flex;align-items:center;gap:.65rem;padding:.6rem .75rem;border-radius:8px;font-size:.82rem;font-weight:500;color:var(--t2);text-decoration:none;transition:background .15s,color .15s}
.sb-link:hover{background:rgba(255,255,255,.05);color:var(--t1)}
.sb-link.active{background:rgba(255,84,135,.12);color:var(--pk);font-weight:600}
.sb-link .icon{font-size:1rem;width:20px;text-align:center;flex-shrink:0}
.sb-footer{padding:.85rem 1rem;border-top:1px solid var(--border);font-size:.73rem;color:var(--t2)}
.sb-footer a{color:var(--pk);text-decoration:none}

/* Sidebar overlay (mobile) */
.sb-overlay{display:none;position:fixed;inset:0;background:rgba(0,0,0,.65);z-index:199}
.sb-overlay.open{display:block}

/* ── Main content ── */
.main{margin-left:var(--sidebar);flex:1;display:flex;flex-direction:column;min-height:100vh}
.topbar{padding:.85rem 1.75rem;border-bottom:1px solid var(--border);display:flex;align-items:center;justify-content:space-between;background:var(--card);position:sticky;top:0;z-index:100}
.topbar-title{font-size:1rem;font-weight:700}
.topbar-right{display:flex;align-items:center;gap:1rem;font-size:.8rem;color:var(--t2)}
.content{padding:1.75rem;flex:1}

/* Sidebar toggle button (visible only on mobile) */
.sb-toggle{display:none;background:none;border:none;color:var(--t1);cursor:pointer;padding:.3rem .4rem;border-radius:6px;font-size:1.2rem;line-height:1;margin-right:.6rem}

/* ── Cards ── */
.card{background:var(--card);border:1px solid var(--border);border-radius:14px;padding:1.25rem 1.4rem;margin-bottom:1.25rem}
.card-title{font-size:.68rem;font-weight:700;color:var(--t2);text-transform:uppercase;letter-spacing:.1em;margin-bottom:1rem}

/* ── Stats grid ── */
.stats-grid{display:grid;grid-template-columns:repeat(auto-fit,minmax(140px,1fr));gap:1rem;margin-bottom:1.5rem}
.stat-card{background:var(--card);border:1px solid var(--border);border-radius:12px;padding:1rem 1.15rem}
.stat-val{font-size:2rem;font-weight:800;color:var(--pk);line-height:1}
.stat-label{font-size:.68rem;color:var(--t2);margin-top:.3rem;text-transform:uppercase;letter-spacing:.07em}

/* ── Table ── */
.tbl-wrap{overflow-x:auto;border-radius:12px;border:1px solid var(--border);-webkit-overflow-scrolling:touch}
table{width:100%;border-collapse:collapse;font-size:.8rem;min-width:600px}
thead th{background:#0f0a18;padding:.7rem 1rem;text-align:left;font-size:.64rem;font-weight:700;color:var(--t2);text-transform:uppercase;letter-spacing:.08em;white-space:nowrap;border-bottom:1px solid var(--border)}
tbody tr{border-bottom:1px solid var(--border);transition:background .12s}
tbody tr:last-child{border-bottom:none}
tbody tr:hover{background:rgba(255,84,135,.04)}
td{padding:.7rem 1rem;color:var(--t1);vertical-align:middle}
td.muted{color:var(--t2);font-size:.75rem}
td.wrap{white-space:normal;max-width:200px;font-size:.76rem}

/* ── Badges ── */
.badge{display:inline-block;padding:2px 10px;border-radius:20px;font-size:.68rem;font-weight:700}
.badge-yellow{background:rgba(245,166,35,.15);color:#f5a623}
.badge-green {background:rgba(141,198,63,.15);color:#8DC63F}
.badge-blue  {background:rgba(52,152,219,.15);color:#3498db}
.badge-red   {background:rgba(231,76,60,.15);color:#e74c3c}
.badge-purple{background:rgba(155,89,182,.15);color:#9b59b6}
.badge-pink  {background:rgba(255,84,135,.15);color:var(--pk)}

/* ── Buttons ── */
.btn{display:inline-flex;align-items:center;gap:.4rem;padding:.5rem .95rem;border-radius:8px;font-size:.78rem;font-weight:600;cursor:pointer;border:none;font-family:'Plus Jakarta Sans',sans-serif;text-decoration:none;transition:opacity .15s}
.btn-primary{background:linear-gradient(135deg,var(--pkd),var(--pk));color:#fff}
.btn-ghost{background:rgba(255,255,255,.06);color:var(--t1);border:1px solid var(--border)}
.btn-danger{background:rgba(231,76,60,.12);color:#e74c3c;border:1px solid rgba(231,76,60,.2)}
.btn-green{background:rgba(141,198,63,.12);color:var(--gn);border:1px solid rgba(141,198,63,.2)}
.btn:hover{opacity:.82}

/* ── Form elements ── */
.form-group{margin-bottom:1.1rem}
.form-label{display:block;font-size:.72rem;font-weight:700;color:var(--t2);text-transform:uppercase;letter-spacing:.07em;margin-bottom:.4rem}
.form-control{width:100%;background:rgba(255,255,255,.05);border:1.5px solid var(--border);border-radius:9px;padding:.65rem .9rem;color:var(--t1);font-size:.85rem;font-family:'Plus Jakarta Sans',sans-serif;outline:none;transition:border-color .2s}
.form-control:focus{border-color:var(--pk)}
.form-control::placeholder{color:var(--t3)}
select.form-control option{background:#1a1024;color:var(--t1)}
textarea.form-control{resize:vertical;min-height:80px}

/* ── Toolbar ── */
.toolbar{display:flex;align-items:center;justify-content:space-between;flex-wrap:wrap;gap:.75rem;margin-bottom:1.1rem}
.toolbar-left{display:flex;gap:.5rem;flex-wrap:wrap}

/* ── Alert ── */
.alert{padding:.8rem 1rem;border-radius:9px;font-size:.82rem;margin-bottom:1rem}
.alert-success{background:rgba(141,198,63,.12);border:1px solid rgba(141,198,63,.25);color:var(--gn)}
.alert-error{background:rgba(231,76,60,.1);border:1px solid rgba(231,76,60,.2);color:#ff7070}

/* ── Pagination ── */
.pager{display:flex;justify-content:space-between;align-items:center;margin-top:1rem;flex-wrap:wrap;gap:.5rem;font-size:.78rem;color:var(--t2)}

/* ════════════════════════════
   MOBILE  ≤ 768px
════════════════════════════ */
@media(max-width:768px){
  .sidebar{transform:translateX(-100%)}
  .sidebar.open{transform:translateX(0)}
  .main{margin-left:0}
  .sb-toggle{display:block}
  .topbar{padding:.7rem 1rem}
  .topbar-right .date-label{display:none}
  .content{padding:1rem}
  .stats-grid{grid-template-columns:1fr 1fr}
  .toolbar{flex-direction:column;align-items:stretch}
  .toolbar-left{flex-wrap:wrap}
  .toolbar form{display:flex;flex-direction:column;gap:.5rem}
  .toolbar form input,
  .toolbar form select{width:100%!important}
  .card{padding:1rem}
  .pager{flex-direction:column;text-align:center}
}
</style>
@stack('styles')
</head>
<body>

{{-- Sidebar overlay (tap to close on mobile) --}}
<div class="sb-overlay" id="sb-overlay" onclick="closeSidebar()"></div>

<aside class="sidebar" id="sidebar">
  <div class="sb-logo">
    <div class="sb-mark">MLF</div>
    <div class="sb-title">Legacy Farms <small>Admin Panel</small></div>
  </div>
  <nav class="sb-nav">
    <div class="sb-label">Management</div>
    <a href="{{ route('admin.investors') }}" class="sb-link {{ request()->routeIs('admin.investors*') ? 'active' : '' }}">
      <span class="icon">👥</span> Investors
    </a>

    <div class="sb-label">Export</div>
    <a href="{{ route('admin.export.csv') }}" class="sb-link">
      <span class="icon">📄</span> Export CSV
    </a>
    <a href="{{ route('admin.export.excel') }}" class="sb-link">
      <span class="icon">📊</span> Export Excel
    </a>

    <div class="sb-label">Content</div>
    <a href="{{ route('admin.cms') }}" class="sb-link {{ request()->routeIs('admin.cms*') ? 'active' : '' }}">
      <span class="icon">✏️</span> Pages &amp; Content
    </a>

    <div class="sb-label">System</div>
    <a href="{{ route('admin.settings') }}" class="sb-link {{ request()->routeIs('admin.settings*') ? 'active' : '' }}">
      <span class="icon">⚙️</span> Settings
    </a>
    <a href="{{ route('admin.profile') }}" class="sb-link {{ request()->routeIs('admin.profile*') ? 'active' : '' }}">
      <span class="icon">👤</span> My Profile
    </a>
    <a href="{{ route('home') }}" class="sb-link" target="_blank">
      <span class="icon">🌐</span> View Site
    </a>
  </nav>
  <div class="sb-footer">
    Logged in as <strong style="color:var(--t1)">{{ auth()->user()->name }}</strong><br>
    <form method="POST" action="{{ route('logout') }}" style="margin-top:.4rem">
      @csrf
      <button type="submit" style="background:none;border:none;color:var(--pk);cursor:pointer;font-size:.73rem;font-family:inherit;padding:0">Sign out →</button>
    </form>
  </div>
</aside>

<div class="main">
  <div class="topbar">
    <div style="display:flex;align-items:center">
      <button class="sb-toggle" onclick="toggleSidebar()" aria-label="Toggle sidebar">☰</button>
      <span class="topbar-title">@yield('page-title', 'Dashboard')</span>
    </div>
    <div class="topbar-right">
      <span class="date-label">{{ now()->format('D, d M Y') }}</span>
      <a href="{{ route('admin.profile') }}" style="color:var(--t2);text-decoration:none;font-size:.78rem">{{ auth()->user()->name }}</a>
    </div>
  </div>
  <div class="content">
    @if(session('success'))
      <div class="alert alert-success">✅ {{ session('success') }}</div>
    @endif
    @if(session('error'))
      <div class="alert alert-error">⚠️ {{ session('error') }}</div>
    @endif
    @yield('content')
  </div>
</div>

<script>
function toggleSidebar(){
  document.getElementById('sidebar').classList.toggle('open');
  document.getElementById('sb-overlay').classList.toggle('open');
  document.body.style.overflow = document.getElementById('sidebar').classList.contains('open') ? 'hidden' : '';
}
function closeSidebar(){
  document.getElementById('sidebar').classList.remove('open');
  document.getElementById('sb-overlay').classList.remove('open');
  document.body.style.overflow = '';
}
// Close sidebar on ESC
document.addEventListener('keydown', e => { if(e.key === 'Escape') closeSidebar(); });
</script>
@stack('scripts')
</body>
</html>
