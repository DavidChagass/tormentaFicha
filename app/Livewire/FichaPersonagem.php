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
    protected $listeners = ['atualizarPericia'];
    public $abaAtiva = 'pericias';

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
        'dados.foto' => 'nullable|string',
    ];

    public function mount($id)
    {
        $this->personagemId = $id;
        $p = Personagem::with(['pericias', 'itens', 'magias', 'ataques'])->findOrFail($id);

        if ($p->pericias->isEmpty()) {
            $this->gerarPericiasBase($p);
            $p->refresh();
        }

        $this->abaAtiva = request()->query('tab', 'pericias');
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

    public function updated($property, $value)
    {
        if (str_starts_with($property, 'dados.') || str_starts_with($property, 'pericias.')) {
            $this->dispatch('trigger-save');
        }

        if (str_starts_with($property, 'pericias.')) {
            $parts = explode('.', $property);
            $index = $parts[1];
            $campo = $parts[2];
            $id = $this->pericias[$index]['id'];

            if ($campo === 'outros_bonus') {
                $value = trim((string) $value);
                $value = $value === '' ? 0 : (int) filter_var($value, FILTER_SANITIZE_NUMBER_INT);
                $this->pericias[$index]['outros_bonus'] = $value;
            }

            $updateValue = ($campo === 'treinado') ? ($value ? 1 : 0) : $value;

            DB::table('pericias')->where('id', $id)->update([$campo => $updateValue]);
        }
    }

    public function salvar()
    {
        DB::transaction(function () {
            Personagem::where('id', $this->personagemId)
                ->update(collect($this->dados)->only([
                    'nome',
                    'nivel',
                    'raca',
                    'classe',
                    'divindade',
                    'forca',
                    'destreza',
                    'constituicao',
                    'inteligencia',
                    'sabedoria',
                    'carisma',
                    'hp_atual',
                    'hp_maximo',
                    'mp_atual',
                    'mp_maximo',
                    'estresse_atual',
                    'estresse_maximo',
                    'descricao',
                    'defesa',
                    'foto'
                ])->toArray());

            foreach ($this->pericias as $p) {
                DB::table('pericias')
                    ->where('id', $p['id'])
                    ->update([
                        'treinado' => $p['treinado'] ? 1 : 0,
                        'outros_bonus' => $p['outros_bonus'] ?? 0
                    ]);
            }
        });

        $this->pericias = Personagem::find($this->personagemId)->pericias()->get()->toArray();

        $this->dispatch('saved');
    }

    public function atualizarPericia($id, $campo, $valor)
    {
        DB::table('pericias')->where('id', $id)->update([$campo => $valor]);
    }

    public function getCargaTotal()
    {
        return collect($this->itens)->sum(fn ($i) => ($i['peso'] ?? 0.0) * ($i['quantidade'] ?? 1));
    }

    public function render()
    {
        return view('livewire.ficha-personagem');
    }
}