<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MagiaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            //
            'nome' => 'required|string|max:255',
            'circulo' => 'required|integer',
            'escola' => 'required|string|max:255',
            'execucao' => 'required|string|max:255',
            'alcance' => 'required|string|max:255',
            'alvo' => 'required|string|max:255',
            'duracao' => 'required|string|max:255',
            'resistencia' => 'required|string|max:255',
            'descricao' => 'required'
        ];
    }
}
