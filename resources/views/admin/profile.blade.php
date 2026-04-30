@extends('layouts.admin')
@section('title', 'My Profile')
@section('page-title', 'Admin Profile')

@section('content')
<div style="max-width:580px">

  @if($errors->any())
    <div class="alert alert-error">
      @foreach($errors->all() as $error)
        <div>⚠️ {{ $error }}</div>
      @endforeach
    </div>
  @endif

  <form method="POST" action="{{ route('admin.profile.update') }}">
  @csrf

  <div class="card">
    <div class="card-title">👤 Account Information</div>
    <div class="form-group">
      <label class="form-label">Full Name</label>
      <input class="form-control" type="text" name="name" value="{{ old('name', auth()->user()->name) }}" required/>
    </div>
    <div class="form-group">
      <label class="form-label">Email Address</label>
      <input class="form-control" type="email" name="email" value="{{ old('email', auth()->user()->email) }}" required/>
    </div>
    <div style="font-size:.72rem;color:var(--t2);margin-top:.25rem">
      Role: <strong style="color:var(--pk)">{{ ucfirst(auth()->user()->role) }}</strong>
      &nbsp;·&nbsp; Joined: {{ auth()->user()->created_at->format('d M Y') }}
    </div>
  </div>

  <div class="card">
    <div class="card-title">🔐 Change Password</div>
    <p style="font-size:.78rem;color:var(--t2);margin-bottom:1rem">Leave all password fields blank if you do not want to change your password.</p>
    <div class="form-group">
      <label class="form-label">Current Password</label>
      <input class="form-control" type="password" name="current_password" placeholder="Enter current password" autocomplete="current-password"/>
    </div>
    <div class="form-group">
      <label class="form-label">New Password</label>
      <input class="form-control" type="password" name="new_password" placeholder="Min. 8 characters" autocomplete="new-password"/>
    </div>
    <div class="form-group">
      <label class="form-label">Confirm New Password</label>
      <input class="form-control" type="password" name="new_password_confirmation" placeholder="Repeat new password" autocomplete="new-password"/>
    </div>
  </div>

  <div style="display:flex;gap:.75rem">
    <button type="submit" class="btn btn-primary" style="padding:.7rem 1.75rem;font-size:.88rem">💾 Save Changes</button>
    <a href="{{ route('admin.investors') }}" class="btn btn-ghost">Cancel</a>
  </div>

  </form>
</div>
@endsection
