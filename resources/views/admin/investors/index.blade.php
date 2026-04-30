@extends('layouts.admin')
@section('title', 'Investors')
@section('page-title', 'Investor Registry')

@section('content')
<!-- Stats -->
<div class="stats-grid">
  <div class="stat-card"><div class="stat-val">{{ $stats['total'] }}</div><div class="stat-label">Total Investors</div></div>
  <div class="stat-card"><div class="stat-val" style="color:#f5a623">{{ $stats['pending'] }}</div><div class="stat-label">Pending Review</div></div>
  <div class="stat-card"><div class="stat-val" style="color:#8DC63F">{{ $stats['approved'] }}</div><div class="stat-label">Approved</div></div>
  <div class="stat-card"><div class="stat-val" style="color:#3498db">{{ $stats['active'] }}</div><div class="stat-label">Active</div></div>
</div>

<!-- Toolbar -->
<div class="toolbar">
  <div class="toolbar-left">
    <a href="{{ route('admin.export.excel') }}" class="btn btn-primary">📊 Export Excel</a>
    <a href="{{ route('admin.export.csv') }}" class="btn btn-ghost">📄 Export CSV</a>
  </div>
  <form method="GET" action="{{ route('admin.investors') }}" style="display:flex;gap:.5rem;flex-wrap:wrap">
    <input class="form-control" type="search" name="search" value="{{ request('search') }}" placeholder="Search name, email, ref…" style="width:200px;padding:.45rem .8rem"/>
    <select class="form-control" name="status" style="width:130px;padding:.45rem .8rem">
      <option value="">All Status</option>
      @foreach(['pending','approved','active','suspended','completed'] as $s)
        <option value="{{ $s }}" {{ request('status') === $s ? 'selected' : '' }}>{{ ucfirst($s) }}</option>
      @endforeach
    </select>
    <select class="form-control" name="tier" style="width:130px;padding:.45rem .8rem">
      <option value="">All Tiers</option>
      @foreach(['Starter','Bronze','Silver','Gold','Platinum','Diamond','Custom'] as $t)
        <option value="{{ $t }}" {{ request('tier') === $t ? 'selected' : '' }}>{{ $t }}</option>
      @endforeach
    </select>
    <button type="submit" class="btn btn-ghost">Filter</button>
    @if(request()->hasAny(['search','status','tier']))
      <a href="{{ route('admin.investors') }}" class="btn btn-ghost">Clear</a>
    @endif
  </form>
</div>

<!-- Table -->
<div class="tbl-wrap">
  <table>
    <thead>
      <tr>
        <th>Reference</th>
        <th>Full Name</th>
        <th>Email</th>
        <th>Tier</th>
        <th>Type</th>
        <th>Status</th>
        <th>Country</th>
        <th>Registered</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      @forelse($investors as $inv)
      <tr>
        <td class="muted" style="font-family:monospace;font-size:.75rem">{{ $inv->reference_number }}</td>
        <td><strong>{{ $inv->full_name }}</strong></td>
        <td class="muted">{{ $inv->user->email ?? '—' }}</td>
        <td><span class="badge badge-pink">{{ $inv->tier }}</span></td>
        <td class="muted">{{ Str::before($inv->investor_type, ' Investor') }}</td>
        <td><span class="badge badge-{{ $inv->statusBadgeClass() }}">{{ ucfirst($inv->status) }}</span></td>
        <td class="muted">{{ $inv->country }}</td>
        <td class="muted">{{ $inv->created_at->format('d M Y') }}</td>
        <td>
          <a href="{{ route('admin.investors.show', $inv) }}" class="btn btn-ghost" style="padding:.35rem .7rem;font-size:.72rem">View →</a>
        </td>
      </tr>
      @empty
      <tr><td colspan="9" style="padding:2.5rem;text-align:center;color:var(--t2)">No investors found{{ request()->hasAny(['search','status','tier']) ? ' matching your filters' : ' yet' }}.</td></tr>
      @endforelse
    </tbody>
  </table>
</div>

<!-- Pagination -->
<div class="pager">
  <span>Showing {{ $investors->firstItem() }}–{{ $investors->lastItem() }} of {{ $investors->total() }} investors</span>
  <div>{{ $investors->links('vendor.pagination.simple-default') }}</div>
</div>
@endsection
