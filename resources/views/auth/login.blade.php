<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<title>Login — Mambilla Legacy Farms</title>
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet"/>
<style>
*{box-sizing:border-box;margin:0;padding:0}
:root{--pk:#FF5487;--pkd:#D81B7A;--ink:#1A0A12}
body{font-family:'Plus Jakarta Sans',sans-serif;background:linear-gradient(160deg,#0e0812,#1e0a18);min-height:100vh;display:flex;align-items:center;justify-content:center;padding:1.5rem}
.card{background:#1c1120;border:1px solid rgba(255,255,255,.07);border-radius:20px;padding:2.5rem 2rem;width:100%;max-width:400px}
.logo-row{display:flex;align-items:center;gap:.75rem;margin-bottom:2rem;justify-content:center}
.mark{width:44px;height:44px;background:linear-gradient(135deg,var(--pkd),var(--pk));border-radius:12px;display:grid;place-items:center;font-size:1rem;font-weight:800;color:#fff}
.brand{font-size:.9rem;font-weight:700;color:#f0eaf5;line-height:1.3}
.brand small{font-size:.7rem;color:rgba(240,234,245,.4);font-weight:400;display:block}
h1{font-size:1.4rem;font-weight:700;color:#f0eaf5;margin-bottom:.4rem;text-align:center}
.sub{font-size:.82rem;color:rgba(240,234,245,.45);text-align:center;margin-bottom:1.75rem}
.fi{margin-bottom:1rem}
label{display:block;font-size:.7rem;font-weight:700;color:rgba(240,234,245,.45);text-transform:uppercase;letter-spacing:.07em;margin-bottom:.4rem}
input{width:100%;background:rgba(255,255,255,.05);border:1.5px solid rgba(255,255,255,.08);border-radius:9px;padding:.72rem .9rem;color:#f0eaf5;font-size:.88rem;font-family:'Plus Jakarta Sans',sans-serif;outline:none;transition:border-color .2s}
input:focus{border-color:var(--pk)}
input::placeholder{color:rgba(240,234,245,.22)}
.btn{width:100%;background:linear-gradient(135deg,var(--pkd),var(--pk));border:none;border-radius:10px;padding:.85rem;color:#fff;font-size:.9rem;font-weight:700;cursor:pointer;font-family:'Plus Jakarta Sans',sans-serif;margin-top:.5rem}
.btn:hover{opacity:.88}
.err{background:rgba(231,76,60,.1);border:1px solid rgba(231,76,60,.2);border-radius:8px;padding:.7rem .9rem;font-size:.8rem;color:#ff7070;margin-bottom:1rem}
.footer-links{margin-top:1.4rem;text-align:center;font-size:.78rem;color:rgba(240,234,245,.38)}
.footer-links a{color:var(--pk);text-decoration:none}
.remember{display:flex;align-items:center;gap:.5rem;font-size:.78rem;color:rgba(240,234,245,.5);margin-bottom:.5rem}
.remember input{width:auto;background:none;border:none;accent-color:var(--pk)}
</style>
</head>
<body>
<div class="card">
  <div class="logo-row">
    <div class="mark">MLF</div>
    <div class="brand">Mambilla Legacy Farms <small>Investor Portal</small></div>
  </div>
  <h1>Welcome Back</h1>
  <p class="sub">Sign in to access your investor dashboard</p>

  @if($errors->any())
    <div class="err">{{ $errors->first() }}</div>
  @endif

  <form method="POST" action="{{ route('login.post') }}">
    @csrf
    <div class="fi">
      <label>Email Address</label>
      <input type="email" name="email" value="{{ old('email') }}" placeholder="you@example.com" required autofocus/>
    </div>
    <div class="fi">
      <label>Password</label>
      <input type="password" name="password" placeholder="Your password" required/>
    </div>
    <label class="remember">
      <input type="checkbox" name="remember"/> Remember me
    </label>
    <button class="btn" type="submit">Sign In →</button>
  </form>

  <div class="footer-links">
    <a href="{{ route('home') }}">← Back to site</a>
    &nbsp;·&nbsp;
    <a href="{{ route('invest') }}">Register as investor</a>
  </div>
</div>
</body>
</html>
