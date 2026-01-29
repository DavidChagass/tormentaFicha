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
        if(!$personagens){
            return redirect()->route('personagem.create');
        }
        return view('dashboard', compact('personagens'));
    }
    
    public function create(){
        return view('personagem.create');
    }

    public function store(personagemRequest $request){
        $dados = $request->validated();
        
        $dados['user_id'] = Auth::id(); 
     //   dd($dados);
      //  dd(Auth::id());
        $personagem = Personagem::query()->create($dados);
        return redirect()->route('personagem.show', $personagem->id);
    }

    public function magiaCreate(){
        return view('magia.create');
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
        return view('personagem.ficha', compact('personagem'));
    }
}
