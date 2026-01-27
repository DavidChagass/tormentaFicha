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
            'escola' => 'required|string',
            'execucao' => 'required|string',
            'alcance' => 'required|string',
            'alvo' => 'required|string',
            'duracao' => 'required|string',
            'resistencia' => 'required|string',
            'descricao' => 'required'
        ];
    }
}
