<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Personagem;
use Illuminate\Support\Facades\DB;

class FichaPersonagem extends Component
{
    public $personagemId;
    public array $dados = [];
    public array $pericias = [];
    public array $itens = [];
    public array $magias = [];
    public array $ataques = [];

    protected $rules = [
        'dados.nome' => 'nullable|string',
        'dados.nivel' => 'nullable|integer',
        'dados.raca' => 'nullable|string',
        'dados.classe' => 'nullable|string',
        'dados.divindade' => 'nullable|string',
        'dados.forca' => 'nullable|integer',
        'dados.destreza' => 'nullable|integer',
        'dados.constituicao' => 'nullable|integer',
        'dados.inteligencia' => 'nullable|integer',
        'dados.sabedoria' => 'nullable|integer',
        'dados.carisma' => 'nullable|integer',
        'dados.hp_atual' => 'nullable|integer',
        'dados.hp_maximo' => 'nullable|integer',
        'dados.mp_atual' => 'nullable|integer',
        'dados.mp_maximo' => 'nullable|integer',
        'dados.descricao' => 'nullable|string',
        'dados.defesa' => 'nullable|integer',
        'pericias.*.treinado' => 'boolean',
        'pericias.*.outros_bonus' => 'nullable|integer',
    ];

    public function mount($id)
    {
        $this->personagemId = $id;
        $p = Personagem::with(['pericias', 'itens', 'magias', 'ataques'])->findOrFail($id);

        if ($p->pericias->isEmpty()) {
            $this->gerarPericiasBase($p);
            $p->refresh();
        }

        $arrayCompleto = $p->toArray();
        $this->pericias = $arrayCompleto['pericias'] ?? [];
        $this->itens = $arrayCompleto['itens'] ?? [];
        $this->magias = $arrayCompleto['magias'] ?? [];
        $this->ataques = $arrayCompleto['ataques'] ?? [];
        $this->dados = collect($arrayCompleto)->except(['pericias', 'itens', 'magias', 'ataques'])->toArray();
    }

    private function gerarPericiasBase($personagem)
    {
        $lista = [
            ['Acrobacia+', 'destreza'],
            ['Adestramento*', 'carisma'],
            ['Atletismo', 'forca'],
            ['Atuação', 'carisma'],
            ['Cavalgar', 'destreza'],
            ['Conhecimento*', 'inteligencia'],
            ['Cura', 'sabedoria'],
            ['Diplomacia', 'carisma'],
            ['Enganação', 'carisma'],
            ['Fortitude', 'constituicao'],
            ['Furtividade+', 'destreza'],
            ['Guerra*', 'inteligencia'],
            ['Iniciativa', 'destreza'],
            ['Intimidação', 'carisma'],
            ['Intuição', 'sabedoria'],
            ['Investigação', 'inteligencia'],
            ['Jogatina*', 'carisma'],
            ['Ladinagem*+', 'destreza'],
            ['Luta', 'forca'],
            ['Misticismo*', 'inteligencia'],
            ['Nobreza*', 'inteligencia'],
            ['Ofício*', 'inteligencia'],
            ['Percepção', 'sabedoria'],
            ['Pilotagem*', 'destreza'],
            ['Pontaria', 'destreza'],
            ['Reflexos', 'destreza'],
            ['Religião*', 'sabedoria'],
            ['Sobrevivência', 'sabedoria'],
            ['Vontade', 'sabedoria']
        ];

        $dadosParaInserir = [];
        foreach ($lista as $p) {
            $dadosParaInserir[] = [
                'personagem_id' => $personagem->id,
                'nome' => $p[0],
                'atributo_base' => $p[1],
                'treinado' => false,
                'outros_bonus' => 0,
            ];
        }
        DB::table('pericias')->insert($dadosParaInserir);
    }

    public function updated($propertyName, $value)
    {
        if (str_starts_with($propertyName, 'dados.')) {
            $campo = str_replace('dados.', '', $propertyName);
            DB::table('personagens')->where('id', $this->personagemId)->update([$campo => $value]);
        }

        if (str_starts_with($propertyName, 'pericias.')) {
            $parts = explode('.', $propertyName);
            $index = $parts[1];
            $campo = $parts[2];
            $id = $this->pericias[$index]['id'];

            DB::table('pericias')->where('id', $id)->update([
                $campo => ($campo === 'treinado') ? ($value ? 1 : 0) : ($value ?? 0)
            ]);
        }

        if (str_starts_with($propertyName, 'ataques.')) {
            $parts = explode('.', $propertyName);
            $index = $parts[1];
            $campo = $parts[2];
            $id = $this->ataques[$index]['id'];

            DB::table('ataques')->where('id', $id)->update([$campo => $value]);
        }
    }

    public function salvar()
    {
        try {
            DB::table('personagens')
                ->where('id', $this->personagemId)
                ->update(collect($this->dados)->except(['pericias', 'itens', 'magias', 'ataques'])->toArray());

            session()->flash('status', 'Sincronizado');
        } catch (\Exception $e) {
            session()->flash('error', 'Erro ao sincronizar');
        }
    }

    public function getCargaTotal()
    {
        return collect($this->itens)->sum(fn($i) => ($i['peso'] ?? 0) * ($i['quantidade'] ?? 1));
    }

    public function render()
    {
        return view('livewire.ficha-personagem');
    }
}
