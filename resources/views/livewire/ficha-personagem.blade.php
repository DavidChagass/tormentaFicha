<div>
    <div class="max-w-5xl mx-auto p-4 bg-[#fdf6e3] text-gray-900 border-2 border-red-900 shadow-2xl"
        wire:poll.15s="salvar" x-data="{ tab: 'pericias' }">

        <!-- CABEÇALHO E BOTÃO DE SALVAR -->
        <div class="flex justify-between items-center mb-6 bg-white p-4 border-b-4 border-red-900 sticky top-0 z-50">
            <div>
                <input type="text" wire:model="dados.nome"
                    class="text-xl font-bold bg-transparent border-none p-0 focus:ring-0 w-full"
                    placeholder="Nome do Personagem">
            </div>
            <!-- NIVEL -->
            <div class="bg-gray-100 p-2 border border-gray-400 ">
                <span class="text font-bold">NÍVEL</span>
                <input type="number" wire:model="dados.nivel" class="w-30 bg-transparent text-center font-bold">
            </div>
            <!-- RACA -->
            <div class="bg-gray-100 p-2 border border-gray-400 ">
                <span class="text font-bold">RACA</span>
                <input type="number" wire:model="dados.raca" class="w-30 bg-transparent text-center font-bold">
            </div>
            <!-- CLASSE -->
            <div class="bg-gray-100 p-2 border border-gray-400 ">
                <span class="text font-bold">CLASSE</span>
                <input type="number" wire:model="dados.classe" class="w-30 bg-transparent text-center font-bold">
            </div>
            <div class="text-right">
                <button wire:click="salvar"
                    class="bg-red-800 text-white px-4 py-2 rounded font-bold hover:bg-red-700 transition">
                    💾 SALVAR AGORA
                </button>
                <div wire:loading class="text-[10px] text-red-600 block italic">Sincronizando com o mundo...</div>
            </div>
        </div>

        <div class="grid grid-cols-12 gap-6">
            <!-- ATRIBUTOS (Sidebar) -->
            <div class="col-span-12 md:col-span-2 space-y-3">
                @foreach (['forca', 'destreza', 'constituicao', 'inteligencia', 'sabedoria', 'carisma'] as $attr)
                    <div class="border-2 border-red-900 bg-white p-2 rounded text-center">
                        <label class="text-[10px] font-bold uppercase text-red-800">{{ substr($attr, 0, 3) }}</label>
                        <input type="number" wire:model="dados.{{ $attr }}"
                            class="w-full text-center text-xl font-black border-none focus:ring-0 p-0">
                    </div>
                @endforeach
            </div>

            <!-- CONTEÚDO PRINCIPAL -->
            <div class="col-span-10 md:col-span-10">
                <!-- PV / ESTRESSE / PM / NÍVEL -->
                <div class="grid grid-cols-3 gap-2 mb-6 text-center">
                    <div class="bg-red-50 p-2 border border-red-900">
                        <span class="text font-bold text-red-800">VIDA</span>
                        <div class="flex justify-center gap-1">
                            <input type="number" wire:model="dados.hp_atual"
                                class="w-8 bg-transparent text-center font-bold"> /
                            <input type="number" wire:model="dados.hp_maximo" class="w-4 bg-transparent text-center">
                        </div>
                    </div>
                    {{--   <div class="grid grid-cols-3 gap-2 mb-6 text-center">
                        <div class="bg-purple-50 p-2 border border-purple-900">
                            <span class="text font-bold text-red-purple">ESTRESSE</span>
                            <div class="flex justify-center gap-1">
                                <input type="number" wire:model="dados.estresse_atual"
                                    class="w-4 bg-transparent text-center font-bold"> /
                                <input type="number" wire:model="dados.estresse_maximo"
                                    class="w-12 bg-transparent text-center">
                            </div>
                        </div> --}}
                    <div class="bg-blue-50 p-2 border border-blue-900">
                        <span class="text-xs font-bold text-blue-800">MANA</span>
                        <div class="flex justify-center gap-1">
                            <input type="number" wire:model="dados.mp_atual"
                                class="w-12 bg-transparent text-center font-bold"> /
                            <input type="number" wire:model.blur="dados.mp_maximo"
                                class="w-12 bg-transparent text-center">
                        </div>
                    </div>

                </div>

                <!-- NAVEGAÇÃO DE ABAS -->
                <div class="flex border-b-2 border-red-900 mb-4 gap-4 overflow-x-auto">
                    <button @click="tab = 'pericias'"
                        :class="tab === 'pericias' ? 'bg-red-900 text-white' : 'text-gray-500'"
                        class="px-4 py-1 text-xs uppercase font-bold transition">Perícias</button>
                    <button @click="tab = 'ataques'"
                        :class="tab === 'ataques' ? 'bg-red-900 text-white' : 'text-gray-500'"
                        class="px-4 py-1 text-xs uppercase font-bold transition">Ataques</button>
                    <button @click="tab = 'itens'"
                        :class="tab === 'itens' ? 'text-white bg-red-900' : 'text-gray-500'"
                        class="px-4 py-1 text-xs uppercase font-bold transition">Itens</button>
                    <button @click="tab = 'magias'"
                        :class="tab === 'magias' ? 'text-white bg-red-900' : 'text-gray-500'"
                        class="px-4 py-1 text-xs uppercase font-bold transition">Magias</button>
                    <button @click="tab = 'desc'"
                        :class="tab === 'desc' ? 'text-white bg-red-900' : 'text-gray-500'"
                        class="px-4 py-1 text-xs uppercase font-bold transition">Bio</button>
                </div>

                <!-- CONTEÚDO DAS ABAS -->
                <div class="bg-white p-4 shadow-inner min-h-[400px]">

                    <!-- PERÍCIAS -->
                    <div x-show="tab === 'pericias'" class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-2">
                        @foreach ($pericias as $idx => $pericia)
                            <div class="flex items-center justify-between border-b border-gray-300 py-1 gap-2">
                                <div class="flex items-center gap-2 flex-1">
                                    <!-- Checkbox de Treinado -->
                                    <input type="checkbox" wire:model.live="pericias.{{ $idx }}.treinado"
                                        class="accent-red-800 h-4 w-4 cursor-pointer">
                                    <span
                                        class="text-xs uppercase font-semibold text-gray-700">{{ $pericia['nome'] }}</span>
                                </div>

                                <div class="flex items-center gap-2">
                                    <!-- Campo para Outros Modificadores (Bônus de item, etc) -->
                                    <input type="number" wire:model.blur="pericias.{{ $idx }}.outros_bonus"
                                        placeholder="0"
                                        class="w-10 text-center text-xs border-b border-gray-400 bg-transparent focus:outline-none focus:border-red-800">

                                    <!-- Valor Total Calculado na Hora -->
                                    <div class="w-8 text-center bg-red-900 text-white font-bold rounded text-sm">
                                        {{ floor($dados['nivel'] / 2) +
                                            ($dados[$pericia['atributo_base']] ?? 0) +
                                            ($pericia['treinado'] ? 2 : 0) +
                                            ($pericia['outros_bonus'] ?? 0) }}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>


                    <!-- ATAQUES -->
                    <div x-show="tab === 'ataques'" class="space-y-2">
                        @foreach ($ataques as $idx => $ataque)
                            <div class="flex gap-2 border-b p-2 items-center">
                                <input type="text" wire:model="ataques.{{ $idx }}.nome"
                                    class="w-full font-bold" placeholder="Arma">
                                <input type="text" wire:model="ataques.{{ $idx }}.bonus"
                                    class="w-20 text-center" placeholder="Bônus">
                                <input type="text" wire:model="ataques.{{ $idx }}.dano"
                                    class="w-32 text-center" placeholder="Dano">
                            </div>
                        @endforeach
                    </div>

                    <!-- ITENS (Expandível) -->
                    <div x-show="tab === 'itens'">
                        @foreach ($itens as $item)
                            <details class="mb-2 bg-gray-50 border">
                                <summary class="p-2 font-bold cursor-pointer">{{ $item['nome'] }}
                                    ({{ $item['quantidade'] }}x)
                                </summary>
                                <div class="p-2 text-sm text-gray-700 border-t">
                                    {{ $item['descricao'] }}
                                </div>
                            </details>
                        @endforeach
                    </div>

                    <!-- MAGIAS (Expandível) -->
                    <div x-show="tab === 'magias'">
                        @foreach ($magias as $magia)
                            <details class="mb-2 border-l-4 border-blue-800">
                                <summary class="p-2 font-bold cursor-pointer bg-blue-50">
                                    {{ $magia['nome'] }} - <span class="text-xs">{{ $magia['circulo'] }}º
                                        Círculo</span>
                                </summary>
                                <div class="p-2 text-sm">
                                    <p class="italic mb-2 text-blue-900">{{ $magia['escola'] }} |
                                        {{ $magia['execucao'] }}</p>
                                    {{ $magia['descricao'] }}
                                </div>
                            </details>
                        @endforeach
                    </div>

                    <!-- DESCRIÇÃO / BIO -->
                    <div x-show="tab === 'desc'">
                        <textarea wire:model="dados.descricao" rows="10"
                            class="w-full p-2 border-2 border-dashed border-gray-300 focus:outline-none"
                            placeholder="Conte a história do seu herói..."></textarea>
                    </div>

                </div>
            </div>
        </div>
    </div>

</div>
