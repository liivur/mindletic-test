<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreConsultationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return !Auth::guest();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'end_at' => 'after:start_at|before:18:00',
            'payment_id' => 'required|string',
            'professional_id' => 'required|exists:professionals,id',
            'start_at' => 'required|date|before:end_at|after:9:00',
            'user_id' => 'required|exists:users,id',
        ];
    }
}
