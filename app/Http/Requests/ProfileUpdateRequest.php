<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
        'first_name' => ['required', 'string', 'max:255'],
        'last_name' => ['required', 'string', 'max:255'],

      
     // Validate the hidden full_phone input instead:
        'phone' => ['required', 'regex:/^\+\d{10,15}$/'
],

    'phone.regex' => 'Please enter a valid phone number with country code (e.g. +1 555 123 4567 or +44 20 7946 0958).',


        'address' => ['required', 'string', 'max:255'],
         'password' => [
                'nullable', // Make it 'required' if password must always be set
                'string',
                'min:8',
                'regex:/[A-Z]/',        // Must contain at least one uppercase letter
                'regex:/[a-z]/',        // Must contain at least one lowercase letter
                'regex:/[0-9]/',        // Must contain at least one number
                'regex:/[!@#$%^&*]/',   // Must contain at least one special character
                'confirmed'             // Requires password_confirmation field
            ],
    ];
}
}
