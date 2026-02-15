<?php

namespace App\Http\Controllers;

use App\Http\Requests\AtaqueRequest;
use App\Http\Requests\ItemRequest;
use App\Http\Requests\MagiaRequest;
use App\Http\Requests\personagemRequest;
use App\Models\Ataques;
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
    public function createMagia($id, $tab)
    {
        return view('magia.create', compact('id', 'tab'));
    }

    public function storeMagia(MagiaRequest $request, $id, $tab)
    {
        $personagem = Personagem::findOrFail($id);
        $personagem->magias()->create($request->validated());
        return redirect()->route('personagem.show', ['id' => $id, 'tab' => $tab]);
    }
    public function editMagia($id, $tab)
    {
        $magia = PersonagemMagia::findOrFail($id);
        return view('magia.edit', compact('magia', 'tab'));
    }

    public function updateMagia(MagiaRequest $request, $id, $tab)
    {
        $magia = PersonagemMagia::findOrFail($id);
        $personagem_id = $magia->personagem_id;
        $magia->update($request->validated());
        return redirect()->route('personagem.show', ['id' => $personagem_id, 'tab' => $tab]);
    }

    public function destroyMagia($id, $tab)
    {
        $magia = PersonagemMagia::find($id);
        $id =  $magia->personagem_id;
        $magia->delete();
        return redirect()->route('personagem.show', ['id' => $id, 'tab' => $tab]);
    }



    //ITEM
    public function createItem($id, $tab)
    {
        return view('item.create', compact('id', 'tab'));
    }

    public function storeItem(ItemRequest $request, $id, $tab)
    {
        $personagem = Personagem::findOrFail($id);
        $personagem->itens()->create($request->validated());
        return redirect()->route('personagem.show', ['id' => $id, 'tab' => $tab]);
    }

    public function editItem($id, $tab)
    {
        $item = PersonagemItem::findOrFail($id);
        return view('item.edit', compact('item', 'tab'));
    }

    public function updateItem(ItemRequest $request, $id, $tab)
    {
        $item = PersonagemItem::findOrFail($id);
        $personagem_id = $item->personagem_id;
        $item->update($request->validated());
        return redirect()->route('personagem.show', ['id' => $personagem_id, 'tab' => $tab]);
    }

    public function destroyItem($id, $tab)
    {
        $item = PersonagemItem::find($id);
        $personagem_id = $item->personagem_id;
        $item->delete();
        return redirect()->route('personagem.show', ['id' => $personagem_id, 'tab' => $tab]);
    }


    //ATAQUE
    public function createAtaque($id, $tab)
    {
        return view('ataque.create', compact('id', 'tab'));
    }

    public function storeAtaque(AtaqueRequest $request, $id, $tab)
    {
        $personagem = Personagem::findOrFail($id);
        $personagem->ataques()->create($request->validated());
        return redirect()->route('personagem.show', [
            'id' => $id,
            'tab' => $tab
        ]);
    }

    public function editAtaque($id, $tab)
    {
        $ataque = Ataques::findOrFail($id);
        return view('ataque.edit', compact('ataque', 'tab'));
    }

    public function updateAtaque(AtaqueRequest $request, $id, $tab)
    {
        $item = Ataques::findOrFail($id);
        $personagem_id = $item->personagem_id;
        $item->update($request->validated());
        return redirect()->route('personagem.show', [
            'id' => $personagem_id,
            'tab' => $tab
        ]);
    }

    public function destroyAtaque($id, $tab)
    {
        $ataque = Ataques::find($id);
        $personagem_id = $ataque->personagem_id;
        $ataque->delete();
        return redirect()->route('personagem.show', [
            'id' => $personagem_id,
            'tab' => $tab
        ]);
    }

    //FOTO
    public function editFoto($id)
    {
        $personagem = Personagem::findOrFail($id);
        return view('foto.edit', compact('personagem'));
    }
    public function updateFoto(Request $request, $id)
    {
        $request->validate(['foto' => 'required|url']);


        $personagem = Personagem::findOrFail($id);
        $personagem->update(
            ['foto' => $request->foto]
        );
        return redirect()->route('personagem.show', ['id' => $id]);
    }
}
