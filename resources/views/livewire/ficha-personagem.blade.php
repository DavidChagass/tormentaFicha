<div>
    <div class="max-w-5xl mx-auto p-4 bg-[#f4ebd0] text-gray-900 border-2 border-red-900 shadow-2xl"
        wire:poll.15s="salvar" x-data="{ tab: 'pericias' }">

        <!-- CABEÇALHO E BOTÃO DE SALVAR -->
        <div class="flex justify-between items-center mb-6 bg-[#f4ebd0] p-4 border-b-4 border-red-900 sticky z-50">
            <div class="bg-[#f4ebd0]">
                <input type="text" wire:model="dados.nome"
                    class="text-xl font-bold bg-transparent border-none p-0 focus:ring-0 w-full"
                    placeholder="Nome do Personagem">
            </div>
            <!-- NIVEL -->
            <div class="bg-[#f4ebd0] border-l-2 pl-2 border-red-900">
                <label class="text font-bold">NÍVEL</label>
                <input type="number" wire:model="dados.nivel" class="w-12 bg-transparent text-center ">
            </div>
            <!-- RACA -->
            <div class="bg-[#f4ebd0] border-l-2 pl-2 border-red-900">
                <label class="text font-bold">RACA</label>
                <input type="text" wire:model="dados.raca" class="w-20 bg-transparent text-left ">
            </div>
            <!-- CLASSE -->
            <div class="bg-[#f4ebd0] border-l-2 pl-2 border-red-900">
                <span class="text font-bold">CLASSE</span>
                <input type="text" wire:model="dados.classe" class="w-22 bg-transparent text-left ">
            </div>
            <!-- CLASSE -->
            <div class="bg-[#f4ebd0] border-l-2 pl-2 border-red-900">
                <span class="text font-bold">DIVINDADE</span>
                <input type="text" wire:model="dados.divindade" class="w-20 bg-transparent text-left">
            </div>
            <div class="text-right">
                <button wire:click="salvar"
                    class="bg-red-800 text-white px-2 py-2 rounded font-bold hover:bg-red-700 transition">
                    SALVAR
                </button>
                <div wire:loading class="text-[12px] text-red-600 block italic">salvando...</div>
            </div>
        </div>

        <div class="grid grid-cols-12 gap-2">
            <!-- ATRIBUTOS (Sidebar) -->
            <div class="col-span-1 md:col-span-2 space-y-2">
                @foreach (['forca', 'destreza', 'constituicao', 'inteligencia', 'sabedoria', 'carisma'] as $attr)
                    <div class="border-2 border-red-900 bg-[#f4ebd0] p-2 rounded text-center">
                        <label class="text-xl font-bold uppercase text-red-800">{{ substr($attr, 0, 3) }}</label>
                        <input type="number" wire:model="dados.{{ $attr }}"
                            class="w-full text-center text-xl font-black border-none bg-[#f4ebd0] focus:ring-0 p-0">
                    </div>
                @endforeach
            </div>

            <!-- CONTEÚDO PRINCIPAL -->
            <div class="col-span-10 md:col-span-10">
                <!-- PV / ESTRESSE / PM / NÍVEL -->
                <div class="grid grid-cols-3 gap-2 mb-2 text-center">
                    <div class="bg-red-50 border border-red-900">
                        <span class="text font-bold text-red-800">VIDA</span>
                        <div class="flex justify-center ">
                            <input type="number" wire:model="dados.hp_atual"
                                class="w-8 bg-transparent text-center font-bold"> /
                            <input type="number" wire:model="dados.hp_maximo" class="w-8 bg-transparent text-center">
                        </div>
                    </div>
                    <div class="bg-purple-50 border border-purple-900">
                        <span class="text font-bold text-purple-800">ESTRESSE</span>
                        <div class="flex justify-center ">
                            <input type="number" wire:model="dados.estresse_atual"
                                class="w-8 bg-transparent text-center font-bold"> /
                            <input type="number" wire:model="dados.estresse_maximo" class="w-8 bg-transparent text-center">
                        </div>
                    </div>
                    <div class="bg-blue-50 p-2 border border-blue-900">
                        <span class="text-xs font-bold text-blue-800">MANA</span>
                        <div class="flex justify-center ">
                            <input type="number" wire:model="dados.mp_atual"
                                class="w-8 bg-transparent text-center font-bold"> /
                            <input type="number" wire:model.blur="dados.mp_maximo"
                                class="w-8 bg-transparent text-center">
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
                <div class=" p-4 shadow-inner min-h-[400px] bg-[#f4ebd0] border-2 border-red-900 rounded">

                    <!-- PERÍCIAS -->
                    <div x-show="tab === 'pericias'" class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-2 bg-[#f4ebd0]">
   
                        @foreach ($pericias as $idx => $pericia)
                            <div class="flex items-center justify-between border-b border-gray-300 py-1 gap-2">
                                <div class="flex items-center gap-2 flex-1">
                                    <!-- Checkbox de Treinado -->
                                    <input type="checkbox" wire:model.live="pericias.{{ $idx }}.treinado"
                                        class="accent-red-800 h-4 w-4 cursor-pointer">
                                    <span
                                        class="text-xs uppercase font-semibold text-gray-700">{{ $pericia['nome'] }}</span>
                                </div>
                                <div class="w-30 text-center bg-red-900 text-white font-bold rounded text-sm mr-10">
                                    <p class="text-sm px-2">1/2 do nivel: <span class="pl-[px:2]">{{ floor($dados['nivel']/2)}} </span></p>
                                </div>
                                <div class="flex items-center gap-2">
                                    <input type="number" wire:model.blur="pericias.{{ $idx }}.outros_bonus"
                                        placeholder="0"
                                        class="w-10 text-center text-xs border-b border-gray-400 bg-transparent focus:outline-none focus:border-red-800">

                                    <div class="w-8 text-center bg-red-900 text-white font-bold rounded text-sm">
                                        {{ floor($dados['nivel'] / 2) +
                                            ($dados[$pericia['atributo_base']] ?? 0) +
                                            ($pericia['treinado'] ? 2 : 0) +
                                            ($pericia['outros_bonus'] ?? 0) }}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        + = Penalidade de armadura
                        / * = Somente treinada
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

                    <!-- ITENS -->
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

                    <!-- MAGIAS -->
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
