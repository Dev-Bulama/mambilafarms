@extends('layouts.admin')
@section('title', 'Content Management')
@section('page-title', 'Content Management (CMS)')

@push('styles')
<style>
.cms-tabs{display:flex;gap:.3rem;flex-wrap:wrap;margin-bottom:1.5rem;border-bottom:1px solid var(--border);padding-bottom:.75rem}
.cms-tab{padding:.45rem 1rem;border-radius:8px;font-size:.78rem;font-weight:600;cursor:pointer;border:none;font-family:inherit;background:transparent;color:var(--t2);transition:background .15s,color .15s}
.cms-tab:hover{background:rgba(255,255,255,.05);color:var(--t1)}
.cms-tab.active{background:rgba(255,84,135,.15);color:var(--pk)}
.cms-pane{display:none}.cms-pane.active{display:block}
.sec-hdr{font-size:.65rem;font-weight:700;color:var(--t3);text-transform:uppercase;letter-spacing:.1em;padding:.35rem .6rem;margin:1.2rem 0 .8rem;border-left:3px solid var(--pk)}
</style>
@endpush

@section('content')
<form method="POST" action="{{ route('admin.cms.update') }}">
@csrf

{{-- Tabs --}}
<div class="cms-tabs">
  <button type="button" class="cms-tab active" onclick="showTab('home')">🏠 Homepage</button>
  <button type="button" class="cms-tab" onclick="showTab('about')">📖 About</button>
  <button type="button" class="cms-tab" onclick="showTab('wwd')">⚙️ What We Do</button>
  <button type="button" class="cms-tab" onclick="showTab('tiers')">💰 Tiers</button>
  <button type="button" class="cms-tab" onclick="showTab('global')">🌐 Global / Nav</button>
</div>

{{-- ══════════════════════════════ HOME ══════════════════════════════ --}}
<div class="cms-pane active" id="pane-home">

  <div class="card">
    <div class="card-title">🦸 Hero Section</div>
    <div class="form-group">
      <label class="form-label">Eyebrow / Chip Text</label>
      <input class="form-control" type="text" name="site_hero_eyebrow"
        value="{{ $settings['site_hero_eyebrow'] ?? "Nigeria's Cattle Revolution" }}"
        placeholder="Nigeria's Cattle Revolution"/>
    </div>
    <div class="form-group">
      <label class="form-label">Hero Headline</label>
      <input class="form-control" type="text" name="site_hero_title"
        value="{{ $settings['site_hero_title'] ?? 'Build Lasting Wealth Through Livestock' }}"
        placeholder="Build Lasting Wealth Through Livestock"/>
    </div>
    <div class="form-group">
      <label class="form-label">Hero Body Text</label>
      <textarea class="form-control" name="site_hero_body" rows="3"
        placeholder="Short description shown in the hero section...">{{ $settings['site_hero_body'] ?? 'Join a structured 5-year cattle investment programme delivering 34–300% returns, backed by an SPV legal structure, livestock insurance and quarterly reporting.' }}</textarea>
    </div>
  </div>

  <div class="card">
    <div class="card-title">📊 Hero Stats Bar</div>
    <p style="font-size:.78rem;color:var(--t2);margin-bottom:1rem">The 5 statistics shown at the bottom of the homepage hero.</p>
    @foreach([
      [1,'1M','Head of Cattle','var(--pk)'],
      [2,'57%','Annual Returns','var(--gn)'],
      [3,'50K+','Jobs Created','var(--pk)'],
      [4,'₦5T','GDP Contribution','var(--gn)'],
      [5,'5yrs','Investment Horizon','var(--pk)'],
    ] as [$i,$dv,$dl,$c])
    <div style="display:grid;grid-template-columns:1fr 1fr;gap:.75rem;margin-bottom:.75rem;padding-bottom:.75rem;border-bottom:1px solid var(--border)">
      <div class="form-group" style="margin:0">
        <label class="form-label">Stat {{ $i }} — Number / Value</label>
        <input class="form-control" type="text" name="home_stat_{{ $i }}_num"
          value="{{ $settings['home_stat_'.$i.'_num'] ?? $dv }}" placeholder="{{ $dv }}"/>
      </div>
      <div class="form-group" style="margin:0">
        <label class="form-label">Stat {{ $i }} — Label</label>
        <input class="form-control" type="text" name="home_stat_{{ $i }}_label"
          value="{{ $settings['home_stat_'.$i.'_label'] ?? $dl }}" placeholder="{{ $dl }}"/>
      </div>
    </div>
    @endforeach
  </div>

  <div class="card">
    <div class="card-title">🏛️ Three Pillars Section</div>
    @foreach([
      [1,'🥛','Dairy &amp; Artisan Products','Fresh milk, yogurt, artisan cheese, butter and ghee from Friesian crossbreeds. Premium pricing, year-round demand.','Quarterly payouts from Year 3'],
      [2,'🥩','Premium Beef &amp; Abattoir','Feedlot-finished premium cuts, branded packaging and ECOWAS regional export through a modern certified abattoir.','Event payouts from Year 3'],
      [3,'🧬','AI Breeding Stock','F1 crossbreeds (Friesian × Simmental × Gudali) sold to smallholder farmers and government programmes nationwide.','Proportionate share from Year 3'],
    ] as [$i,$di,$dt,$db,$dtag])
    <div style="margin-bottom:1.25rem;padding-bottom:1.25rem;border-bottom:{{ $i<3 ? '1px solid var(--border)' : 'none' }}">
      <div style="font-size:.68rem;font-weight:700;color:var(--t2);margin-bottom:.65rem;text-transform:uppercase;letter-spacing:.07em">Pillar {{ $i }}</div>
      <div style="display:grid;grid-template-columns:80px 1fr;gap:.75rem;margin-bottom:.65rem">
        <div class="form-group" style="margin:0">
          <label class="form-label">Icon</label>
          <input class="form-control" type="text" name="home_pillar_{{ $i }}_icon"
            value="{{ $settings['home_pillar_'.$i.'_icon'] ?? $di }}" placeholder="🥛"/>
        </div>
        <div class="form-group" style="margin:0">
          <label class="form-label">Title</label>
          <input class="form-control" type="text" name="home_pillar_{{ $i }}_title"
            value="{{ $settings['home_pillar_'.$i.'_title'] ?? $dt }}" placeholder="{{ $dt }}"/>
        </div>
      </div>
      <div class="form-group" style="margin-bottom:.65rem">
        <label class="form-label">Body Text</label>
        <textarea class="form-control" name="home_pillar_{{ $i }}_body" rows="2">{{ $settings['home_pillar_'.$i.'_body'] ?? $db }}</textarea>
      </div>
      <div class="form-group" style="margin:0">
        <label class="form-label">Tag / Badge Text</label>
        <input class="form-control" type="text" name="home_pillar_{{ $i }}_tag"
          value="{{ $settings['home_pillar_'.$i.'_tag'] ?? $dtag }}" placeholder="{{ $dtag }}"/>
      </div>
    </div>
    @endforeach
  </div>

  <div class="card">
    <div class="card-title">🌿 Why Invest Section</div>
    <div class="form-group">
      <label class="form-label">Chip / Badge Text</label>
      <input class="form-control" type="text" name="home_why_chip"
        value="{{ $settings['home_why_chip'] ?? 'Why Mambilla' }}" placeholder="Why Mambilla"/>
    </div>
    <div class="form-group">
      <label class="form-label">Heading</label>
      <input class="form-control" type="text" name="home_why_heading"
        value="{{ $settings['home_why_heading'] ?? 'A Structured Pathway to Agricultural Wealth' }}"
        placeholder="A Structured Pathway to Agricultural Wealth"/>
    </div>
    <div class="form-group">
      <label class="form-label">Body Text</label>
      <textarea class="form-control" name="home_why_body" rows="3">{{ $settings['home_why_body'] ?? 'The Mambilla Plateau—Nigeria\'s highest grassland—offers optimal conditions: cool climate, vast water resources, rich pasture and government-backed agricultural zones, giving our herd a natural competitive advantage.' }}</textarea>
    </div>
    <div class="form-group">
      <label class="form-label">Return Badge (e.g. 57%)</label>
      <input class="form-control" type="text" name="home_why_stat"
        value="{{ $settings['home_why_stat'] ?? '57%' }}" placeholder="57%"/>
    </div>
  </div>

  <div class="card">
    <div class="card-title">📣 CTA Banner (Bottom of Homepage)</div>
    <div class="form-group">
      <label class="form-label">Heading</label>
      <input class="form-control" type="text" name="home_cta_heading"
        value="{{ $settings['home_cta_heading'] ?? 'Ready to Build Your Legacy?' }}"
        placeholder="Ready to Build Your Legacy?"/>
    </div>
    <div class="form-group">
      <label class="form-label">Body Text</label>
      <textarea class="form-control" name="home_cta_body" rows="2">{{ $settings['home_cta_body'] ?? 'Complete the subscription form and our team will contact you within 24 hours.' }}</textarea>
    </div>
  </div>

</div>{{-- /pane-home --}}

{{-- ══════════════════════════════ ABOUT ══════════════════════════════ --}}
<div class="cms-pane" id="pane-about">

  <div class="card">
    <div class="card-title">🏔️ About Hero</div>
    <div class="form-group">
      <label class="form-label">Page Heading</label>
      <input class="form-control" type="text" name="about_hero_title"
        value="{{ $settings['about_hero_title'] ?? 'About the Programme' }}"
        placeholder="About the Programme"/>
    </div>
    <div class="form-group">
      <label class="form-label">Sub-heading</label>
      <input class="form-control" type="text" name="about_hero_sub"
        value="{{ $settings['about_hero_sub'] ?? 'A structured, transparent pathway to wealth through Nigeria\'s cattle economy.' }}"
        placeholder="Subtitle text"/>
    </div>
  </div>

  <div class="card">
    <div class="card-title">🎯 Vision &amp; Mission Section</div>
    <div class="form-group">
      <label class="form-label">Heading</label>
      <input class="form-control" type="text" name="about_vision_heading"
        value="{{ $settings['about_vision_heading'] ?? 'Building Nigeria\'s Largest Cattle Economy' }}"
        placeholder="Heading"/>
    </div>
    <div class="form-group">
      <label class="form-label">First Paragraph</label>
      <textarea class="form-control" name="about_vision_body1" rows="3">{{ $settings['about_vision_body1'] ?? "Mambilla Legacy Farms is a structured 5-year livestock investment programme targeting a 1-million-head cattle herd on the Mambilla Plateau, Taraba State. The programme targets 50,000+ jobs, ₦4–5 trillion in GDP contribution and sustainable generational wealth for Nigerian investors." }}</textarea>
    </div>
    <div class="form-group">
      <label class="form-label">Second Paragraph</label>
      <textarea class="form-control" name="about_vision_body2" rows="3">{{ $settings['about_vision_body2'] ?? "Leveraging indigenous Adamawa Gudali genetics enhanced through AI-assisted breeding with Friesian and Simmental crosses, we target superior milk yields, premium beef quality and highly sought-after breeding stock." }}</textarea>
    </div>
  </div>

  <div class="card">
    <div class="card-title">🤝 Partners Section</div>
    @foreach([
      [1,'SAB Foundation','Promoter','Provides governance oversight, ensures SPV compliance and investor protection frameworks.'],
      [2,'Farm Alert Ltd','Technical Partner','Responsible for herd management, veterinary services, AI breeding and operational oversight.'],
      [3,'Successory Nigeria Ltd','Business Development','Drives investor relations, subscription marketing and institutional partnerships.'],
    ] as [$i,$dn,$dr,$dd])
    <div style="margin-bottom:1.25rem;padding-bottom:1.25rem;border-bottom:{{ $i<3 ? '1px solid var(--border)' : 'none' }}">
      <div style="font-size:.68rem;font-weight:700;color:var(--t2);margin-bottom:.65rem;text-transform:uppercase;letter-spacing:.07em">Partner {{ $i }}</div>
      <div style="display:grid;grid-template-columns:1fr 1fr;gap:.75rem;margin-bottom:.65rem">
        <div class="form-group" style="margin:0">
          <label class="form-label">Name</label>
          <input class="form-control" type="text" name="about_partner_{{ $i }}_name"
            value="{{ $settings['about_partner_'.$i.'_name'] ?? $dn }}" placeholder="{{ $dn }}"/>
        </div>
        <div class="form-group" style="margin:0">
          <label class="form-label">Role</label>
          <input class="form-control" type="text" name="about_partner_{{ $i }}_role"
            value="{{ $settings['about_partner_'.$i.'_role'] ?? $dr }}" placeholder="{{ $dr }}"/>
        </div>
      </div>
      <div class="form-group" style="margin:0">
        <label class="form-label">Description</label>
        <textarea class="form-control" name="about_partner_{{ $i }}_desc" rows="2">{{ $settings['about_partner_'.$i.'_desc'] ?? $dd }}</textarea>
      </div>
    </div>
    @endforeach
  </div>

  <div class="card">
    <div class="card-title">📣 About CTA</div>
    <div class="form-group">
      <label class="form-label">Heading</label>
      <input class="form-control" type="text" name="about_cta_heading"
        value="{{ $settings['about_cta_heading'] ?? 'Ready to Join?' }}"
        placeholder="Ready to Join?"/>
    </div>
    <div class="form-group">
      <label class="form-label">Body Text</label>
      <textarea class="form-control" name="about_cta_body" rows="2">{{ $settings['about_cta_body'] ?? 'Choose your tier and complete the subscription form. Our team responds within 24 hours.' }}</textarea>
    </div>
  </div>

</div>{{-- /pane-about --}}

{{-- ══════════════════════════════ WHAT WE DO ══════════════════════════════ --}}
<div class="cms-pane" id="pane-wwd">

  <div class="card">
    <div class="card-title">🏔️ Page Hero</div>
    <div class="form-group">
      <label class="form-label">Page Heading</label>
      <input class="form-control" type="text" name="wwd_hero_title"
        value="{{ $settings['wwd_hero_title'] ?? 'What We Do' }}" placeholder="What We Do"/>
    </div>
    <div class="form-group">
      <label class="form-label">Sub-heading</label>
      <input class="form-control" type="text" name="wwd_hero_sub"
        value="{{ $settings['wwd_hero_sub'] ?? 'Three integrated revenue streams delivering consistent, compounding returns from Year 3.' }}"
        placeholder="Subtitle text"/>
    </div>
  </div>

  <div class="card">
    <div class="card-title">⚡ Revenue Streams</div>
    @foreach([
      [1,'🥛','Dairy &amp; Artisan Products','Our Friesian crossbreeds produce premium A2 milk processed into fresh milk, artisan yogurt, aged cheese, cultured butter and pure ghee for the Nigerian premium market and ECOWAS exports.','Quarterly payouts from Year 3'],
      [2,'🥩','Premium Beef &amp; Abattoir','A modern certified abattoir processes feedlot-finished cattle into branded premium cuts for top-tier Nigerian restaurants, hotels and supermarket chains, with export capability to ECOWAS markets.','Event payouts from Year 3'],
      [3,'🧬','AI Breeding &amp; Superior Genetics','Our AI-assisted breeding programme crosses indigenous Adamawa Gudali with Friesian and Simmental genetics to produce F1 crossbreeds sold to smallholder farmers and government programmes across Nigeria.','Proportionate share from Year 3'],
    ] as [$i,$di,$dt,$db,$dpay])
    <div style="margin-bottom:1.25rem;padding-bottom:1.25rem;border-bottom:{{ $i<3 ? '1px solid var(--border)' : 'none' }}">
      <div style="font-size:.68rem;font-weight:700;color:var(--t2);margin-bottom:.65rem;text-transform:uppercase;letter-spacing:.07em">Stream {{ $i }}</div>
      <div style="display:grid;grid-template-columns:80px 1fr;gap:.75rem;margin-bottom:.65rem">
        <div class="form-group" style="margin:0">
          <label class="form-label">Icon</label>
          <input class="form-control" type="text" name="wwd_stream_{{ $i }}_icon"
            value="{{ $settings['wwd_stream_'.$i.'_icon'] ?? $di }}" placeholder="🥛"/>
        </div>
        <div class="form-group" style="margin:0">
          <label class="form-label">Title</label>
          <input class="form-control" type="text" name="wwd_stream_{{ $i }}_title"
            value="{{ $settings['wwd_stream_'.$i.'_title'] ?? $dt }}" placeholder="{{ $dt }}"/>
        </div>
      </div>
      <div class="form-group" style="margin-bottom:.65rem">
        <label class="form-label">Body Text</label>
        <textarea class="form-control" name="wwd_stream_{{ $i }}_body" rows="3">{{ $settings['wwd_stream_'.$i.'_body'] ?? $db }}</textarea>
      </div>
      <div class="form-group" style="margin:0">
        <label class="form-label">Payout Badge</label>
        <input class="form-control" type="text" name="wwd_stream_{{ $i }}_payout"
          value="{{ $settings['wwd_stream_'.$i.'_payout'] ?? $dpay }}" placeholder="{{ $dpay }}"/>
      </div>
    </div>
    @endforeach
  </div>

  <div class="card">
    <div class="card-title">🔄 How It Works Section</div>
    <div class="form-group">
      <label class="form-label">Section Heading</label>
      <input class="form-control" type="text" name="wwd_process_heading"
        value="{{ $settings['wwd_process_heading'] ?? 'How Your Investment Works' }}"
        placeholder="How Your Investment Works"/>
    </div>
    <div class="form-group">
      <label class="form-label">Section Sub-heading</label>
      <input class="form-control" type="text" name="wwd_process_sub"
        value="{{ $settings['wwd_process_sub'] ?? '' }}"
        placeholder="Optional subtitle"/>
    </div>
  </div>

</div>{{-- /pane-wwd --}}

{{-- ══════════════════════════════ TIERS ══════════════════════════════ --}}
<div class="cms-pane" id="pane-tiers">

  <div class="card">
    <div class="card-title">🏔️ Page Hero</div>
    <div class="form-group">
      <label class="form-label">Page Heading</label>
      <input class="form-control" type="text" name="tiers_hero_title"
        value="{{ $settings['tiers_hero_title'] ?? 'Investment Tiers' }}" placeholder="Investment Tiers"/>
    </div>
    <div class="form-group">
      <label class="form-label">Sub-heading</label>
      <input class="form-control" type="text" name="tiers_hero_sub"
        value="{{ $settings['tiers_hero_sub'] ?? 'Six structured tiers from ₦10M to ₦1B+. Every tier includes insurance, dashboard access and quarterly reporting.' }}"
        placeholder="Subtitle text"/>
    </div>
  </div>

  <div class="card">
    <div class="card-title">💰 Tiers Section Intro</div>
    <div class="form-group">
      <label class="form-label">Section Heading</label>
      <input class="form-control" type="text" name="tiers_section_heading"
        value="{{ $settings['tiers_section_heading'] ?? 'Choose Your Investment Level' }}"
        placeholder="Choose Your Investment Level"/>
    </div>
    <div class="form-group">
      <label class="form-label">Section Sub-heading</label>
      <input class="form-control" type="text" name="tiers_section_sub"
        value="{{ $settings['tiers_section_sub'] ?? 'Every tier includes livestock insurance, digital dashboard, and quarterly reports.' }}"
        placeholder="Section subtitle"/>
    </div>
    <p style="font-size:.75rem;color:var(--t2);margin-top:.5rem">
      ℹ️ Individual tier data (name, amount, cows, returns) is managed in the application code to maintain data integrity. Contact your developer to adjust tier pricing.
    </p>
  </div>

</div>{{-- /pane-tiers --}}

{{-- ══════════════════════════════ GLOBAL ══════════════════════════════ --}}
<div class="cms-pane" id="pane-global">

  <div class="card">
    <div class="card-title">📢 Announcement Bar</div>
    <p style="font-size:.78rem;color:var(--t2);margin-bottom:1rem">The three rotating segments in the top strip on desktop.</p>
    <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(240px,1fr));gap:1rem">
      <div class="form-group">
        <label class="form-label">Segment 1</label>
        <input class="form-control" type="text" name="site_ann_1"
          value="{{ $settings['site_ann_1'] ?? 'A SAB Foundation Initiative' }}"/>
      </div>
      <div class="form-group">
        <label class="form-label">Segment 2</label>
        <input class="form-control" type="text" name="site_ann_2"
          value="{{ $settings['site_ann_2'] ?? 'Promoted by Successory Nigeria Ltd' }}"/>
      </div>
      <div class="form-group">
        <label class="form-label">Segment 3</label>
        <input class="form-control" type="text" name="site_ann_3"
          value="{{ $settings['site_ann_3'] ?? 'Technical Partner: Farm Alert Ltd' }}"/>
      </div>
    </div>
  </div>

</div>{{-- /pane-global --}}

<div style="display:flex;gap:.75rem;margin-top:1rem">
  <button type="submit" class="btn btn-primary" style="padding:.7rem 1.75rem;font-size:.88rem">💾 Save All Content</button>
  <a href="{{ route('admin.investors') }}" class="btn btn-ghost">Cancel</a>
</div>

</form>
@endsection

@push('scripts')
<script>
const tabs = document.querySelectorAll('.cms-tab');
const panes = document.querySelectorAll('.cms-pane');

function showTab(id) {
  tabs.forEach(t => t.classList.remove('active'));
  panes.forEach(p => p.classList.remove('active'));
  document.getElementById('pane-' + id).classList.add('active');
  event.target.classList.add('active');
  localStorage.setItem('cms_tab', id);
}

// Restore last tab
const saved = localStorage.getItem('cms_tab');
if (saved && document.getElementById('pane-' + saved)) {
  tabs.forEach(t => t.classList.remove('active'));
  panes.forEach(p => p.classList.remove('active'));
  document.getElementById('pane-' + saved).classList.add('active');
  tabs.forEach(t => {
    if (t.getAttribute('onclick') === "showTab('" + saved + "')") {
      t.classList.add('active');
    }
  });
}
</script>
@endpush
