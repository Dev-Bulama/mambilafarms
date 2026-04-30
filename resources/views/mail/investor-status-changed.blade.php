<!DOCTYPE html>
<html lang="en">
<head><meta charset="UTF-8"><meta name="viewport" content="width=device-width,initial-scale=1"></head>
<body style="margin:0;padding:0;background:#f0eef4;font-family:'Helvetica Neue',Arial,sans-serif">
<table style="width:100%;border-collapse:collapse"><tr><td style="padding:28px 12px">
<table style="max-width:560px;margin:0 auto;width:100%;border-radius:16px;overflow:hidden;box-shadow:0 10px 50px rgba(26,10,18,0.18)">

  {{-- Header --}}
  @php
    $headerColor = match($investor->status) {
        'approved'  => 'linear-gradient(160deg,#1A0A12,#3b1230)',
        'active'    => 'linear-gradient(160deg,#0a1f0a,#1a4a1a)',
        'suspended' => 'linear-gradient(160deg,#1a0a00,#3a2000)',
        'completed' => 'linear-gradient(160deg,#0a0a1a,#1a1a4a)',
        default     => 'linear-gradient(160deg,#1A0A12,#3b1230)',
    };
    $accentColor = match($investor->status) {
        'approved'  => '#FF5487',
        'active'    => '#8DC63F',
        'suspended' => '#f5a623',
        'completed' => '#9b59b6',
        default     => '#FF5487',
    };
  @endphp
  <tr>
    <td style="background:{{ $headerColor }};padding:34px 32px 30px;text-align:center">
      <div style="font-size:10px;font-weight:700;color:rgba(255,255,255,0.32);text-transform:uppercase;letter-spacing:0.18em;margin-bottom:10px">Mambilla Legacy Farms</div>
      <div style="font-size:3rem;margin-bottom:10px;line-height:1">{{ $statusIcon }}</div>
      <div style="font-size:24px;font-weight:800;color:#fff;margin-bottom:8px">{{ $statusLabel }}</div>
      <div style="font-size:13px;color:rgba(255,255,255,0.55);margin-bottom:16px">Account status update for your investment</div>
      <div style="background:rgba(255,255,255,0.08);border:1.5px solid rgba(255,255,255,0.15);display:inline-block;padding:10px 24px;border-radius:10px">
        <div style="font-size:10px;font-weight:700;color:rgba(255,255,255,0.4);text-transform:uppercase;letter-spacing:0.12em;margin-bottom:4px">Your Reference Number</div>
        <div style="font-size:20px;font-weight:800;color:{{ $accentColor }};letter-spacing:0.06em;font-family:'Courier New',monospace">{{ $investor->reference_number }}</div>
      </div>
    </td>
  </tr>

  {{-- Body --}}
  <tr>
    <td style="background:#fff;padding:28px 32px">
      <p style="font-size:15px;color:#1A0A12;margin-bottom:16px">Dear <strong>{{ $investor->full_name }}</strong>,</p>
      <p style="font-size:14px;color:#555;line-height:1.75;margin-bottom:20px">{{ $statusMessage }}</p>

      {{-- Status + Tier summary --}}
      <table style="width:100%;border-collapse:collapse;background:#fdf5f9;border-radius:10px;overflow:hidden;margin-bottom:20px">
        <tr>
          <td style="padding:10px 16px;font-size:11px;font-weight:700;color:#9a90a8;text-transform:uppercase;width:130px">Status</td>
          <td style="padding:10px 16px;border-left:2px solid #fce4ef">
            <span style="display:inline-block;background:{{ $accentColor }};color:#fff;font-size:11px;font-weight:700;padding:3px 12px;border-radius:20px;letter-spacing:.04em">{{ strtoupper($statusLabel) }}</span>
          </td>
        </tr>
        <tr style="border-top:1px solid #fce4ef">
          <td style="padding:10px 16px;font-size:11px;font-weight:700;color:#9a90a8;text-transform:uppercase">Tier</td>
          <td style="padding:10px 16px;font-size:14px;color:#1A0A12;font-weight:600;border-left:2px solid #fce4ef">{{ $investor->tier }} — {{ $investor->tierAmount() }}</td>
        </tr>
        <tr style="border-top:1px solid #fce4ef">
          <td style="padding:10px 16px;font-size:11px;font-weight:700;color:#9a90a8;text-transform:uppercase">Reference</td>
          <td style="padding:10px 16px;font-size:14px;color:#D81B7A;font-weight:700;border-left:2px solid #fce4ef;font-family:'Courier New',monospace">{{ $investor->reference_number }}</td>
        </tr>
      </table>

      {{-- Status-specific next steps --}}
      @if($investor->status === 'approved')
      <div style="background:#fffbeb;border:1px solid #f5d99a;border-radius:10px;padding:16px 20px;margin-bottom:24px">
        <p style="font-size:13px;font-weight:700;color:#a07000;margin-bottom:8px">📋 Next Steps</p>
        <ol style="font-size:13px;color:#7a6020;padding-left:1.2rem;line-height:1.85;margin:0">
          <li>Our team will send you the SPV subscription agreement</li>
          <li>Review and sign the agreement</li>
          <li>Complete Tranche 1 payment (50%) on signing</li>
          <li>Cattle allotment and RFID tagging follows</li>
        </ol>
      </div>
      @elseif($investor->status === 'active')
      <div style="background:#f0faf0;border:1px solid #b8e0b8;border-radius:10px;padding:16px 20px;margin-bottom:24px">
        <p style="font-size:13px;font-weight:700;color:#2a6a2a;margin-bottom:8px">🐄 Your Investment is Live</p>
        <table style="width:100%;border-collapse:collapse;font-size:13px">
          <tr><td style="padding:4px 0;color:#4a8a4a">Year 1–2</td><td style="text-align:right;color:#2a6a2a;font-weight:700">Capital Deployment</td></tr>
          <tr><td style="padding:4px 0;color:#4a8a4a">Year 3+</td><td style="text-align:right;color:#2a6a2a;font-weight:700">Quarterly Dairy Payouts Begin</td></tr>
          <tr><td style="padding:4px 0;color:#4a8a4a">Year 5</td><td style="text-align:right;color:#2a6a2a;font-weight:700">Full Settlement</td></tr>
        </table>
      </div>
      @elseif($investor->status === 'completed')
      <div style="background:#f5f0ff;border:1px solid #c8b8f0;border-radius:10px;padding:16px 20px;margin-bottom:24px">
        <p style="font-size:13px;font-weight:700;color:#5a2da0;margin-bottom:8px">🎉 Congratulations on completing your investment term!</p>
        <p style="font-size:13px;color:#7a4dc0;line-height:1.7">Our settlement team will reach out within 5 business days with your final returns calculation and payment details.</p>
      </div>
      @endif

      <p style="font-size:13px;color:#777;line-height:1.7;margin-bottom:20px">For any questions, contact us at <a href="mailto:invest@legacyfarms.ng" style="color:#D81B7A;font-weight:600">invest@legacyfarms.ng</a>.</p>

      <div style="text-align:center">
        <a href="{{ route('investor.dashboard') }}"
           style="display:inline-block;background:linear-gradient(135deg,#D81B7A,#FF5487);color:#fff;text-decoration:none;padding:13px 32px;border-radius:9px;font-size:14px;font-weight:700">
          View My Dashboard →
        </a>
      </div>
    </td>
  </tr>

  {{-- Footer --}}
  <tr>
    <td style="background:#1A0A12;padding:20px 32px;text-align:center">
      <div style="font-size:11px;color:rgba(255,255,255,0.28);line-height:1.85">
        Mambilla Legacy Farms · Mambilla Plateau, Taraba State, Nigeria<br>
        invest@legacyfarms.ng · www.legacyfarms.ng<br>
        <span style="color:rgba(255,255,255,0.14)">You received this email because you are a registered investor.</span>
      </div>
    </td>
  </tr>

</table>
</td></tr></table>
</body></html>
