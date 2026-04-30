<!DOCTYPE html>
<html lang="en">
<head><meta charset="UTF-8"><meta name="viewport" content="width=device-width,initial-scale=1"></head>
<body style="margin:0;padding:0;background:#f0eef4;font-family:'Helvetica Neue',Arial,sans-serif">
<table style="width:100%;border-collapse:collapse"><tr><td style="padding:28px 12px">
<table style="max-width:560px;margin:0 auto;width:100%;border-radius:16px;overflow:hidden;box-shadow:0 10px 50px rgba(26,10,18,0.18)">

  <tr>
    <td style="background:linear-gradient(160deg,#1A0A12,#3b1230);padding:34px 32px 30px;text-align:center">
      <div style="font-size:10px;font-weight:700;color:rgba(255,255,255,0.32);text-transform:uppercase;letter-spacing:0.18em;margin-bottom:10px">Mambilla Legacy Farms</div>
      <div style="font-size:26px;font-weight:800;color:#fff;margin-bottom:8px">Registration Confirmed</div>
      <div style="font-size:13px;color:rgba(255,255,255,0.55);margin-bottom:16px">Thank you for your interest in building lasting agricultural wealth.</div>
      <div style="background:rgba(255,255,255,0.08);border:1.5px solid rgba(255,255,255,0.15);display:inline-block;padding:10px 24px;border-radius:10px">
        <div style="font-size:10px;font-weight:700;color:rgba(255,255,255,0.4);text-transform:uppercase;letter-spacing:0.12em;margin-bottom:4px">Your Reference Number</div>
        <div style="font-size:20px;font-weight:800;color:#FF5487;letter-spacing:0.06em;font-family:'Courier New',monospace">{{ $investor->reference_number }}</div>
      </div>
    </td>
  </tr>

  <tr>
    <td style="background:#fff;padding:28px 32px">
      <p style="font-size:15px;color:#1A0A12;margin-bottom:16px">Dear <strong>{{ $investor->full_name }}</strong>,</p>
      <p style="font-size:14px;color:#555;line-height:1.75;margin-bottom:20px">
        We have received your subscription request for the <strong style="color:#D81B7A">{{ $investor->tier }} Tier</strong> ({{ $investor->tierAmount() }}) investment programme. Our investor relations team will contact you within <strong>24 hours</strong> with your subscription agreement and next steps.
      </p>

      <table style="width:100%;border-collapse:collapse;background:#fdf5f9;border-radius:10px;overflow:hidden;margin-bottom:20px">
        <tr><td style="padding:10px 16px;font-size:11px;font-weight:700;color:#9a90a8;text-transform:uppercase;width:130px">Tier</td><td style="padding:10px 16px;font-size:14px;color:#1A0A12;font-weight:600;border-left:2px solid #fce4ef">{{ $investor->tier }} — {{ $investor->tierAmount() }}</td></tr>
        <tr style="border-top:1px solid #fce4ef"><td style="padding:10px 16px;font-size:11px;font-weight:700;color:#9a90a8;text-transform:uppercase">Payment</td><td style="padding:10px 16px;font-size:14px;color:#1A0A12;font-weight:500;border-left:2px solid #fce4ef">{{ $investor->payment_method }}</td></tr>
        <tr style="border-top:1px solid #fce4ef"><td style="padding:10px 16px;font-size:11px;font-weight:700;color:#9a90a8;text-transform:uppercase">Reference</td><td style="padding:10px 16px;font-size:14px;color:#D81B7A;font-weight:700;border-left:2px solid #fce4ef;font-family:'Courier New',monospace">{{ $investor->reference_number }}</td></tr>
      </table>

      <div style="background:#fffbeb;border:1px solid #f5d99a;border-radius:10px;padding:16px 20px;margin-bottom:24px">
        <p style="font-size:13px;font-weight:700;color:#a07000;margin-bottom:8px">💰 Payment Schedule</p>
        <table style="width:100%;border-collapse:collapse;font-size:13px">
          <tr><td style="padding:5px 0;color:#7a6020">Tranche 1 — On signing</td><td style="text-align:right;font-weight:700;color:#D81B7A">50%</td></tr>
          <tr><td style="padding:5px 0;color:#7a6020">Tranche 2 — 60 days</td><td style="text-align:right;font-weight:700;color:#D81B7A">30%</td></tr>
          <tr><td style="padding:5px 0;color:#7a6020">Tranche 3 — 90 days</td><td style="text-align:right;font-weight:700;color:#D81B7A">20%</td></tr>
        </table>
        <p style="font-size:11px;color:#a07000;margin-top:8px">Pay to: <strong>Mambilla Legacy Farms</strong> · Ref: <strong>{{ $investor->reference_number }}</strong></p>
      </div>

      <p style="font-size:13px;color:#777;line-height:1.7;margin-bottom:20px">If you have any questions before we reach out, contact us at <a href="mailto:invest@legacyfarms.ng" style="color:#D81B7A;font-weight:600">invest@legacyfarms.ng</a>.</p>

      <div style="text-align:center">
        <a href="{{ route('investor.dashboard') }}"
           style="display:inline-block;background:linear-gradient(135deg,#D81B7A,#FF5487);color:#fff;text-decoration:none;padding:13px 32px;border-radius:9px;font-size:14px;font-weight:700">
          View My Dashboard →
        </a>
      </div>
    </td>
  </tr>

  <tr>
    <td style="background:#1A0A12;padding:20px 32px;text-align:center">
      <div style="font-size:11px;color:rgba(255,255,255,0.28);line-height:1.85">
        Mambilla Legacy Farms · Mambilla Plateau, Taraba State, Nigeria<br>
        invest@legacyfarms.ng · www.legacyfarms.ng<br>
        <span style="color:rgba(255,255,255,0.14)">You received this email because you registered at mambillafarms.ng</span>
      </div>
    </td>
  </tr>

</table>
</td></tr></table>
</body></html>
