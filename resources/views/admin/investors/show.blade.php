@extends('layouts.admin')
@section('title', $investor->full_name)
@section('page-title', 'Investor Detail')

@section('content')
<div style="margin-bottom:1.25rem">
  <a href="{{ route('admin.investors') }}" class="btn btn-ghost" style="font-size:.76rem">← All Investors</a>
</div>

<!-- Header card -->
<div class="card" style="display:flex;align-items:center;justify-content:space-between;flex-wrap:wrap;gap:1rem;background:linear-gradient(135deg,#1c1028,#251535)">
  <div>
    <div style="font-size:.65rem;color:var(--t2);text-transform:uppercase;letter-spacing:.1em;margin-bottom:.3rem">{{ $investor->reference_number }}</div>
    <h2 style="font-size:1.4rem;font-weight:700;color:var(--t1)">{{ $investor->full_name }}</h2>
    <div style="display:flex;align-items:center;gap:.65rem;margin-top:.5rem;flex-wrap:wrap">
      <span class="badge badge-pink" style="font-size:.75rem">{{ $investor->tier }}</span>
      <span class="badge badge-{{ $investor->statusBadgeClass() }}" style="font-size:.75rem">{{ ucfirst($investor->status) }}</span>
      <span style="font-size:.75rem;color:var(--t2)">{{ $investor->tierAmount() }}</span>
    </div>
  </div>
  <div style="display:flex;gap:.5rem;flex-wrap:wrap">
    <a href="mailto:{{ $investor->user->email }}" class="btn btn-primary">✉ Email Investor</a>
  </div>
</div>

<!-- Status update -->
<div class="card">
  <div class="card-title">Update Status</div>
  <form method="POST" action="{{ route('admin.investors.status', $investor) }}" style="display:flex;align-items:flex-end;gap:.75rem;flex-wrap:wrap">
    @csrf @method('PATCH')
    <div>
      <label class="form-label" style="margin-bottom:.4rem">New Status</label>
      <select name="status" class="form-control" style="width:190px">
        @foreach(['pending','approved','active','suspended','completed'] as $s)
          <option value="{{ $s }}" {{ $investor->status === $s ? 'selected' : '' }}>{{ ucfirst($s) }}</option>
        @endforeach
      </select>
    </div>
    <div style="display:flex;align-items:center;gap:.45rem;padding-bottom:.45rem">
      <input type="checkbox" name="notify_investor" value="1" id="notify_cb" checked
             style="width:15px;height:15px;accent-color:var(--pk);cursor:pointer"/>
      <label for="notify_cb" style="font-size:.8rem;color:var(--t2);cursor:pointer;white-space:nowrap">
        Email investor about this change
      </label>
    </div>
    <button type="submit" class="btn btn-primary" style="padding-bottom:.47rem">Update Status</button>
  </form>
  <div style="margin-top:.75rem;padding:.65rem .85rem;background:rgba(255,255,255,.03);border-radius:8px;font-size:.72rem;color:var(--t3);line-height:1.65">
    Status-change emails are sent to <strong style="color:var(--t2)">{{ $investor->user->email }}</strong>.
    Uncheck the box to update silently.
  </div>
</div>

<!-- Detail sections -->
@php
$sections = [
  ['👤 Personal Information', [
    'Full Name'       => $investor->full_name,
    'Date of Birth'   => $investor->date_of_birth?->format('d M Y'),
    'Investor Type'   => $investor->investor_type,
    'BVN / RC No.'    => $investor->bvn_rc_number,
    'Tax ID (TIN)'    => $investor->tax_id ?? '—',
  ]],
  ['📞 Contact Details', [
    'Email'           => $investor->user->email ?? '—',
    'Primary Phone'   => $investor->phone_primary,
    'Alternate Phone' => $investor->phone_alternate ?? '—',
    'Address'         => $investor->address,
    'City / State'    => $investor->city_state ?? '—',
    'Country'         => $investor->country,
    'Communication'   => $investor->communication_prefs ?? '—',
  ]],
  ['💰 Investment Details', [
    'Tier'            => $investor->tier,
    'Amount'          => $investor->tierAmount(),
    'Custom Amount'   => $investor->custom_amount ?? '—',
    'Payment Method'  => $investor->payment_method,
    'Notes'           => $investor->notes ?? '—',
    'Registered'      => $investor->created_at->format('d M Y, H:i'),
  ]],
];
@endphp

<div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(300px,1fr));gap:1rem">
@foreach($sections as [$title, $fields])
<div class="card">
  <div class="card-title">{{ $title }}</div>
  @foreach($fields as $label => $value)
  <div style="display:flex;gap:.75rem;padding:.45rem 0;{{ !$loop->last ? 'border-bottom:1px solid var(--border)' : '' }}">
    <div style="width:130px;flex-shrink:0;font-size:.69rem;font-weight:700;color:var(--t2);text-transform:uppercase;letter-spacing:.05em;padding-top:.05rem">{{ $label }}</div>
    <div style="font-size:.82rem;color:var(--t1);flex:1;word-break:break-word">{{ $value }}</div>
  </div>
  @endforeach
</div>
@endforeach
</div>
@endsection
