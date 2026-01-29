<?php

namespace App\Http\Controllers;

use App\Http\Requests\MagiaRequest;
use App\Http\Requests\personagemRequest;
use App\Models\Personagem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PersonagemController extends Controller
{
    public function index()
    {
        $personagens = Personagem::where('user_id', Auth::id())->get();
        if (!$personagens) {
            return redirect()->route('personagem.create');
        }
        return view('dashboard', compact('personagens'));
    }

    public function create()
    {
        return view('personagem.create');
    }

    public function store(personagemRequest $request)
    {
        $dados = $request->validated();

        $dados['user_id'] = Auth::id();
        $personagem = Personagem::query()->create($dados);
        return redirect()->route('personagem.show', $personagem->id);
    }



    public function show($id)
    {
        $personagem = Personagem::with(['magias', 'itens'])->findOrFail($id);
        if ($personagem->user_id != Auth::id()) {
            abort(403, 'ta querendo ver a ficha dos outros né');
        }
        return view('personagem.ficha', compact('personagem'));
    }

    public function destroy($id)
    {
        $personagem = Personagem::find($id);
        $personagem->delete();
        return redirect()->route('dashboard');
    }


    //MAGIAS
    public function magiaCreate($id)
    {
        //dd($id);
        return view('magia.create', compact('id'));
    }

    public function storeMagia(MagiaRequest $request, $id)
    {
        $personagem = Personagem::findOrFail($id);
        $personagem->magias()->create($request->validated());
        return redirect()->route('personagem.show', $id);
    }
}
