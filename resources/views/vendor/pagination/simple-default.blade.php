@if ($paginator->hasPages())
<div style="display:flex;gap:.4rem">
  @if ($paginator->onFirstPage())
    <span class="btn btn-ghost" style="opacity:.35;cursor:default">← Prev</span>
  @else
    <a href="{{ $paginator->previousPageUrl() }}" class="btn btn-ghost">← Prev</a>
  @endif
  @if ($paginator->hasMorePages())
    <a href="{{ $paginator->nextPageUrl() }}" class="btn btn-ghost">Next →</a>
  @else
    <span class="btn btn-ghost" style="opacity:.35;cursor:default">Next →</span>
  @endif
</div>
@endif
