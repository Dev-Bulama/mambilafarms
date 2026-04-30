<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Mail;

class SettingsController extends Controller
{
    private array $settingKeys = [
        // SMTP
        'smtp_host', 'smtp_port', 'smtp_username', 'smtp_password',
        'smtp_encryption', 'smtp_from_address', 'smtp_from_name',
        // Company
        'company_name', 'company_email', 'company_phone', 'company_address',
        // Notification
        'admin_notification_emails',
        // Site Content
        'site_ann_1', 'site_ann_2', 'site_ann_3',
        'site_hero_eyebrow', 'site_hero_title', 'site_hero_body',
        // Chatbot / Scripts
        'chatbot_script',
    ];

    public function show()
    {
        $settings = Setting::all_keyed();
        return view('admin.settings', compact('settings'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'smtp_port'               => 'nullable|integer',
            'smtp_from_address'       => 'nullable|email',
            'company_email'           => 'nullable|email',
            'logo'                    => 'nullable|image|max:2048',
        ]);

        foreach ($this->settingKeys as $key) {
            if ($request->has($key)) {
                // Never overwrite smtp_password with a blank value (field is always empty on load)
                if ($key === 'smtp_password' && $request->input($key) === '') {
                    continue;
                }
                Setting::set($key, $request->input($key));
            }
        }

        // Handle logo upload
        if ($request->hasFile('logo')) {
            $path = $request->file('logo')->store('logo', 'public');
            Setting::set('company_logo_path', $path);
        }

        return back()->with('success', 'Settings saved successfully.');
    }

    public function testSmtp(Request $request)
    {
        try {
            $this->applySmtpFromSettings();
            Mail::raw('This is a test email from Mambilla Legacy Farms admin panel.', function ($message) {
                $fromAddr = Setting::get('smtp_from_address', config('mail.from.address'));
                $fromName = Setting::get('smtp_from_name', 'Mambilla Legacy Farms');
                $message->to($fromAddr)
                        ->from($fromAddr, $fromName)
                        ->subject('SMTP Test — Mambilla Legacy Farms');
            });
            return response()->json(['ok' => true, 'message' => 'Test email sent successfully.']);
        } catch (\Exception $e) {
            return response()->json(['ok' => false, 'message' => $e->getMessage()], 422);
        }
    }

    private function applySmtpFromSettings(): void
    {
        Config::set('mail.mailers.smtp.host',       Setting::get('smtp_host'));
        Config::set('mail.mailers.smtp.port',       Setting::get('smtp_port', 587));
        Config::set('mail.mailers.smtp.username',   Setting::get('smtp_username'));
        Config::set('mail.mailers.smtp.password',   Setting::get('smtp_password'));
        Config::set('mail.mailers.smtp.encryption', Setting::get('smtp_encryption', 'tls'));
        Config::set('mail.from.address',            Setting::get('smtp_from_address'));
        Config::set('mail.from.name',               Setting::get('smtp_from_name', 'Mambilla Legacy Farms'));
    }
}
