<div>
    <div class="max-w-5xl mx-auto p-4 bg-[#f4ebd0] text-gray-900 border-2 border-red-900 shadow-2xl"
        wire:poll.35s="salvar" x-data="{ tab: 'pericias' }">{{-- WIRE:POLL DEIXAR EM 60, DEPENDENDO EU REDUZO PRA 20, OU 15 --}}

        <!-- CABEÇALHO -->
        <div class="flex justify-between items-center mb-6 bg-[#f4ebd0] p-4 border-b-4 border-red-900 sticky top-0 z-50">
            <div class="bg-[#f4ebd0]">
                <input type="text" wire:model.blur="dados.nome"
                    class="text-xl font-bold bg-transparent border-none p-0 focus:ring-0 w-full">
            </div>
            <!-- NIVEL, RACA, CLASSE, DIVINDADE -->
            <div class="flex gap-4">
                <div class="border-l-2 pl-2 border-red-900">
                    <label class="text font-bold uppercase text-[12px] block text-red-800">Nível</label>
                    <input type="number" wire:model.blur="dados.nivel" class="w-24 bg-transparent font-bold">
                </div>
                <div class="border-l-2 pl-2 border-red-900">
                    <label class="text font-bold uppercase text-[12px] block text-red-800">Raça</label>
                    <input type="text" wire:model.blur="dados.raca" class="w-24 bg-transparent font-bold">
                </div>
                <div class="border-l-2 pl-2 border-red-900">
                    <label class="text font-bold uppercase text-[12px] block text-red-800">Classe</label>
                    <input type="text" wire:model.blur="dados.classe" class="w-32 bg-transparent font-bold">
                </div>
                <div class="border-l-2 pl-2 border-red-900">
                    <label class="text font-bold uppercase text-[12px] block text-red-800">Divindade</label>
                    <input type="text" wire:model.blur="dados.divindade" class="w-24 bg-transparent font-bold">
                </div>
            </div>

            <div class="text-right">
                <button wire:click="salvar"
                    class="bg-red-800 text-white px-3 py-1 rounded font-bold hover:bg-red-700 transition">SALVAR</button>
                <div wire:loading class="text-[10px] text-red-600 block italic">Sincronizando...</div>
            </div>
        </div>

        <div class="grid grid-cols-12 gap-2">
            <!-- ATRIBUTOS (Sidebar) -->
            <div class="col-span-1 md:col-span-2 space-y-2">
                @foreach (['forca', 'destreza', 'constituicao', 'inteligencia', 'sabedoria', 'carisma'] as $attr)
                    <div class="border-2 border-red-900 bg-[#f4ebd0] p-2 rounded text-center">
                        <label class="text-xl font-bold uppercase text-red-800">{{ substr($attr, 0, 3) }}</label>
                        <input type="number" wire:model.blur="dados.{{ $attr }}"
                            class="w-full text-center text-xl font-black border-none bg-[#f4ebd0] focus:ring-0 p-0">
                    </div>
                @endforeach
            </div>

            <!-- CONTEÚDO PRINCIPAL -->
            <div class="col-span-10 md:col-span-10">
                <!-- PV / ESTRESSE / PM / DEFESA -->
                <!-- PV -->
                <div class="grid grid-cols-4 gap-2 mb-4 text-center">
                    <div class="bg-red-50 p-2 border border-red-900">
                        <span class="text font-bold text-red-800 uppercase">vida</span>
                        <div class="flex justify-center">
                            <input type="number" wire:model.blur="dados.hp_atual"
                                class="w-8 bg-transparent text-center font-bold"> /
                            <input type="number" wire:model.blur="dados.hp_maximo"
                                class="w-8 bg-transparent text-center">
                        </div>
                    </div>
                    <!-- ESTRESSE -->
                    <div class="bg-purple-50 p-2 border border-purple-900">
                        <span class="text font-bold text-purple-800 uppercase">estresse</span>
                        <div class="flex justify-center">
                            <input type="number" wire:model.blur="dados.estresse_atual"
                                class="w-8 bg-transparent text-center font-bold"> /
                            <input type="number" wire:model.blur="dados.estresse_maximo"
                                class="w-8 bg-transparent text-center">
                        </div>
                    </div>
                    <!-- PM -->
                    <div class="bg-blue-50 p-2 border border-blue-900">
                        <span class="text font-bold text-blue-800 uppercase">mana</span>
                        <div class="flex justify-center">
                            <input type="number" wire:model.blur="dados.mp_atual"
                                class="w-8 bg-transparent text-center font-bold"> /
                            <input type="number" wire:model.blur="dados.mp_maximo"
                                class="w-8 bg-transparent text-center">
                        </div>
                    </div>
                    <!-- DEFESA -->
                    <div class="bg-gray-100 p-2 border border-gray-900">
                        <span class="text font-bold text-gray-800 uppercase">defesa </span>
                        <div class="flex justify-center">
                            <input type="number" wire:model.blur="dados.defesa"
                                class="w-8 bg-transparent text-center font-bold">
                        </div>
                        <small class="text-[11px]">10+DES+Armadura+Escudo+Outros</small>
                    </div>
                </div>

                <!-- ABAS -->
                <div class="flex border-b-2 border-red-900 mb-4 gap-4 overflow-x-auto">
                    <button @click="tab = 'pericias'"
                        :class="tab === 'pericias' ? 'bg-red-900 text-white' : 'text-gray-500'"
                        class="px-4 py-1 text-xs uppercase font-bold transition">Perícias</button>
                    <button @click="tab = 'ataques'"
                        :class="tab === 'ataques' ? 'bg-red-900 text-white' : 'text-gray-500'"
                        class="px-4 py-1 text-xs uppercase font-bold transition">Ataques</button>
                    <button @click="tab = 'itens'"
                        :class="tab === 'itens' ? 'bg-red-900 text-white' : 'text-gray-500'"
                        class="px-4 py-1 text-xs uppercase font-bold transition">Itens</button>
                    <button @click="tab = 'magias'"
                        :class="tab === 'magias' ? 'bg-red-900 text-white' : 'text-gray-500'"
                        class="px-4 py-1 text-xs uppercase font-bold transition">Magias</button>
                    <button @click="tab = 'desc'"
                        :class="tab === 'desc' ? 'bg-red-900 text-white' : 'text-gray-500'"
                        class="px-4 py-1 text-xs uppercase font-bold transition">Descricao</button>
                </div>

                <div class="p-4 bg-[#f4ebd0] border-2 border-red-900 rounded min-h-[400px]">

                    <!-- PERÍCIAS -->
                    <div x-show="tab === 'pericias'" class="grid grid-cols-1 md:grid-cols-2 gap-x-4 gap-y-1">
                        @foreach ($pericias as $idx => $pericia)
                            <div class="flex items-center border-b border-gray-300 py-1 gap-2">

                                <div class="flex items-center gap-2 flex-1" wire:key="pericia-{{ $pericia['id'] }}"
                                    class="flex items-center border-b border-gray-300 py-1 gap-2">
                                    <input type="checkbox" wire:model.live="pericias.{{ $idx }}.treinado"
                                        class="accent-red-800">
                                    <span class="text-xs uppercase font-semibold flex-1">{{ $pericia['nome'] }}</span>
                                    <div class="w-30 text-center bg-red-900 text-white font-bold rounded text-sm mr-4">
                                        <p class="text-xs px-2">1/2 nivel: <span
                                                class="pl-[px:2]">{{ floor($dados['nivel'] / 2) }} </span></p>
                                    </div>
                                    <label
                                        class="text-sm font-bold uppercase text-gray-800">{{ substr($pericia['atributo_base'], 0, 3) }}</label>
                                    <input type="number" wire:model.blur="pericias.{{ $idx }}.outros_bonus"
                                        class="w-8 bg-transparent text-center border-b border-gray-400">
                                    <div class="w-8 text-center bg-red-900 text-white font-bold rounded text-xs">
                                        {{ floor($dados['nivel'] / 2) + ($dados[$pericia['atributo_base']] ?? 0) + ($pericia['treinado'] ? 2 : 0) + ($pericia['outros_bonus'] ?? 0) }}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <div class="border border-red-800 content-center place-items-center p-1 rounded">
                            <p class="justify-center ml-2 italic"> + = Penalidade de armadura
                                / * = Somente treinada</p>
                        </div>
                    </div>

                    <!-- ATAQUES -->
                    <div x-show="tab === 'ataques'" class="space-y-2">
                        @foreach ($ataques as $att => $ataque)
                            <div wire:key="ataque-{{ $ataque['id'] }}"
                                class="flex gap-2 border-b p-2 items-center bg-white/30 rounded">
                                <input type="text" wire:model.blur="ataques.{{ $att }}.nome"
                                    class="w-full bg-transparent font-bold">
                                <textarea wire:model.blur="ataques.{{ $att }}.descricao" rows="10"
                                    class="w-full p-2 bg-transparent border-2 border-dashed border-red-900/30 rounded focus:outline-none"></textarea>
                            </div>
                        @endforeach
                    </div>

                    <!-- ITENS -->
                    <div x-show="tab === 'itens'" class="space-y-2">
                        @php
                            $cargaAtual = $this->getCargaTotal();
                            $limite = 10 + $dados['forca'] * 2;
                        @endphp

                        <p class="ml-2">Carga: {{ $cargaAtual }} / {{ $limite }} <span class="text-xs">
                                (limite de carga = 10 + 2*Força)</span></p>
                        <a href="{{ route('item.create', $personagemId) }}"
                            class="inline-block bg-red-800 text-white px-3 py-1 rounded text-xs font-bold mb-4">Adicionar
                            Item</a>
                        @foreach ($itens as $item)
                            <details wire:key="item-{{ $item['id'] }}"
                                class="bg-white/50 border border-red-900/20 rounded">
                                <summary class="p-2 font-bold cursor-pointer text-sm">{{ $item['nome'] }}
                                    ({{ $item['quantidade'] }}x)
                                    - Peso:{{ $item['peso'] }}                                </summary>

                                <div class="p-2 text-xs text-gray-700 border-t bg-white/80">{{ $item['descricao'] }}
                                </div>
                                <a href="{{ route('item.edit', $item['id']) }}"
                                    class="ml-2 h-fit bg-yellow-700 text-white px-1 py-1 rounded font-bold hover:bg-yellow-600 transition mb-8">edit</a>
                            </details>
                        @endforeach


                    </div>

                    <!-- MAGIAS -->
                    <div x-show="tab === 'magias'" class="space-y-2">
                        <p class="ml-2 text-sm">Teste de resistencia: {{10 + floor($dados['nivel'] / 2) }} + mod atributo-chave <span class="text-xs">
                                (10+1/2nivel + mod atributo-chave)</span></p>
                        <a href="{{ route('magia.create', $personagemId) }}"
                            class="inline-block bg-red-800 text-white px-3 py-1 rounded text-xs font-bold mb-4">Adicionar
                            Magia</a>
                        @foreach ($magias as $magia)
                            <details class="mb-2 border-l-4 border-blue-800">
                                <summary class="p-2 font-bold cursor-pointer bg-blue-50">
                                    {{ $magia['nome'] }} - <span class="text-xs">{{ $magia['circulo'] }}º
                                        Círculo</span>
                                </summary>
                                <div class="p-2 text-sm">
                                    <p class="italic mb-2 text-blue-900">Escola: {{ $magia['escola'] }} |
                                        Exec: {{ $magia['execucao'] }} | Dur: {{ $magia['duracao'] }} | Alc:
                                        {{ $magia['alvo'] }} | Alvo: {{ $magia['alvo'] }} | Resist:
                                        {{ $magia['resistencia'] }}</p>
                                    {{ $magia['descricao'] }}
                                </div>
                                <a href="{{ route('magia.edit', $magia['id']) }}"
                                    class="ml-2 bg-yellow-700 text-white px-1 py-1 rounded font-bold hover:bg-yellow-600 transition mb-8">edit</a>
                            </details>
                        @endforeach
                    </div>

                    <!-- DESCRIÇÃO -->
                    <div x-show="tab === 'desc'">
                        <textarea wire:model.blur="dados.descricao" rows="10"
                            class="w-full p-2 bg-transparent border-2 border-dashed border-red-900/30 rounded focus:outline-none"></textarea>
                    </div>

                </div>
            </div>
        </div>
    </div>


</div>
