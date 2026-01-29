<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Personagem as Personagem;

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

        'pericias.*.treinado' => 'boolean',
        'pericias.*.outros_bonus' => 'nullable|integer',

        'ataques.*.nome' => 'nullable|string',
        'ataques.*.bonus' => 'nullable|integer',
        'ataques.*.dano' => 'nullable|string',
    ];


    public function mount($id)
    {
        $this->personagemId = $id;
        $p = Personagem::with(['pericias', 'itens', 'magias', 'ataques'])->findOrFail($id);

        $arrayCompleto = $p->toArray();
        //gambiarra que por algum motivo funciona
        $this->pericias = $arrayCompleto['pericias'] ?? [];
        $this->itens = $arrayCompleto['itens'] ?? [];
        $this->magias = $arrayCompleto['magias'] ?? [];
        $this->ataques = $arrayCompleto['ataques'] ?? [];

        $this->dados = collect($arrayCompleto)
            ->except(['pericias', 'itens', 'magias', 'ataques'])
            ->toArray();
    }

    public function salvar()
    {
        try {
            $p = Personagem::find($this->personagemId);

            $dadosParaSalvar = collect($this->dados)
                ->except(['pericias', 'itens', 'magias', 'ataques'])
                ->toArray();

            $p->update($dadosParaSalvar);

            foreach ($this->pericias as $periciaData) {
                \DB::table('personagens_pericias')
                    ->where('id', $periciaData['id'])
                    ->update([
                        'treinado' => $periciaData['treinado'] ? 1 : 0,
                        'outros_bonus' => intval($periciaData['outros_bonus'] ?? 0)
                    ]);
            }

            if (!empty($this->ataques)) {
                foreach ($this->ataques as $ataqueData) {
                    \DB::table('personagens_ataques')
                        ->where('id', $ataqueData['id'])
                        ->update([
                            'nome' => $ataqueData['nome'],
                            'bonus' => intval($ataqueData['bonus']),
                            'dano' => $ataqueData['dano']
                        ]);
                }
            }

            session()->flash('status', 'dados salvos');
        } catch (\Exception $e) {
            //erro pra eu resolver
            session()->flash('error', 'Erro ao salvar: ' . $e->getMessage());
        }
    }


    public function render()
    {
        return view('livewire.ficha-personagem');
    }
    public function updatedPericias($value, $key)
    {
        // O $key vem no formato "0.treinado" ou "5.outros_bonus"
        // Vamos extrair o índice
        $parts = explode('.', $key);
        $index = $parts[0];
        $campo = $parts[1];

        $pericia = $this->pericias[$index];

        // Salva apenas esta perícia no banco na hora
        \DB::table('pericias')
            ->where('id', $pericia['id'])
            ->update([
                $campo => ($campo === 'treinado') ? ($value ? 1 : 0) : $value
            ]);
    }
}
