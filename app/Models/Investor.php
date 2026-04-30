<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Investor extends Model
{
    protected $fillable = [
        'user_id', 'reference_number', 'full_name', 'date_of_birth',
        'bvn_rc_number', 'tax_id', 'phone_primary', 'phone_alternate',
        'address', 'city_state', 'country', 'communication_prefs',
        'investor_type', 'tier', 'custom_amount', 'payment_method',
        'notes', 'status',
    ];

    protected $casts = ['date_of_birth' => 'date'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function statusBadgeClass(): string
    {
        return match ($this->status) {
            'approved' => 'badge-green',
            'active'   => 'badge-blue',
            'suspended'=> 'badge-red',
            'completed'=> 'badge-purple',
            default    => 'badge-yellow',
        };
    }

    public function tierAmount(): string
    {
        return match ($this->tier) {
            'Starter'  => '₦10,000,000',
            'Bronze'   => '₦20,000,000',
            'Silver'   => '₦50,000,000',
            'Gold'     => '₦100,000,000',
            'Platinum' => '₦200,000,000',
            'Diamond'  => '₦1,000,000,000+',
            'Custom'   => $this->custom_amount ?? 'Custom',
            default    => '—',
        };
    }

    public static function generateReference(): string
    {
        $year = now()->year;
        $count = static::whereYear('created_at', $year)->count() + 1;
        return 'LF/' . $year . '/' . str_pad($count, 5, '0', STR_PAD_LEFT);
    }
}
