<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;


class MagiaRequest extends FormRequest
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
            'nome'        => 'required|string|max:255',
            'circulo'     => 'nullable|integer',
            'escola'      => 'nullable|string|max:255',
            'execucao'    => 'nullable|string|max:255',
            'alcance'     => 'nullable|string|max:255',
            'alvo'        => 'nullable|string|max:255',
            'duracao'     => 'nullable|string|max:255',
            'resistencia' => 'nullable|string|max:255',
            'descricao'   => 'nullable'
        ];
    }
}
