<?php

namespace App\Providers;

use App\Models\Setting;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\ServiceProvider;

class DynamicMailServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        // Override mail config from DB settings on every request (if DB is available)
        try {
            if (Setting::where('key', 'smtp_host')->exists()) {
                $map = [
                    'mail.mailers.smtp.host'       => 'smtp_host',
                    'mail.mailers.smtp.port'       => 'smtp_port',
                    'mail.mailers.smtp.username'   => 'smtp_username',
                    'mail.mailers.smtp.password'   => 'smtp_password',
                    'mail.mailers.smtp.encryption' => 'smtp_encryption',
                    'mail.from.address'            => 'smtp_from_address',
                    'mail.from.name'               => 'smtp_from_name',
                ];
                foreach ($map as $configKey => $settingKey) {
                    $value = Setting::get($settingKey);
                    if ($value !== null) Config::set($configKey, $value);
                }
            }
        } catch (\Exception) {
            // DB not ready (e.g. during migrations) — use .env defaults
        }
    }
}
