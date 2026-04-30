@extends('layouts.dashboard')
@section('title', 'My Dashboard')

@section('content')
<div style="margin-bottom:2rem">
  <h1 style="font-size:1.6rem;font-weight:700;color:var(--ink)">Welcome, <em style="color:var(--pkd)">{{ $investor->full_name }}</em></h1>
  <p style="color:#888;font-size:.86rem;margin-top:.3rem">Here's an overview of your investment with Mambilla Legacy Farms.</p>
</div>

<!-- Status + Ref card -->
<div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(200px,1fr));gap:1rem;margin-bottom:2rem">
  <div style="background:#fff;border-radius:14px;padding:1.2rem 1.4rem;box-shadow:0 3px 18px rgba(255,84,135,.08);border-left:4px solid var(--pk)">
    <div style="font-size:.65rem;font-weight:700;color:#aaa;text-transform:uppercase;letter-spacing:.08em;margin-bottom:.4rem">Reference Number</div>
    <div style="font-size:1.2rem;font-weight:800;color:var(--pkd);font-family:'Cormorant Garamond',serif;letter-spacing:.04em">{{ $investor->reference_number }}</div>
  </div>
  <div style="background:#fff;border-radius:14px;padding:1.2rem 1.4rem;box-shadow:0 3px 18px rgba(255,84,135,.08);border-left:4px solid var(--gn, #8DC63F)">
    <div style="font-size:.65rem;font-weight:700;color:#aaa;text-transform:uppercase;letter-spacing:.08em;margin-bottom:.4rem">Investment Tier</div>
    <div style="font-size:1.2rem;font-weight:800;color:var(--ink)">{{ $investor->tier }}</div>
    <div style="font-size:.75rem;color:#888;margin-top:.2rem">{{ $investor->tierAmount() }}</div>
  </div>
  <div style="background:#fff;border-radius:14px;padding:1.2rem 1.4rem;box-shadow:0 3px 18px rgba(255,84,135,.08)">
    <div style="font-size:.65rem;font-weight:700;color:#aaa;text-transform:uppercase;letter-spacing:.08em;margin-bottom:.4rem">Account Status</div>
    <span class="badge badge-{{ $investor->statusBadgeClass() }}" style="font-size:.82rem;padding:4px 14px">{{ ucfirst($investor->status) }}</span>
  </div>
  <div style="background:#fff;border-radius:14px;padding:1.2rem 1.4rem;box-shadow:0 3px 18px rgba(255,84,135,.08)">
    <div style="font-size:.65rem;font-weight:700;color:#aaa;text-transform:uppercase;letter-spacing:.08em;margin-bottom:.4rem">Registered</div>
    <div style="font-size:.95rem;font-weight:600;color:var(--ink)">{{ $investor->created_at->format('d M Y') }}</div>
    <div style="font-size:.73rem;color:#aaa">{{ $investor->created_at->diffForHumans() }}</div>
  </div>
</div>

<!-- Status explanation -->
<div style="background:#fff;border-radius:14px;padding:1.4rem 1.6rem;box-shadow:0 3px 18px rgba(255,84,135,.07);margin-bottom:2rem">
  <h3 style="font-size:.95rem;font-weight:700;margin-bottom:.5rem">What happens next?</h3>
  <div style="display:flex;flex-direction:column;gap:.6rem">
    @foreach([
      ['pending',  '1', 'Registration Received',     'Your subscription form has been received and is under review.'],
      ['approved', '2', 'Approval & Agreement',       'Our team will contact you with the SPV subscription agreement for signing.'],
      ['active',   '3', 'Payment & Allotment',        'Complete the 3-tranche payment. Cattle are allotted and RFID-tagged in your name.'],
      ['completed','4', 'Returns & Settlement',       'Quarterly dairy payouts from Year 3. Full settlement at Year 5.'],
    ] as [$st, $num, $title, $desc])
    <div style="display:flex;align-items:flex-start;gap:.85rem;padding:.65rem 0;{{ !$loop->last ? 'border-bottom:1px solid var(--pkl)' : '' }}">
      <div style="width:28px;height:28px;border-radius:50%;background:{{ $investor->status === $st || ($st === 'pending' && $investor->status === 'pending') ? 'linear-gradient(135deg,var(--pkd),var(--pk))' : 'var(--pkl)' }};display:grid;place-items:center;flex-shrink:0;font-size:.72rem;font-weight:700;color:{{ $investor->status === $st ? '#fff' : 'var(--pkd)' }}">{{ $num }}</div>
      <div>
        <div style="font-size:.84rem;font-weight:700;color:var(--ink)">{{ $title }}</div>
        <div style="font-size:.77rem;color:#888;margin-top:.15rem">{{ $desc }}</div>
      </div>
    </div>
    @endforeach
  </div>
</div>

<!-- Payment tranches -->
<div style="background:#fff;border-radius:14px;padding:1.4rem 1.6rem;box-shadow:0 3px 18px rgba(255,84,135,.07);margin-bottom:2rem">
  <h3 style="font-size:.95rem;font-weight:700;margin-bottom:1rem">💰 Payment Tranches</h3>
  @foreach([['Tranche 1 — On signing','50%'],['Tranche 2 — 60 days','30%'],['Tranche 3 — 90 days','20%']] as [$t,$p])
  <div style="display:flex;justify-content:space-between;padding:.5rem 0;{{ !$loop->last ? 'border-bottom:1px solid var(--pkl)' : '' }};font-size:.85rem">
    <span style="color:#555">{{ $t }}</span><strong style="color:var(--pkd)">{{ $p }}</strong>
  </div>
  @endforeach
  <div style="margin-top:.85rem;padding:.65rem;background:var(--pklx);border-radius:9px;font-size:.74rem;color:#777;line-height:1.55">
    Pay to: <strong style="color:var(--pkd)">Mambilla Legacy Farms</strong><br>
    Ref: <strong>{{ $investor->reference_number }}</strong>
  </div>
</div>

<div style="text-align:center;margin-top:2rem">
  <a href="{{ route('investor.profile') }}" style="display:inline-block;background:linear-gradient(135deg,var(--pkd),var(--pk));color:#fff;padding:.75rem 1.8rem;border-radius:10px;font-weight:700;font-size:.88rem;text-decoration:none">View Full Profile →</a>
</div>
@endsection
