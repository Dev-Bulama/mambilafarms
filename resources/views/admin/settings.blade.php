@extends('layouts.admin')
@section('title', 'Settings')
@section('page-title', 'Settings')

@section('content')
<form method="POST" action="{{ route('admin.settings.update') }}" enctype="multipart/form-data">
@csrf

{{-- SMTP --}}
<div class="card">
  <div class="card-title">📧 SMTP / Email Configuration</div>
  <p style="font-size:.78rem;color:var(--t2);margin-bottom:1.25rem;line-height:1.65">Controls how notification and confirmation emails are sent. Credentials are stored in the database and never exposed to the browser.</p>
  <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(240px,1fr));gap:1rem">
    <div class="form-group">
      <label class="form-label">SMTP Host</label>
      <input class="form-control" type="text" name="smtp_host" value="{{ $settings['smtp_host'] ?? '' }}" placeholder="smtp.gmail.com"/>
    </div>
    <div class="form-group">
      <label class="form-label">SMTP Port</label>
      <input class="form-control" type="number" name="smtp_port" value="{{ $settings['smtp_port'] ?? '587' }}" placeholder="587"/>
    </div>
    <div class="form-group">
      <label class="form-label">Encryption</label>
      <select class="form-control" name="smtp_encryption">
        @foreach(['tls','ssl','none'] as $enc)
          <option value="{{ $enc }}" {{ ($settings['smtp_encryption'] ?? 'tls') === $enc ? 'selected' : '' }}>{{ strtoupper($enc) }}</option>
        @endforeach
      </select>
    </div>
    <div class="form-group">
      <label class="form-label">SMTP Username</label>
      <input class="form-control" type="text" name="smtp_username" value="{{ $settings['smtp_username'] ?? '' }}" placeholder="your@gmail.com"/>
    </div>
    <div class="form-group">
      <label class="form-label">SMTP Password / App Password</label>
      <input class="form-control" type="password" name="smtp_password" placeholder="Leave blank to keep current"/>
    </div>
    <div class="form-group">
      <label class="form-label">From Email Address</label>
      <input class="form-control" type="email" name="smtp_from_address" value="{{ $settings['smtp_from_address'] ?? '' }}" placeholder="noreply@legacyfarms.ng"/>
    </div>
    <div class="form-group">
      <label class="form-label">From Name</label>
      <input class="form-control" type="text" name="smtp_from_name" value="{{ $settings['smtp_from_name'] ?? '' }}" placeholder="Mambilla Legacy Farms"/>
    </div>
    <div class="form-group">
      <label class="form-label">Admin Notification Emails</label>
      <input class="form-control" type="text" name="admin_notification_emails" value="{{ $settings['admin_notification_emails'] ?? '' }}" placeholder="email1@example.com, email2@example.com"/>
      <div style="font-size:.68rem;color:var(--t2);margin-top:.3rem">Comma-separated. All addresses receive alerts on new registrations.</div>
    </div>
  </div>
  <div style="margin-top:1rem">
    <button type="button" onclick="testSmtp()" class="btn btn-ghost" id="test-btn">🔌 Send Test Email</button>
    <span id="test-result" style="font-size:.78rem;margin-left:.75rem"></span>
  </div>
</div>

{{-- Company Info --}}
<div class="card">
  <div class="card-title">🏢 Company Information</div>
  <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(240px,1fr));gap:1rem">
    <div class="form-group">
      <label class="form-label">Company Name</label>
      <input class="form-control" type="text" name="company_name" value="{{ $settings['company_name'] ?? '' }}" placeholder="Mambilla Legacy Farms"/>
    </div>
    <div class="form-group">
      <label class="form-label">Public Contact Email</label>
      <input class="form-control" type="email" name="company_email" value="{{ $settings['company_email'] ?? '' }}" placeholder="invest@legacyfarms.ng"/>
      <div style="font-size:.68rem;color:var(--t2);margin-top:.25rem">Shown in site footer and contact page.</div>
    </div>
    <div class="form-group">
      <label class="form-label">Company Phone</label>
      <input class="form-control" type="text" name="company_phone" value="{{ $settings['company_phone'] ?? '' }}" placeholder="+234 xxx xxx xxxx"/>
    </div>
    <div class="form-group">
      <label class="form-label">Company Address</label>
      <input class="form-control" type="text" name="company_address" value="{{ $settings['company_address'] ?? '' }}" placeholder="Mambilla Plateau, Taraba State"/>
    </div>
  </div>
</div>

{{-- Site Content --}}
<div class="card">
  <div class="card-title">✏️ Site Content</div>
  <p style="font-size:.78rem;color:var(--t2);margin-bottom:1.25rem;line-height:1.65">Update the announcement bar and hero section text shown on the homepage.</p>

  <div style="margin-bottom:1rem;padding-bottom:1rem;border-bottom:1px solid var(--border)">
    <div style="font-size:.7rem;font-weight:700;color:var(--t2);text-transform:uppercase;letter-spacing:.08em;margin-bottom:.75rem">📢 Announcement Bar (desktop top strip)</div>
    <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(240px,1fr));gap:1rem">
      <div class="form-group">
        <label class="form-label">Segment 1</label>
        <input class="form-control" type="text" name="site_ann_1" value="{{ $settings['site_ann_1'] ?? 'A SAB Foundation Initiative' }}"/>
      </div>
      <div class="form-group">
        <label class="form-label">Segment 2</label>
        <input class="form-control" type="text" name="site_ann_2" value="{{ $settings['site_ann_2'] ?? 'Promoted by Successory Nigeria Ltd' }}"/>
      </div>
      <div class="form-group">
        <label class="form-label">Segment 3</label>
        <input class="form-control" type="text" name="site_ann_3" value="{{ $settings['site_ann_3'] ?? 'Technical Partner: Farm Alert Ltd' }}"/>
      </div>
    </div>
  </div>

  <div style="font-size:.7rem;font-weight:700;color:var(--t2);text-transform:uppercase;letter-spacing:.08em;margin-bottom:.75rem">🦸 Homepage Hero Section</div>
  <div class="form-group">
    <label class="form-label">Eyebrow / Chip Text</label>
    <input class="form-control" type="text" name="site_hero_eyebrow" value="{{ $settings['site_hero_eyebrow'] ?? "Nigeria's Cattle Revolution" }}" placeholder="Nigeria's Cattle Revolution"/>
  </div>
  <div class="form-group">
    <label class="form-label">Hero Headline</label>
    <input class="form-control" type="text" name="site_hero_title" value="{{ $settings['site_hero_title'] ?? 'Build Lasting Wealth Through Livestock' }}" placeholder="Build Lasting Wealth Through Livestock"/>
    <div style="font-size:.68rem;color:var(--t2);margin-top:.25rem">Plain text only. The first sentence will be displayed as the headline.</div>
  </div>
  <div class="form-group">
    <label class="form-label">Hero Body Text</label>
    <textarea class="form-control" name="site_hero_body" rows="3" placeholder="Short description shown in the hero section...">{{ $settings['site_hero_body'] ?? '' }}</textarea>
  </div>
</div>

{{-- Logo --}}
<div class="card">
  <div class="card-title">🖼 Site Logo</div>
  @if(!empty($settings['company_logo_path']))
    <div style="margin-bottom:1rem">
      <img src="{{ asset('storage/' . $settings['company_logo_path']) }}" alt="Current logo" style="max-height:60px;border-radius:8px;background:rgba(255,255,255,.1);padding:.5rem"/>
      <div style="font-size:.72rem;color:var(--t2);margin-top:.35rem">Current logo. Upload a new one to replace it.</div>
    </div>
  @endif
  <div class="form-group">
    <label class="form-label">Upload Logo</label>
    <input class="form-control" type="file" name="logo" accept="image/*" style="cursor:pointer"/>
    <div style="font-size:.68rem;color:var(--t2);margin-top:.3rem">PNG, JPG or SVG · Max 2MB</div>
  </div>
</div>

{{-- Chatbot / Custom Scripts --}}
<div class="card">
  <div class="card-title">🤖 Chatbot &amp; Custom Scripts</div>
  <p style="font-size:.78rem;color:var(--t2);margin-bottom:1rem;line-height:1.65">Paste any third-party script here (chatbot widget, analytics, etc.). It will be injected just before the closing <code style="background:rgba(255,255,255,.06);padding:.1rem .35rem;border-radius:4px;font-size:.75rem">&lt;/body&gt;</code> tag on all public pages.</p>
  <div class="form-group">
    <label class="form-label">Custom Script / Chatbot Embed Code</label>
    <textarea class="form-control" name="chatbot_script" rows="6"
      placeholder="<!-- Paste your chatbot or custom script here, e.g: -->&#10;<script src=&quot;https://cdn.example.com/widget.js&quot;></script>"
      style="font-family:monospace;font-size:.8rem">{{ $settings['chatbot_script'] ?? '' }}</textarea>
    <div style="font-size:.68rem;color:rgba(231,76,60,.7);margin-top:.35rem;display:flex;align-items:center;gap:.4rem">
      ⚠️ Only paste scripts from trusted sources. Raw HTML/JavaScript is injected as-is.
    </div>
  </div>
</div>

<div style="display:flex;gap:.75rem">
  <button type="submit" class="btn btn-primary" style="padding:.7rem 1.75rem;font-size:.88rem">💾 Save All Settings</button>
  <a href="{{ route('admin.investors') }}" class="btn btn-ghost">Cancel</a>
</div>

</form>
@endsection

@push('scripts')
<script>
async function testSmtp() {
  const btn = document.getElementById('test-btn');
  const result = document.getElementById('test-result');
  btn.textContent = 'Sending…'; btn.disabled = true;
  try {
    const res = await fetch('{{ route('admin.settings.test-smtp') }}', {
      headers: {'X-Requested-With': 'XMLHttpRequest', 'X-CSRF-TOKEN': '{{ csrf_token() }}'}
    });
    const data = await res.json();
    result.textContent = data.message;
    result.style.color = data.ok ? '#8DC63F' : '#ff7070';
  } catch(e) {
    result.textContent = 'Request failed.';
    result.style.color = '#ff7070';
  }
  btn.textContent = '🔌 Send Test Email'; btn.disabled = false;
}
</script>
@endpush
