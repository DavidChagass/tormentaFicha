<?php

namespace App\Http\Controllers;

use App\Http\Requests\ItemRequest;
use App\Http\Requests\MagiaRequest;
use App\Http\Requests\personagemRequest;
use App\Models\Personagem;
use App\Models\PersonagemItem;
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
    public function createMagia($id)
    {
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
        return view('magia.edit', compact('magia'));
    }

    public function updateMagia(MagiaRequest $request, $id)
    {
        $magia = PersonagemMagia::findOrFail($id);
        $personagem_id = $magia->personagem_id;
        $magia->update($request->validated());
        return redirect()->route('personagem.show', $personagem_id);
    }

    public function destroyMagia($id)
    {
        $magia = PersonagemMagia::find($id);
        $id =  $magia->personagem_id;
        $magia->delete();

        return redirect()->route('personagem.show', $id);
    }

    //ITEM
    public function createItem($id)
    {
        return view('item.create', compact('id'));
    }

    public function storeItem(ItemRequest $request, $id)
    {
        $personagem = Personagem::findOrFail($id);
        $personagem->itens()->create($request->validated());
        return redirect()->route('personagem.show', $id);
    }

    public function editItem($id)
    {
        $item = PersonagemItem::findOrFail($id);
        return view('item.edit', compact('item'));
    }

    public function updateItem(ItemRequest $request, $id)
    {
        $item = PersonagemItem::findOrFail($id);
        $personagem_id = $item->personagem_id;
        $item->update($request->validated());
        return redirect()->route('personagem.show', $personagem_id);
    }

    public function destroyItem($id)
    {
        $item = PersonagemItem::find($id);
        $personagem_id = $item->personagem_id;
        $item->delete();
        return redirect()->route('personagem.show', $personagem_id);
    }


    //ATAQUE
    public function createAtaque() {}

    public function storeAtaque() {}

    public function editAtaque() {}

    public function updateAtaque() {}

    public function destroyAtaque() {}
}
