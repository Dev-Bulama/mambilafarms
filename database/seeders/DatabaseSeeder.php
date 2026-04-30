<?php

namespace Database\Seeders;

use App\Models\Setting;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // ── Admin user ─────────────────────────────────────────────
        // Login: admin@legacyfarms.ng / Admin@2025!
        // CHANGE THE PASSWORD after first login via settings or artisan tinker
        User::firstOrCreate(
            ['email' => 'admin@legacyfarms.ng'],
            [
                'name'     => 'MLF Admin',
                'password' => Hash::make('Admin@2025!'),
                'role'     => 'admin',
            ]
        );

        // ── Default settings ───────────────────────────────────────
        $defaults = [
            'company_name'             => 'Mambilla Legacy Farms',
            'company_email'            => 'invest@legacyfarms.ng',
            'company_phone'            => '',
            'company_address'          => 'Mambilla Plateau, Taraba State, Nigeria',
            'admin_notification_emails'=> 'invest@legacyfarms.ng',
            // SMTP — fill in from Admin → Settings after deployment
            'smtp_host'                => '',
            'smtp_port'                => '587',
            'smtp_username'            => '',
            'smtp_password'            => '',
            'smtp_encryption'          => 'tls',
            'smtp_from_address'        => 'noreply@legacyfarms.ng',
            'smtp_from_name'           => 'Mambilla Legacy Farms',
        ];

        foreach ($defaults as $key => $value) {
            Setting::firstOrCreate(['key' => $key], ['value' => $value]);
        }
    }
}
