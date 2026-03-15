<div>
    <div class="relative max-w-5xl mx-auto p-4 md:p-10 min-h-screen">
        <div class="absolute inset-0 z-0" 
            style="
                background-image: url('{{ asset('fundoficha.png') }}');
                background-size: repeat;
                background-position: center;
                box-shadow: inset 0 0 20px rgba(0,0,0,0.1);
                clip-path: polygon(0.5% 1%, 3% 0%, 97% 0.5%, 100% 2%, 99.5% 98%, 96% 100%, 2% 99.5%, 0% 97%);
            ">
        </div>

        <div class="relative z-10" wire:poll.15s="salvar" x-data="{ tab: @entangle('abaAtiva') }">{{-- WIRE:POLL DEIXAR EM 60, DEPENDENDO EU REDUZO PRA 20, OU 15 --}}
            <a class="ml-[4px] flex-1 px-5 w-20 h-fit py-1 border border-red-900/30 rounded hover:bg-red-900/10 transition text-base text-red-900 font-bold"
                href="{{ route('dashboard') }}">
                Voltar
            </a>

            <div class="h-fit flex justify-between items-center mb-4 p-1 border-b-4 border-red-900/40">

                <a href="{{ route('foto.edit', $personagemId) }}"
                    class="w-20 mb-2 h-20 border border-red-900 bg-white/40 overflow-hidden rounded flex items-center justify-center backdrop-blur-sm"
                    title="Clique para mudar a fotinha">

                    @if (!empty($dados['foto']))
                        <img src="{{ $dados['foto'] }}" referrerpolicy="no-referrer" class="w-full h-full object-cover">
                    @else
                        <span class="text-[10px] font-bold text-red-900 uppercase text-center p-1">adicionar <br>
                            foto</span>
                    @endif
                </a>

                <div class="bg-transparent">
                    <input type="text" wire:model.blur="dados.nome"
                        class="text-xl font-bold bg-transparent border-none p-0 focus:ring-0 w-fit text-red-950">
                </div>
                <div class="flex gap-4">
                    <div class="border-l-2 pl-2 border-red-900/40">
                        <label class="text font-bold uppercase text-[12px] block text-red-800">Nível</label>
                        <input type="number" wire:model.blur="dados.nivel" class="w-8 bg-transparent font-bold border-none focus:ring-0 text-red-950"
                            x-on:input="$event.target.value = $event.target.value.replace(/\D/g,'').slice(0,2)">
                    </div>
                    <div class="border-l-2 pl-2 border-red-900/40">
                        <label class="text font-bold uppercase text-[12px] block text-red-800">Raça</label>
                        <input type="text" wire:model.blur="dados.raca" class="w-24 bg-transparent font-bold border-none focus:ring-0 text-red-950">
                    </div>
                    <div class="border-l-2 pl-2 border-red-900/40">
                        <label class="text font-bold uppercase text-[12px] block text-red-800">Classe</label>
                        <input type="text" wire:model.blur="dados.classe" class="w-48 bg-transparent font-bold border-none focus:ring-0 text-red-950">
                    </div>
                    <div class="border-l-2 pl-2 border-red-900/40">
                        <label class="text font-bold uppercase text-[12px] block text-red-800">Divindade</label>
                        <input type="text" wire:model.blur="dados.divindade" class="w-24 bg-transparent font-bold border-none focus:ring-0 text-red-950">
                    </div>
                </div>

                <div class="text-right">
                    <button wire:click="salvar"
                        class="bg-red-800 text-white px-3 py-1 rounded font-bold hover:bg-red-700 transition">SALVAR</button>
                    <div wire:loading class="text-[10px] text-red-600 block italic">Sincronizando...</div>
                </div>
            </div>

            <div class="grid grid-cols-12 gap-2">
                <div class="col-span-1 md:col-span-2 space-y-2">
                    @foreach (['forca', 'destreza', 'constituicao', 'inteligencia', 'sabedoria', 'carisma'] as $attr)
                        <div class="border-2 border-red-900/30 bg-white/10 p-2 rounded text-center">
                            <label class="text-xl font-bold uppercase text-red-800">{{ substr($attr, 0, 3) }}</label>
                            <input type="number" wire:model.blur="dados.{{ $attr }}"
                                x-on:input="$event.target.value = $event.target.value.replace(/[^0-9+-]/g,'')"
                                class="w-full text-center text-xl font-black border-none bg-transparent focus:ring-0 p-0 text-red-950">
                        </div>
                    @endforeach
                </div>

                <div class="col-span-10 md:col-span-10">
                    <div class="grid grid-cols-4 gap-2 mb-4 text-center">
                        <div class="bg-red-900/5 p-2 border border-red-900/40 font-bold">
                            <span class="text text-red-800 uppercase">vida</span>
                            <div class="flex justify-center">
                                <input type="number" wire:model.blur="dados.hp_atual"
                                    class="w-8 bg-transparent text-center text-lg font-bold border-none focus:ring-0 text-red-950"> <strong class="text-red-800">/</strong>
                                <input type="number" wire:model.blur="dados.hp_maximo"
                                    class="w-8 bg-transparent text-lg text-center border-none focus:ring-0 text-red-950">
                            </div>
                        </div>
                        <div class="bg-purple-900/5 p-2 border border-purple-900/40 font-bold">
                            <span class="text text-purple-800 uppercase">estresse</span>
                            <div class="flex justify-center">
                                <input type="number" wire:model.blur="dados.estresse_atual"
                                    class="w-8 bg-transparent text-center text-lg font-bold border-none focus:ring-0 text-red-950"> <strong class="text-purple-800">/</strong>
                                <input type="number" wire:model.blur="dados.estresse_maximo"
                                    class="w-8 bg-transparent text-lg text-center border-none focus:ring-0 text-red-950">
                            </div>
                            <p class="ml-auto mr-auto text-center text-[13px] w-fit text-purple-800/80">10+Vontade</p>
                        </div>
                        <div class="bg-blue-900/5 p-2 border border-blue-900/40 font-bold">
                            <span class="text text-blue-800 uppercase">mana</span>
                            <div class="flex justify-center">
                                <input type="number" wire:model.blur="dados.mp_atual"
                                    class="w-8 bg-transparent text-center text-lg font-bold border-none focus:ring-0 text-red-950"> <strong class="text-blue-800">/</strong>
                                <input type="number" wire:model.blur="dados.mp_maximo"
                                    class="w-8 bg-transparent text-lg text-center border-none focus:ring-0 text-red-950">
                            </div>
                        </div>
                        <div class="bg-gray-900/5 p-2 border border-gray-900/40 font-bold">
                            <span class="text text-gray-800 uppercase">defesa </span>
                            <div class="flex justify-center">
                                <input type="number" wire:model.blur="dados.defesa"
                                    class="w-8 bg-transparent text-lg text-center font-bold border-none focus:ring-0 text-red-950">
                            </div>
                            <p class="ml-auto mr-auto text-center text-[13px] w-fit text-gray-800/80">10+DES+Armadura<br>+Escudo+Outros </p>
                        </div>
                    </div>

                    <div class="flex border-b-2 border-red-900/40 mb-4 gap-4 overflow-x-auto">
                        <button @click="tab = 'pericias'"
                            :class="tab === 'pericias' ? 'bg-red-900 text-white shadow-sm' : 'text-red-900/60'"
                            class="px-4 py-1 text-xs uppercase font-bold transition rounded-t-md">Perícias</button>
                        <button @click="tab = 'ataques'"
                            :class="tab === 'ataques' ? 'bg-red-900 text-white shadow-sm' : 'text-red-900/60'"
                            class="px-4 py-1 text-xs uppercase font-bold transition rounded-t-md">Ataques/Habilidades</button>
                        <button @click="tab = 'itens'"
                            :class="tab === 'itens' ? 'bg-red-900 text-white shadow-sm' : 'text-red-900/60'"
                            class="px-4 py-1 text-xs uppercase font-bold transition rounded-t-md">Itens</button>
                        <button @click="tab = 'magias'"
                            :class="tab === 'magias' ? 'bg-red-900 text-white shadow-sm' : 'text-red-900/60'"
                            class="px-4 py-1 text-xs uppercase font-bold transition rounded-t-md">Magias</button>
                        <button @click="tab = 'desc'"
                            :class="tab === 'desc' ? 'bg-red-900 text-white shadow-sm' : 'text-red-900/60'"
                            class="px-4 py-1 text-xs uppercase font-bold transition rounded-t-md">Descricao</button>
                    </div>

                    <div class="p-4 bg-white/5 border-2 border-red-900/30 rounded min-h-[400px]">

                        <div x-show="tab === 'pericias'" class="grid grid-cols-1 md:grid-cols-2 gap-x-4 gap-y-1">
                            @foreach ($pericias as $idx => $pericia)
                                <div class="flex items-center border-b border-red-900/10 py-1 gap-2">

                                    <div class="flex items-center gap-2 flex-1" wire:key="pericia-{{ $pericia['id'] }}">
                                        <input type="checkbox" wire:model.live="pericias.{{ $idx }}.treinado"
                                            class="accent-red-800">
                                        <span class="text-xs uppercase font-semibold flex-1 text-red-950">{{ $pericia['nome'] }}</span>
                                        <div class="w-30 text-center bg-red-900 text-white font-bold rounded text-sm mr-4">
                                            <p class="text-sm px-2">1/2 nivel: <span
                                                    class="pl-[px:4]">{{ floor($dados['nivel'] / 2) }} </span></p>
                                        </div>
                                        <label
                                            class="text-sm font-bold uppercase text-red-900">{{ substr($pericia['atributo_base'], 0, 3) }}</label>
                                        <input type="text" wire:model.blur="pericias.{{ $idx }}.outros_bonus"
                                            x-on:input="$event.target.value = $event.target.value.replace(/[^0-9+-]/g,'')"
                                            class="w-8 bg-transparent text-center border-b border-red-900/40 focus:ring-0 text-red-950">
                                        <div class="w-8 text-center bg-red-900 text-white font-bold rounded text-base">
                                            {{ floor($dados['nivel'] / 2) + ($dados[$pericia['atributo_base']] ?? 0) + ($pericia['treinado'] ? 2 : 0) + ($pericia['outros_bonus'] ?? 0) }}
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            <div class="border border-red-800/20 content-center place-items-center p-1 rounded mt-2">
                                <p class="justify-center ml-2 italic text-red-900/80 text-sm"> + = Penalidade de armadura
                                    / * = Somente treinada</p>
                            </div>
                        </div>

                        <div x-show="tab === 'ataques'" class="space-y-2">
                            <a href="{{ route('ataque.create', ['id' => $personagemId, 'tab' => 'ataques']) }}"
                                class="inline-block bg-red-800 text-white px-3 py-1 rounded text-xs font-bold mb-4 hover:bg-red-700 transition">Adicionar
                                Ataque/Habilidade</a>
                            @foreach ($ataques as $att)
                                <details wire:ignore wire:key="ataque-{{ $att['id'] }}"
                                    class="bg-white/10 border border-red-900/20 rounded overflow-hidden">
                                    <summary class="uppercase p-2 font-bold cursor-pointer text-sm text-red-950">
                                        {{ $att['nome'] }}
                                    </summary>
                                    <div class="p-2">
                                        <textarea class="resize-none bg-transparent w-full h-fit text-red-950 text-base border-none focus:ring-0" rows="5" disabled>{{ $att['descricao'] }}</textarea>
                                        <a href="{{ route('ataque.edit', ['id' => $att['id'], 'tab' => 'ataques']) }}"
                                            class="inline-block mt-2 bg-yellow-800 text-white px-4 py-1 rounded font-bold hover:bg-yellow-700 transition text-xs shadow-sm">edit</a>
                                    </div>
                                </details>
                            @endforeach
                        </div>

                        <div x-show="tab === 'itens'" class="space-y-2">
                            @php
                                $cargaAtual = $this->getCargaTotal();
                                $limite = 10 + $dados['forca'] * 2;
                            @endphp

                            <p class="ml-2 text-red-950 font-bold">Carga:
                                {{ number_format($cargaAtual, 1, ',', '.') }} / {{ $limite }} <span
                                    class="text-sm font-normal opacity-70">
                                    (Limite de Carga = 10 + 2*FOR)</span></p>
                            <a href="{{ route('item.create', ['id' => $personagemId, 'tab' => 'itens']) }}"
                                class="inline-block bg-red-800 text-white px-3 py-1 rounded text-xs font-bold mb-4 hover:bg-red-700">Adicionar
                                Item</a>
                            @foreach ($itens as $item)
                                <details wire:ignore wire:key="item-{{ $item['id'] }}"
                                    class="bg-white/10 border text-red-950 border-red-900/20 rounded overflow-hidden">
                                    <summary class="flex items-center uppercase p-2 font-bold cursor-pointer text-sm">
                                        {{ $item['nome'] }}
                                        ({{ number_format($item['quantidade'], 1, ',', '.') }}x)
                                        - Peso: {{ number_format($item['peso'] * $item['quantidade'], 1, ',', '.') }}

                                        <a class="inline-flex items-center justify-center w-[30px] h-[30px] ml-auto hover:bg-red-900/20 rounded transition"
                                            href="{{ route('item.edit', ['id' => $item['id'], 'tab' => 'itens']) }}">
                                            <svg class="w-fit h-fit fill-red-900" width="20px" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 640 640">
                                                <path
                                                    d="M535.6 85.7C513.7 63.8 478.3 63.8 456.4 85.7L432 110.1L529.9 208L554.3 183.6C576.2 161.7 576.2 126.3 554.3 104.4L535.6 85.7zM236.4 305.7C230.3 311.8 225.6 319.3 222.9 327.6L193.3 416.4C190.4 425 192.7 434.5 199.1 441C205.5 447.5 215 449.7 223.7 446.8L312.5 417.2C320.7 414.5 328.2 409.8 334.4 403.7L496 241.9L398.1 144L236.4 305.7zM160 128C107 128 64 171 64 224L64 480C64 533 107 576 160 576L416 576C469 576 512 533 512 480L512 384C512 366.3 497.7 352 480 352C462.3 352 448 366.3 448 384L448 480C448 497.7 433.7 512 416 512L160 512C142.3 512 128 497.7 128 480L128 224C128 206.3 142.3 192 160 192L256 192C273.7 192 288 177.7 288 160C288 142.3 273.7 128 256 128L160 128z" />
                                            </svg></a>
                                    </summary>

                                    <textarea class="px-2 py-2 resize-none bg-transparent w-full h-fit text-base text-red-950 border-none focus:ring-0" rows="5" disabled>{{ $item['descricao'] }}</textarea>

                                </details>
                            @endforeach


                        </div>

                        <div x-show="tab === 'magias'" class="space-y-2">
                            <p class="ml-2 text-base text-red-950 font-bold">Teste de Resistencia:
                                {{ 10 + floor($dados['nivel'] / 2) }} + mod
                                atributo-chave <span class="text-xs font-normal opacity-70">
                                    (10+1/2nivel + mod atributo-chave)</span></p>
                            <a href="{{ route('magia.create', ['id' => $personagemId, 'tab' => 'magias']) }}"
                                class="inline-block bg-red-800 text-white px-3 py-1 rounded text-xs font-bold mb-4 hover:bg-red-700">Adicionar
                                Magia</a>
                            @foreach ($magias as $magia)
                                <details wire:ignore class="mb-2 border-l-4 border-red-800 bg-white/10 overflow-hidden">
                                    <summary class="uppercase p-2 font-bold cursor-pointer text-red-950 bg-red-900/5 flex items-center">
                                        {{ $magia['nome'] }} - <span class="text-xs ml-2 opacity-70">{{ $magia['circulo'] }}º
                                            Círculo</span>

                                        <a class="ml-auto p-1 hover:bg-red-900/20 rounded transition" href="{{ route('magia.edit', ['id' => $magia['id'], 'tab' => 'magias']) }}">
                                            <svg class="w-5 h-5 fill-red-900" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 640 640">
                                            <path
                                                d="M535.6 85.7C513.7 63.8 478.3 63.8 456.4 85.7L432 110.1L529.9 208L554.3 183.6C576.2 161.7 576.2 126.3 554.3 104.4L535.6 85.7zM236.4 305.7C230.3 311.8 225.6 319.3 222.9 327.6L193.3 416.4C190.4 425 192.7 434.5 199.1 441C205.5 447.5 215 449.7 223.7 446.8L312.5 417.2C320.7 414.5 328.2 409.8 334.4 403.7L496 241.9L398.1 144L236.4 305.7zM160 128C107 128 64 171 64 224L64 480C64 533 107 576 160 576L416 576C469 576 512 533 512 480L512 384C512 366.3 497.7 352 480 352C462.3 352 448 366.3 448 384L448 480C448 497.7 433.7 512 416 512L160 512C142.3 512 128 497.7 128 480L128 224C128 206.3 142.3 192 160 192L256 192C273.7 192 288 177.7 288 160C288 142.3 273.7 128 256 128L160 128z" />
                                            </svg>
                                        </a>
                                    </summary>
                                    <div class="p-2 text-base text-red-950 bg-transparent">
                                        <p class="italic mb-2 text-red-900/80 text-xs font-bold">Escola: {{ $magia['escola'] }} |
                                            Execução: {{ $magia['execucao'] }} | Duração: {{ $magia['duracao'] }} |
                                            Alcance:
                                            {{ $magia['alvo'] }} | Alvo: {{ $magia['alvo'] }} | Resistencia:
                                            {{ $magia['resistencia'] }}</p>
                                        <textarea class="resize-none w-full bg-transparent border-none focus:ring-0 text-red-950 font-medium" rows="10" disabled>{{ $magia['descricao'] }}</textarea>
                                    </div>

                                </details>
                            @endforeach
                        </div>

                        <div x-show="tab === 'desc'">
                            <textarea wire:model.blur="dados.descricao" rows="16"
                                style="overflow-wrap: break-word; hyphens: auto; resize: none"
                                class="w-full resize-none h-full text-base text-red-950 p-2 bg-transparent border-none focus:ring-0 font-medium"></textarea>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>