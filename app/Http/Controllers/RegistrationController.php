<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegistrationRequest;
use App\Mail\InvestorRegisteredAdmin;
use App\Mail\InvestorRegisteredConfirmation;
use App\Models\Investor;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class RegistrationController extends Controller
{
    public function show()
    {
        if (auth()->check() && auth()->user()->isInvestor()) {
            return redirect()->route('investor.dashboard');
        }
        return view('public.invest');
    }

    public function store(RegistrationRequest $request)
    {
        $data = $request->validated();

        // Collect communication preferences
        $comms = collect(['Email', 'Phone', 'WhatsApp', 'SMS'])
            ->filter(fn($c) => $request->boolean('comm_' . strtolower($c)))
            ->values()->implode(', ');

        DB::transaction(function () use ($data, $comms, $request) {
            // Create user account
            $user = User::create([
                'name'     => $data['full_name'],
                'email'    => $data['email'],
                'password' => Hash::make(Str::random(16)), // investor sets password via email link if needed
                'role'     => 'investor',
            ]);

            // Create investor profile
            $investor = Investor::create([
                'user_id'            => $user->id,
                'reference_number'   => Investor::generateReference(),
                'full_name'          => $data['full_name'],
                'date_of_birth'      => $data['date_of_birth'],
                'bvn_rc_number'      => $data['bvn_rc_number'],
                'tax_id'             => $data['tax_id'] ?? null,
                'phone_primary'      => $data['phone_primary'],
                'phone_alternate'    => $data['phone_alternate'] ?? null,
                'address'            => $data['address'],
                'city_state'         => $data['city_state'] ?? null,
                'country'            => $data['country'],
                'communication_prefs'=> $comms ?: null,
                'investor_type'      => $data['investor_type'],
                'tier'               => $data['tier'],
                'custom_amount'      => $data['custom_amount'] ?? null,
                'payment_method'     => $data['payment_method'],
                'notes'              => $data['notes'] ?? null,
                'status'             => 'pending',
            ]);

            // Send emails — failures are caught so registration isn't blocked
            try {
                $adminEmail = Setting::get('company_email', config('mail.from.address'));
                Mail::to($adminEmail)->send(new InvestorRegisteredAdmin($investor));
                Mail::to($investor->user->email)->send(new InvestorRegisteredConfirmation($investor));
            } catch (\Exception $e) {
                logger()->error('Registration mail failed: ' . $e->getMessage());
            }

            // Log the investor in
            auth()->login($user);
        });

        return redirect()->route('investor.dashboard')
            ->with('success', 'Registration received! Your reference number has been assigned.');
    }
}
