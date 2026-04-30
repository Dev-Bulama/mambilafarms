@extends('layouts.dashboard')
@section('title', 'My Profile')

@section('content')
<div style="margin-bottom:1.75rem;display:flex;align-items:center;justify-content:space-between;flex-wrap:wrap;gap:.75rem">
  <h1 style="font-size:1.4rem;font-weight:700;color:var(--ink)">My Investment Profile</h1>
  <span style="font-size:.78rem;color:#888">Ref: <strong style="color:var(--pkd)">{{ $investor->reference_number }}</strong></span>
</div>

@php
  $sections = [
    'Personal Information' => [
      'Full Name'       => $investor->full_name,
      'Date of Birth'   => $investor->date_of_birth?->format('d M Y'),
      'Investor Type'   => $investor->investor_type,
    ],
    'Contact Details' => [
      'Email'           => auth()->user()->email,
      'Primary Phone'   => $investor->phone_primary,
      'Alternate Phone' => $investor->phone_alternate ?? '—',
      'Address'         => $investor->address,
      'City / State'    => $investor->city_state ?? '—',
      'Country'         => $investor->country,
      'Communication'   => $investor->communication_prefs ?? '—',
    ],
    'Investment Details' => [
      'Tier'            => $investor->tier,
      'Amount'          => $investor->tierAmount(),
      'Payment Method'  => $investor->payment_method,
      'Status'          => ucfirst($investor->status),
      'Notes'           => $investor->notes ?? '—',
    ],
  ];
@endphp

@foreach($sections as $title => $fields)
<div style="background:#fff;border-radius:14px;padding:1.4rem 1.6rem;box-shadow:0 3px 18px rgba(255,84,135,.07);margin-bottom:1.25rem">
  <h3 style="font-size:.75rem;font-weight:700;color:var(--pkd);text-transform:uppercase;letter-spacing:.1em;margin-bottom:1rem">{{ $title }}</h3>
  @foreach($fields as $label => $value)
  <div style="display:flex;gap:1rem;padding:.5rem 0;{{ !$loop->last ? 'border-bottom:1px solid var(--pkl)' : '' }};flex-wrap:wrap">
    <div style="width:145px;flex-shrink:0;font-size:.73rem;font-weight:600;color:#aaa;text-transform:uppercase;letter-spacing:.05em">{{ $label }}</div>
    <div style="font-size:.86rem;color:var(--ink);font-weight:500;flex:1">{{ $value }}</div>
  </div>
  @endforeach
</div>
@endforeach

<div style="text-align:center;margin-top:1.5rem">
  <a href="{{ route('investor.dashboard') }}" style="color:var(--pkd);text-decoration:none;font-size:.84rem;font-weight:600">← Back to Dashboard</a>
</div>
@endsection
