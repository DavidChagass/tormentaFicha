<div>
    <div class="max-w-5xl mx-auto p-4 bg-[#f4ebd0] text-gray-900 border-2 border-red-900 shadow-2xl"
        style="
        background-image: url('{{ asset('fundoficha.png') }}');
        background-size: repeat;
        background-position: center;"
        wire:poll.15s="salvar" x-data="{ tab: @entangle('abaAtiva') }">{{-- WIRE:POLL DEIXAR EM 60, DEPENDENDO EU REDUZO PRA 20, OU 15 --}}
        <!-- BOTÃO DE VOLTAR -->
        <a class="ml-[4px] flex-1 px-5 w-20 h-fit py-1 border border-red-800 rounded hover:bg-red-100 transition text-base"
            href="{{ route('dashboard') }}">
            Voltar
        </a>
        <!-- CABEÇALHO -->
        <div class="h-fit flex justify-between items-center mb-4 bg-[#f4ebd0] p-1 border-b-4 border-red-900 ">

            <!-- IMAGEM -->
            <a href="{{ route('foto.edit', $personagemId) }}"
                class="w-20 mb-2 h-20 border border-red-900 bg-white overflow-hidden rounded flex items-center justify-center bg-gray-100"
                title="Clique para mudar a fotinha">

                @if (!empty($dados['foto']))
                    <img src="{{ $dados['foto'] }}" referrerpolicy="no-referrer" class="w-full h-full object-cover">
                @else
                    <span class="text-[10px] font-bold text-red-900 uppercase text-center p-1">adicionar <br>
                        foto</span>
                @endif
            </a>

            <!-- NOME -->
            <div class="bg-[#f4ebd0]">
                <input type="text" wire:model.blur="dados.nome"
                    class="text-xl font-bold bg-transparent border-none p-0 focus:ring-0 w-fit">
            </div>
            <!-- NIVEL, RACA, CLASSE, DIVINDADE -->
            <div class="flex gap-4">
                <div class="border-l-2 pl-2 border-red-900">
                    <label class="text font-bold uppercase text-[12px] block text-red-800">Nível</label>
                    <input type="number" wire:model.blur="dados.nivel" class="w-8 bg-transparent font-bold"
                        x-on:input="$event.target.value = $event.target.value.replace(/\D/g,'').slice(0,2)">
                </div>
                <div class="border-l-2 pl-2 border-red-900">
                    <label class="text font-bold uppercase text-[12px] block text-red-800">Raça</label>
                    <input type="text" wire:model.blur="dados.raca" class="w-24 bg-transparent font-bold">
                </div>
                <div class="border-l-2 pl-2 border-red-900">
                    <label class="text font-bold uppercase text-[12px] block text-red-800">Classe</label>
                    <input type="text" wire:model.blur="dados.classe" class="w-48 bg-transparent font-bold">
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
                            x-on:input="$event.target.value = $event.target.value.replace(/[^0-9+-]/g,'')"
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
                                class="w-8 bg-transparent text-center text-lg font-bold"> <strong>/</strong>
                            <input type="number" wire:model.blur="dados.hp_maximo"
                                class="w-8 bg-transparent text-lg text-center">
                        </div>
                    </div>
                    <!-- ESTRESSE -->
                    <div class="bg-purple-50 p-2 border border-purple-900">
                        <span class="text font-bold text-purple-800 uppercase">estresse</span>
                        <div class="flex justify-center">
                            <input type="number" wire:model.blur="dados.estresse_atual"
                                class="w-8 bg-transparent text-center text-lg font-bold"> <strong>/</strong>
                            <input type="number" wire:model.blur="dados.estresse_maximo"
                                class="w-8 bg-transparent text-lg text-center">
                        </div>
                        <p class="ml-auto mr-auto text-center text-[13px] w-fit">10+Vontade</p>
                    </div>
                    <!-- PM -->
                    <div class="bg-blue-50 p-2 border border-blue-900">
                        <span class="text font-bold text-blue-800 uppercase">mana</span>
                        <div class="flex justify-center">
                            <input type="number" wire:model.blur="dados.mp_atual"
                                class="w-8 bg-transparent text-center text-lg font-bold"> <strong>/</strong>
                            <input type="number" wire:model.blur="dados.mp_maximo"
                                class="w-8 bg-transparent text-lg text-center">
                        </div>
                    </div>
                    <!-- DEFESA -->
                    <div class="bg-gray-100 p-2 border border-gray-900">
                        <span class="text font-bold text-gray-800 uppercase">defesa </span>
                        <div class="flex justify-center">
                            <input type="number" wire:model.blur="dados.defesa"
                                class="w-8 bg-transparent text-lg text-center font-bold">
                        </div>
                        <p class="ml-auto mr-auto text-center text-[13px] w-fit">10+DES+Armadura<br>+Escudo+Outros </p>
                    </div>
                </div>

                <!-- ABAS -->
                <div class="flex border-b-2 border-red-900 mb-4 gap-4 overflow-x-auto">
                    <button @click="tab = 'pericias'"
                        :class="tab === 'pericias' ? 'bg-red-900 text-white' : 'text-gray-500'"
                        class="px-4 py-1 text-xs uppercase font-bold transition">Perícias</button>
                    <button @click="tab = 'ataques'"
                        :class="tab === 'ataques' ? 'bg-red-900 text-white' : 'text-gray-500'"
                        class="px-4 py-1 text-xs uppercase font-bold transition">Ataques/Habilidades</button>
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
                                        <p class="text-sm px-2">1/2 nivel: <span
                                                class="pl-[px:4]">{{ floor($dados['nivel'] / 2) }} </span></p>
                                    </div>
                                    <label
                                        class="text-sm font-bold uppercase text-gray-900">{{ substr($pericia['atributo_base'], 0, 3) }}</label>
                                    <input type="text" wire:model.blur="pericias.{{ $idx }}.outros_bonus"
                                        x-on:input="$event.target.value = $event.target.value.replace(/[^0-9+-]/g,'')"
                                        class="w-8 bg-transparent text-center border-b border-gray-400">
                                    <div class="w-8 text-center bg-red-900 text-white font-bold rounded text-base">
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
                        <a href="{{ route('ataque.create', ['id' => $personagemId, 'tab' => 'ataques']) }}"
                            class="inline-block bg-red-800 text-white px-3 py-1 rounded text-xs font-bold mb-4">Adicionar
                            Ataque/Habilidade</a>
                        @foreach ($ataques as $att)
                            <details wire:ignore wire:key="ataque-{{ $att['id'] }}"
                                class="bg-white/50 border border-red-900/20 rounded">
                                <summary class="uppercase p-2 font-bold cursor-pointer text-sm">
                                    {{ $att['nome'] }}
                                </summary>
                                <textarea class="resize-none bg-white/50 w-full h-fit text-gray-900 text-base" rows="5" disabled>{{ $att['descricao'] }}</textarea>
                                <a href="{{ route('ataque.edit', ['id' => $att['id'], 'tab' => 'ataques']) }}"
                                    class="ml-2 h-fit bg-yellow-700 text-white px-1 py-1 rounded font-bold hover:bg-yellow-600 transition mb-8">edit</a>
                            </details>
                        @endforeach
                    </div>

                    <!-- ITENS -->
                    <div x-show="tab === 'itens'" class="space-y-2">
                        @php
                            $cargaAtual = $this->getCargaTotal();
                            $limite = 10 + $dados['forca'] * 2;
                        @endphp

                        <p class="ml-2 text-gray-900 text-base">Carga:
                            {{ number_format($cargaAtual, 1, ',', '.') }} / {{ $limite }} <span
                                class="text-sm">
                                (Limite de Carga = 10 + 2*FOR)</span></p>
                        <a href="{{ route('item.create', ['id' => $personagemId, 'tab' => 'itens']) }}"
                            class="inline-block bg-red-800 text-white px-3 py-1 rounded text-xs font-bold mb-4">Adicionar
                            Item</a>
                        @foreach ($itens as $item)
                            <details wire:ignore wire:key="item-{{ $item['id'] }}"
                                class="bg-[#aa796b] border text-black border-red-900/20 rounded flex-2">
                                <summary class="flex items-center uppercase p-2 font-bold cursor-pointer text-sm">
                                    {{ $item['nome'] }}
                                    ({{ number_format($item['quantidade'], 1, ',', '.') }}x)
                                    - Peso: {{ number_format($item['peso'] * $item['quantidade'], 1, ',', '.') }}

                                    <a class="inline-flex items-center justify-center w-[30px] h-[30px] ml-auto"
                                        href="{{ route('item.edit', ['id' => $item['id'], 'tab' => 'itens']) }}">
                                        <svg class=" w-fit h-fit" width="30px" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 640 640"><!--!Font Awesome Free v7.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2026 Fonticons, Inc.-->
                                            <path
                                                d="M535.6 85.7C513.7 63.8 478.3 63.8 456.4 85.7L432 110.1L529.9 208L554.3 183.6C576.2 161.7 576.2 126.3 554.3 104.4L535.6 85.7zM236.4 305.7C230.3 311.8 225.6 319.3 222.9 327.6L193.3 416.4C190.4 425 192.7 434.5 199.1 441C205.5 447.5 215 449.7 223.7 446.8L312.5 417.2C320.7 414.5 328.2 409.8 334.4 403.7L496 241.9L398.1 144L236.4 305.7zM160 128C107 128 64 171 64 224L64 480C64 533 107 576 160 576L416 576C469 576 512 533 512 480L512 384C512 366.3 497.7 352 480 352C462.3 352 448 366.3 448 384L448 480C448 497.7 433.7 512 416 512L160 512C142.3 512 128 497.7 128 480L128 224C128 206.3 142.3 192 160 192L256 192C273.7 192 288 177.7 288 160C288 142.3 273.7 128 256 128L160 128z" />
                                        </svg></a>
                                </summary>

                                <textarea class=" px-1 resize-none bg-[#c49f8c] w-full h-fit text-base text-gray-900" rows="5" disabled>{{ $item['descricao'] }}</textarea>

                            </details>
                        @endforeach


                    </div>

                    <!-- MAGIAS -->
                    <div x-show="tab === 'magias'" class="space-y-2">
                        <p class="ml-2 text-base text-gray-900">Teste de Resistencia:
                            {{ 10 + floor($dados['nivel'] / 2) }} + mod
                            atributo-chave <span class="text-xs">
                                (10+1/2nivel + mod atributo-chave)</span></p>
                        <a href="{{ route('magia.create', ['id' => $personagemId, 'tab' => 'magias']) }}"
                            class="inline-block bg-red-800 text-white px-3 py-1 rounded text-xs font-bold mb-4">Adicionar
                            Magia</a>
                        @foreach ($magias as $magia)
                            <details wire:ignore class="mb-2 border-l-4 border-blue-800">
                                <summary class="uppercase p-2 font-bold cursor-pointer bg-blue-50">
                                    {{ $magia['nome'] }} - <span class="text-xs">{{ $magia['circulo'] }}º
                                        Círculo</span>

                                    <a href="{{ route('magia.edit', ['id' => $magia['id'], 'tab' => 'magias']) }}"
                                        <svg class=" w-fit h-fit" width="30px" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 640 640"><!--!Font Awesome Free v7.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2026 Fonticons, Inc.-->
                                        <path
                                            d="M535.6 85.7C513.7 63.8 478.3 63.8 456.4 85.7L432 110.1L529.9 208L554.3 183.6C576.2 161.7 576.2 126.3 554.3 104.4L535.6 85.7zM236.4 305.7C230.3 311.8 225.6 319.3 222.9 327.6L193.3 416.4C190.4 425 192.7 434.5 199.1 441C205.5 447.5 215 449.7 223.7 446.8L312.5 417.2C320.7 414.5 328.2 409.8 334.4 403.7L496 241.9L398.1 144L236.4 305.7zM160 128C107 128 64 171 64 224L64 480C64 533 107 576 160 576L416 576C469 576 512 533 512 480L512 384C512 366.3 497.7 352 480 352C462.3 352 448 366.3 448 384L448 480C448 497.7 433.7 512 416 512L160 512C142.3 512 128 497.7 128 480L128 224C128 206.3 142.3 192 160 192L256 192C273.7 192 288 177.7 288 160C288 142.3 273.7 128 256 128L160 128z" />
                                        </svg>
                                    </a>
                                </summary>
                                <div class="p-2 text-base text-gray-900 bg-blue-50">
                                    <p class="italic mb-2 text-indigo-800">Escola: {{ $magia['escola'] }} |
                                        Execução: {{ $magia['execucao'] }} | Duração: {{ $magia['duracao'] }} |
                                        Alcance:
                                        {{ $magia['alvo'] }} | Alvo: {{ $magia['alvo'] }} | Resistencia:
                                        {{ $magia['resistencia'] }}</p>
                                    <textarea class="resize-none w-full h-fit" rows="10" disabled>{{ $magia['descricao'] }}</textarea>
                                </div>

                            </details>
                        @endforeach
                    </div>

                    <!-- DESCRIÇÃO -->
                    <div x-show="tab === 'desc'">
                        <textarea wire:model.blur="dados.descricao" rows="16"
                            style="overflow-wrap: break-word; hyphens: auto; resize: none"
                            class="w-full resize-none h-full text-base text-gray-900 p-2 bg-transparent border-2 border-dashed border-red-900/30 rounded focus:outline-none"></textarea>
                    </div>

                </div>
            </div>
        </div>
    </div>


</div>
