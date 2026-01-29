<?php

namespace App\Http\Controllers;

use App\Http\Requests\MagiaRequest;
use App\Http\Requests\personagemRequest;
use App\Models\Personagem;
use App\Models\PersonagemMagia;
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
    public function editMagia($id)
    {
        $magia = PersonagemMagia::findOrFail($id);
       // dd($magia);
        return view('magia.edit', compact('magia'));
    }

    public function updateMagia(MagiaRequest $request, $id)
    {
        $magia = PersonagemMagia::findOrFail($id);
     //   dd($request->validated());
        $personagem_id = $magia->personagem_id;
        $magia->update($request->validated());
        return redirect()->route('personagem.show', $personagem_id);
    }

    public function destroyMagia($id)
    {
        $magia = PersonagemMagia::find($id);
        $id =  $magia->personagem_id;
        //dd($id);
        $magia->delete();

        return redirect()->route('personagem.show', $id);
    }
}
