<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegistrationRequest extends FormRequest
{
    public function authorize(): bool { return true; }

    public function rules(): array
    {
        return [
            'full_name'       => 'required|string|max:255',
            'date_of_birth'   => 'required|date|before:today',
            'bvn_rc_number'   => 'required|string|max:100',
            'tax_id'          => 'nullable|string|max:100',
            'phone_primary'   => 'required|string|max:30',
            'phone_alternate' => 'nullable|string|max:30',
            'email'           => 'required|email|unique:users,email',
            'address'         => 'required|string|max:500',
            'city_state'      => 'nullable|string|max:100',
            'country'         => 'required|string|max:100',
            'investor_type'   => 'required|in:Individual Investor,Corporate or Institutional Investor,Joint Investor,Foreign Investor,Diaspora Investor',
            'tier'            => 'required|in:Starter,Bronze,Silver,Gold,Platinum,Diamond,Custom',
            'custom_amount'   => 'nullable|string|max:100',
            'payment_method'  => 'required|in:Bank Transfer,RTGS,Cheque,Other',
            'notes'           => 'nullable|string|max:2000',
            'declaration_1'   => 'required|accepted',
            'declaration_2'   => 'required|accepted',
            'declaration_3'   => 'required|accepted',
        ];
    }

    public function messages(): array
    {
        return [
            'declaration_1.accepted' => 'You must acknowledge the business plan disclaimer.',
            'declaration_2.accepted' => 'You must confirm source of funds.',
            'declaration_3.accepted' => 'You must agree to be contacted.',
            'email.unique'           => 'An account with this email already exists. Please log in.',
        ];
    }

    // Never flash sensitive fields back to session
    protected $dontFlash = ['bvn_rc_number', 'tax_id'];
}
