<?php

namespace App\Http\Controllers;

use App\Http\Requests\MagiaRequest;
use App\Models\Personagem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PersonagemController extends Controller
{
    public function index()
    {
        $personagens = Personagem::where('user_id', Auth::id())->get();
        return view('personagens.index', compact('personagens'));
    }


    public function storeMagia(MagiaRequest $request, Personagem $personagem)
    {
        $personagem->magias()->create($request->validated());

        return back()->with('sucesso', 'Eba MAGIA!!!');
    }

    public function show($id)
    {
        $personagem = Personagem::with(['magias', 'itens'])->findOrFail($id);
        if ($personagem->user_id != Auth::id()) {
            abort(403, 'ta querendo ver a ficha dos outros né');
        }
        return view('personagens.ficha', compact('personagem'));
    }
}
