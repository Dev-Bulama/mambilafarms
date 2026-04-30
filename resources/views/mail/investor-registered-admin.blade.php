<!DOCTYPE html>
<html lang="en">
<head><meta charset="UTF-8"><meta name="viewport" content="width=device-width,initial-scale=1"></head>
<body style="margin:0;padding:0;background:#f0eef4;font-family:'Helvetica Neue',Arial,sans-serif">
<table style="width:100%;border-collapse:collapse"><tr><td style="padding:28px 12px">
<table style="max-width:580px;margin:0 auto;width:100%;border-radius:16px;overflow:hidden;box-shadow:0 10px 50px rgba(26,10,18,0.2)">

  <tr>
    <td style="background:linear-gradient(160deg,#1A0A12 0%,#3b1230 55%,#5e1c4a 100%);padding:34px 32px 30px;text-align:center">
      <div style="font-size:9.5px;font-weight:700;color:rgba(255,255,255,0.32);text-transform:uppercase;letter-spacing:0.2em;margin-bottom:10px">Mambilla Legacy Farms · A SAB Foundation Initiative</div>
      <div style="font-size:27px;font-weight:800;color:#fff;line-height:1.15;margin-bottom:16px">New Investor Registration</div>
      <div style="display:inline-block;background:linear-gradient(135deg,#c0105a,#FF5487);padding:7px 22px;border-radius:24px;font-size:13px;font-weight:700;color:#fff">{{ $investor->tier }} Tier</div>
      <div style="margin-top:12px;font-size:11px;color:rgba(255,255,255,0.35)">{{ $investor->created_at->format('D, d M Y · H:i') }} WAT</div>
    </td>
  </tr>

  <tr>
    <td style="background:#fff9eb;padding:14px 24px;border-left:4px solid #f5a623">
      <span style="font-size:13px;color:#a07000;font-weight:700">⚡ Action Required</span>
      <span style="font-size:13px;color:#7a6020;margin-left:8px">Follow up with this investor within 24 hours.</span>
    </td>
  </tr>

  <tr><td style="background:#f0eef4;padding:24px 20px 10px">

    @php
    function mailRow(string $label, ?string $value): string {
      return '<tr>
        <td style="padding:10px 16px;font-size:11px;font-weight:700;color:#9a90a8;text-transform:uppercase;letter-spacing:0.07em;width:148px;vertical-align:top;white-space:nowrap">'.$label.'</td>
        <td style="padding:10px 16px;font-size:13.5px;color:#1A0A12;font-weight:500;border-left:2px solid #fce4ef">'.e($value ?? '—').'</td>
      </tr>';
    }
    @endphp

    {{-- Personal --}}
    <div style="margin-bottom:20px;border-radius:10px;overflow:hidden;box-shadow:0 2px 14px rgba(216,27,122,0.09)">
      <div style="background:linear-gradient(135deg,#c0105a,#FF5487);padding:10px 18px"><span style="font-size:10.5px;font-weight:800;color:rgba(255,255,255,0.92);text-transform:uppercase;letter-spacing:0.12em">👤 Personal Information</span></div>
      <table style="width:100%;border-collapse:collapse;background:#fff">
        {!! mailRow('Full Name', '<strong>'.$investor->full_name.'</strong>') !!}
        {!! mailRow('Reference', $investor->reference_number) !!}
        {!! mailRow('Date of Birth', $investor->date_of_birth?->format('d M Y')) !!}
        {!! mailRow('BVN / RC No.', $investor->bvn_rc_number) !!}
        {!! mailRow('Tax ID (TIN)', $investor->tax_id) !!}
        {!! mailRow('Investor Type', $investor->investor_type) !!}
      </table>
    </div>

    {{-- Contact --}}
    <div style="margin-bottom:20px;border-radius:10px;overflow:hidden;box-shadow:0 2px 14px rgba(216,27,122,0.09)">
      <div style="background:linear-gradient(135deg,#c0105a,#FF5487);padding:10px 18px"><span style="font-size:10.5px;font-weight:800;color:rgba(255,255,255,0.92);text-transform:uppercase;letter-spacing:0.12em">📞 Contact Details</span></div>
      <table style="width:100%;border-collapse:collapse;background:#fff">
        {!! mailRow('Email', '<a href="mailto:'.$investor->user->email.'" style="color:#c0105a;font-weight:700;text-decoration:none">'.$investor->user->email.'</a>') !!}
        {!! mailRow('Phone', $investor->phone_primary) !!}
        {!! mailRow('Alt Phone', $investor->phone_alternate) !!}
        {!! mailRow('Address', $investor->address) !!}
        {!! mailRow('City / State', $investor->city_state) !!}
        {!! mailRow('Country', $investor->country) !!}
        {!! mailRow('Preferred Comms', $investor->communication_prefs) !!}
      </table>
    </div>

    {{-- Investment --}}
    <div style="margin-bottom:20px;border-radius:10px;overflow:hidden;box-shadow:0 2px 14px rgba(216,27,122,0.09)">
      <div style="background:linear-gradient(135deg,#c0105a,#FF5487);padding:10px 18px"><span style="font-size:10.5px;font-weight:800;color:rgba(255,255,255,0.92);text-transform:uppercase;letter-spacing:0.12em">💰 Investment Details</span></div>
      <table style="width:100%;border-collapse:collapse;background:#fff">
        {!! mailRow('Tier', '<strong style="color:#c0105a;font-size:15px">'.$investor->tier.'</strong>') !!}
        {!! mailRow('Amount', $investor->tierAmount()) !!}
        {!! mailRow('Custom Amount', $investor->custom_amount) !!}
        {!! mailRow('Payment Method', $investor->payment_method) !!}
        {!! mailRow('Notes', $investor->notes) !!}
      </table>
    </div>

  </td></tr>

  <tr>
    <td style="background:#f0eef4;padding:8px 20px 30px;text-align:center">
      <a href="mailto:{{ $investor->user->email }}?subject=Re%3A%20Your%20Mambilla%20Legacy%20Farms%20Investment&body=Dear%20{{ urlencode($investor->full_name) }}%2C"
         style="display:inline-block;background:linear-gradient(135deg,#c0105a,#FF5487);color:#fff;text-decoration:none;padding:14px 34px;border-radius:9px;font-size:14px;font-weight:700">
        Reply to Investor →
      </a>
    </td>
  </tr>

  <tr>
    <td style="background:#1A0A12;padding:22px 32px;text-align:center">
      <div style="font-size:11px;color:rgba(255,255,255,0.28);line-height:1.85">
        Mambilla Legacy Farms · Mambilla Plateau, Taraba State, Nigeria<br>
        invest@legacyfarms.ng · www.legacyfarms.ng<br>
        <span style="color:rgba(255,255,255,0.14)">Automated registration alert — do not reply to this message.</span>
      </div>
    </td>
  </tr>

</table>
</td></tr></table>
</body></html>
