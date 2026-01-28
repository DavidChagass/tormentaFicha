<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class personagemRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nome' =>'required|string|max:255',
            'raca' =>'required|string',
            'classe' =>'required|string',
            'divindade' =>'nullable|string',
        ];
    }
    public function messages(): array
    {
        return [
            'nome.required' => 'o nome é obrigatório',
            'classe.required' => 'voce deve ter uma classe',
        ];
    }
}
