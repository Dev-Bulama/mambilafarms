@extends('layouts.public')
@php $page = 'ct'; @endphp
@section('title', 'Start Investing — Mambilla Legacy Farms')

@section('hero')
<div class="page-top">
  <div class="pb" style="background-image:url('https://images.unsplash.com/photo-1567201080580-bfcc97dae346?w=1600&q=80')">
    <div class="pbc">
      <div class="chip" style="color:var(--pk)">Get Involved</div>
      <h1 style="font-size:clamp(2rem,6vw,3.8rem);color:#fff;font-weight:600;line-height:1.1;margin-top:.4rem">Start Investing</h1>
      <p style="color:rgba(255,255,255,.65);max-width:420px;line-height:1.72;margin-top:.75rem;font-size:.92rem">Complete the subscription form below. Our team responds within 24 hours.</p>
    </div>
  </div>
  <div class="stripe"></div>
</div>
@endsection

@section('content')
<section class="dots-bg" style="background:var(--pklx)">
  <div class="wrap">
    <div style="display:grid;grid-template-columns:1fr 1fr;gap:.85rem;margin-bottom:2rem">
      <div style="background:linear-gradient(135deg,var(--pkd),var(--pk));border-radius:14px;padding:1.1rem;display:flex;flex-direction:column;gap:.35rem">
        <div style="font-size:.62rem;font-weight:700;color:rgba(255,255,255,.55);text-transform:uppercase;letter-spacing:.08em">Email</div>
        <div style="font-size:.82rem;color:#fff;font-weight:600;word-break:break-all">invest@legacyfarms.ng</div>
      </div>
      <div style="background:var(--ink);border-radius:14px;padding:1.1rem;display:flex;flex-direction:column;gap:.35rem">
        <div style="font-size:.62rem;font-weight:700;color:rgba(255,255,255,.38);text-transform:uppercase;letter-spacing:.08em">Location</div>
        <div style="font-size:.82rem;color:rgba(255,255,255,.75);font-weight:500;line-height:1.4">Mambilla Plateau, Taraba State</div>
      </div>
    </div>

    <div style="display:grid;grid-template-columns:1fr;gap:2rem" id="form-layout">

      <!-- FORM -->
      <div style="background:#fff;border-radius:20px;padding:1.75rem;box-shadow:0 5px 32px rgba(255,84,135,.1)">
        <div style="display:flex;align-items:center;gap:.85rem;margin-bottom:1.75rem;padding-bottom:1.25rem;border-bottom:1.5px solid var(--pkl)">
          <div style="width:42px;height:42px;background:linear-gradient(135deg,var(--pkd),var(--pk));border-radius:10px;display:grid;place-items:center;font-size:1.1rem;flex-shrink:0">📋</div>
          <div><h2 style="font-size:1.3rem;margin-bottom:.1rem">Subscription Form</h2><p style="font-size:.74rem;color:var(--t2)">Mambilla Legacy Farms · V2.0 · Secure Server-side Processing</p></div>
        </div>

        @if($errors->any())
          <div style="background:#fff5f5;border:1.5px solid #ffcccc;border-radius:10px;padding:1rem;margin-bottom:1.25rem">
            <p style="font-size:.8rem;font-weight:700;color:#c0392b;margin-bottom:.5rem">Please fix the following errors:</p>
            <ul style="font-size:.78rem;color:#c0392b;padding-left:1.2rem">
              @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        @endif

        <form id="sf" method="POST" action="{{ route('invest.store') }}" novalidate>
          @csrf

          <!-- PART 1 -->
          <div style="background:var(--pkl);border-radius:9px;padding:.72rem 1rem;margin-bottom:1.25rem"><span style="font-weight:700;font-size:.67rem;letter-spacing:.1em;text-transform:uppercase;color:var(--pkd)">Part 1 — Personal Information</span></div>
          <div class="form-grid">
            <div class="fi"><label>Full Legal Name *</label><input type="text" name="full_name" value="{{ old('full_name') }}" placeholder="As on your ID" required/></div>
            <div class="fi"><label>Date of Birth *</label><input type="date" name="date_of_birth" value="{{ old('date_of_birth') }}" required/></div>
            <div class="fi"><label>BVN / RC Number *</label><input type="text" name="bvn_rc_number" placeholder="Bank Verification Number" required/></div>
            <div class="fi"><label>Tax ID (TIN)</label><input type="text" name="tax_id" value="{{ old('tax_id') }}" placeholder="Optional"/></div>
            <div class="fi"><label>Primary Phone *</label><input type="tel" name="phone_primary" value="{{ old('phone_primary') }}" placeholder="+234 xxx xxx xxxx" required/></div>
            <div class="fi"><label>Alternate Phone</label><input type="tel" name="phone_alternate" value="{{ old('phone_alternate') }}" placeholder="+234 xxx xxx xxxx"/></div>
          </div>
          <div class="fi"><label>Email Address *</label><input type="email" name="email" value="{{ old('email') }}" placeholder="you@example.com" required/></div>
          <div class="fi"><label>Residential / Registered Address *</label><input type="text" name="address" value="{{ old('address') }}" placeholder="Street Address" required/></div>
          <div class="form-grid">
            <div class="fi"><label>City / State</label><input type="text" name="city_state" value="{{ old('city_state') }}" placeholder="Lagos, Lagos State"/></div>
            <div class="fi"><label>Country *</label><input type="text" name="country" value="{{ old('country', 'Nigeria') }}" placeholder="Nigeria" required/></div>
          </div>
          <div class="fi"><label>Preferred Communication</label>
            <div class="comm-row">
              <label><input type="checkbox" name="comm_email" style="accent-color:var(--pk)" {{ old('comm_email') ? 'checked' : '' }}/> Email</label>
              <label><input type="checkbox" name="comm_phone" style="accent-color:var(--pk)" {{ old('comm_phone') ? 'checked' : '' }}/> Phone</label>
              <label><input type="checkbox" name="comm_whatsapp" style="accent-color:var(--pk)" {{ old('comm_whatsapp') ? 'checked' : '' }}/> WhatsApp</label>
              <label><input type="checkbox" name="comm_sms" style="accent-color:var(--pk)" {{ old('comm_sms') ? 'checked' : '' }}/> SMS</label>
            </div>
          </div>
          <div class="fi"><label>Type of Investor *</label>
            <select name="investor_type" required>
              <option value="">Select investor type...</option>
              @foreach(['Individual Investor','Corporate or Institutional Investor','Joint Investor','Foreign Investor','Diaspora Investor'] as $type)
                <option value="{{ $type }}" {{ old('investor_type') === $type ? 'selected' : '' }}>{{ $type }}</option>
              @endforeach
            </select>
          </div>

          <!-- PART 2 -->
          <div style="background:var(--pkl);border-radius:9px;padding:.72rem 1rem;margin:1.5rem 0 1.25rem"><span style="font-weight:700;font-size:.67rem;letter-spacing:.1em;text-transform:uppercase;color:var(--pkd)">Part 2 — Subscription Details</span></div>
          <div class="fi"><label>Select Investment Tier *</label>
            <select id="ftier" name="tier" required onchange="tgc(this.value)">
              <option value="">Choose your tier...</option>
              @foreach(['Starter'=>'₦10M (5 cows) · 34–57% p.a.','Bronze'=>'₦20M (10 cows) · 34–57% p.a.','Silver'=>'₦50M (25 cows) · 40–65% p.a.','Gold'=>'₦100M (50 cows) · 57–80% p.a.','Platinum'=>'₦200M (100 cows) · 200–250%','Diamond'=>'₦1B+ (500+ cows) · 250–300%','Custom'=>'Custom Amount'] as $val => $label)
                <option value="{{ $val }}" {{ old('tier', request('tier')) === $val ? 'selected' : '' }}>{{ $val }} — {{ $label }}</option>
              @endforeach
            </select>
          </div>
          <div class="fi" id="caf" style="display:{{ old('tier', request('tier')) === 'Custom' ? 'block' : 'none' }}">
            <label>Custom Amount (₦)</label>
            <input type="text" name="custom_amount" value="{{ old('custom_amount') }}" placeholder="e.g. 30,000,000 for 15 cows"/>
          </div>
          <div class="fi"><label>Preferred Payment Method</label>
            <select name="payment_method">
              @foreach(['Bank Transfer','RTGS','Cheque','Other'] as $m)
                <option value="{{ $m }}" {{ old('payment_method') === $m ? 'selected' : '' }}>{{ $m }}</option>
              @endforeach
            </select>
          </div>
          <div class="fi"><label>Additional Notes</label>
            <textarea name="notes" placeholder="Any questions or special instructions for our team...">{{ old('notes') }}</textarea>
          </div>

          <!-- PART 3 -->
          <div style="background:var(--pkl);border-radius:9px;padding:.72rem 1rem;margin:1.5rem 0 1.1rem"><span style="font-weight:700;font-size:.67rem;letter-spacing:.1em;text-transform:uppercase;color:var(--pkd)">Part 3 — Declarations</span></div>
          <div class="cr"><input type="checkbox" id="d1" name="declaration_1" value="1" required {{ old('declaration_1') ? 'checked' : '' }}/><label for="d1" style="cursor:pointer">I have reviewed the Mambilla Legacy Farms Business Plan and understand projected returns are estimates, not guaranteed.</label></div>
          <div class="cr"><input type="checkbox" id="d2" name="declaration_2" value="1" required {{ old('declaration_2') ? 'checked' : '' }}/><label for="d2" style="cursor:pointer">I confirm investment funds are from lawful sources and I can commit capital for the full 5-year horizon.</label></div>
          <div class="cr"><input type="checkbox" id="d3" name="declaration_3" value="1" required {{ old('declaration_3') ? 'checked' : '' }}/><label for="d3" style="cursor:pointer">I agree to be contacted by the Mambilla Legacy Farms investor relations team regarding this subscription.</label></div>

          <button type="submit" class="bp" style="margin-top:1.4rem;font-size:.9rem;width:100%;justify-content:center">Submit Subscription Request →</button>
          <p style="font-size:.74rem;color:var(--t2);text-align:center;margin-top:.65rem">We respond within 24 hours · invest@legacyfarms.ng</p>
        </form>
      </div>

      <!-- SIDEBAR -->
      <div style="display:flex;flex-direction:column;gap:1.1rem">
        <div style="background:linear-gradient(135deg,var(--pkd),var(--pk));border-radius:16px;padding:1.4rem">
          <h4 style="font-size:.7rem;font-weight:700;color:rgba(255,255,255,.5);text-transform:uppercase;letter-spacing:.08em;font-family:'Plus Jakarta Sans',sans-serif;margin-bottom:1rem">Investor Protections</h4>
          <div style="display:flex;flex-direction:column;gap:.42rem;font-size:.84rem;color:rgba(255,255,255,.82)">
            <span>✅ SPV legal structure (Nigeria)</span>
            <span>✅ Livestock insurance included</span>
            <span>✅ Quarterly financial reports</span>
            <span>✅ Real-time digital dashboard</span>
            <span>✅ Annual independent audit</span>
            <span>✅ RFID herd tracking</span>
            <span>✅ Pre-emptive rights on new tranches</span>
          </div>
        </div>
        <div style="background:#fff;border-radius:16px;padding:1.4rem;border-top:3px solid var(--pk);box-shadow:0 3px 18px rgba(255,84,135,.07)">
          <h4 style="font-size:.7rem;font-weight:700;color:var(--pkd);text-transform:uppercase;letter-spacing:.08em;font-family:'Plus Jakarta Sans',sans-serif;margin-bottom:1rem">💰 Payment Tranches</h4>
          <div style="font-size:.84rem;color:var(--t1);display:flex;flex-direction:column;gap:.42rem">
            <div style="display:flex;justify-content:space-between;padding:.38rem 0;border-bottom:1px solid var(--pkl)"><span>Tranche 1 — On signing</span><strong style="color:var(--pkd)">50%</strong></div>
            <div style="display:flex;justify-content:space-between;padding:.38rem 0;border-bottom:1px solid var(--pkl)"><span>Tranche 2 — 60 days</span><strong style="color:var(--pkd)">30%</strong></div>
            <div style="display:flex;justify-content:space-between;padding:.38rem 0"><span>Tranche 3 — 90 days</span><strong style="color:var(--pkd)">20%</strong></div>
          </div>
          <div style="margin-top:.8rem;padding:.65rem;background:var(--pklx);border-radius:9px;font-size:.74rem;color:var(--t2);line-height:1.55">Pay to: <strong style="color:var(--pkd)">Mambilla Legacy Farms</strong><br>Ref: LF / [Your Name] / [Tier]</div>
        </div>
        <div style="background:var(--ink);border-radius:16px;padding:1.4rem;border:1px solid rgba(255,255,255,.06)">
          <h4 style="font-size:.68rem;font-weight:700;color:rgba(255,255,255,.4);text-transform:uppercase;letter-spacing:.1em;font-family:'Plus Jakarta Sans',sans-serif;margin-bottom:.6rem">🔒 Secure Submission</h4>
          <p style="font-size:.74rem;color:rgba(255,255,255,.38);line-height:1.65">Your data is processed server-side only. Nothing is stored in your browser. All information is encrypted in transit and at rest.</p>
        </div>
      </div>

    </div>
  </div>
</section>
@endsection

@push('scripts')
<script>
(function(){
  const fl=document.getElementById('form-layout');
  function layout(){
    if(!fl)return;
    if(window.innerWidth>=960){
      fl.style.gridTemplateColumns='2fr 1fr';
      fl.children[1].style.position='sticky';
      fl.children[1].style.top='112px';
      fl.children[1].style.alignSelf='start';
    }else{
      fl.style.gridTemplateColumns='1fr';
      fl.children[1].style.position='';
      fl.children[1].style.top='';
    }
  }
  window.addEventListener('resize',layout,{passive:true});
  layout();
})();
function tgc(v){document.getElementById('caf').style.display=v==='Custom'?'block':'none'}
</script>
@endpush
