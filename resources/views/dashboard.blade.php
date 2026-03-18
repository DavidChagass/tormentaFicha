<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="{{ asset('IconTormenta20.ico') }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <title>Dashboard</title>
</head>

<body class="bg-[#fdf6e3]" x-data="{ showModal: false, charName: '', formId: '' }">

    <div class="mt-12"></div>
    <a class="bg-red-800 text-white p-2 rounded m-4 " href="{{ route('personagem.create') }}">
        Criar personagem
    </a>
    
    <ul class="ml-4 mt-8">
        @foreach ($personagens as $p)
            <div class="border-red-800 border border-2 w-fit h-fit p-4 rounded mb-4">
                <a href="{{ route('personagem.show', $p->id) }}">
                    <li class="rounded text-white my-2 p-4 w-80 bg-red-800">
                        {{ $p->nome }} - nivel {{ $p->nivel }} - {{ $p->classe }}
                    </li>
                </a>
                <form id="delete-form-{{ $p->id }}" action="{{ route('delete.personagem', $p->id) }}"
                    method="POST">
                    @csrf
                    @method('DELETE')
                    <button
                        @click.prevent="showModal = true; charName = '{{ $p->nome }}'; formId = 'delete-form-{{ $p->id }}'"
                        class="mt-16 bg-blue-200 w-fit p-4 rounded hover:bg-red-200 transition" type="button">
                        deletar: {{ $p->nome }}
                    </button>
                </form>
            </div>
        @endforeach
        <hr class="border border-gray-700 my-2 w-96">
    </ul>
    <!-- MODAL -->
    <div x-show="showModal"
    class="fixed inset-0 z-50 flex items-center justify-center bg-black/60 backdrop-blur-sm p-4"
    style="display: none;"> <!-- O Alpine remove esse display:none automaticamente -->
    
    <div class="bg-[#fdf6e3] border-4 border-red-800 p-8 rounded shadow-2xl max-w-sm w-full text-center">
        <h2 class="text-xl font-black text-red-800 uppercase mb-4">Confirmar Exclusão</h2>
        
        <p class="text-gray-800 mb-6">
            Você tem certeza que deseja apagar o personagem <br>
            <span class="font-bold text-lg"><span x-text="charName"></span>?
        </p>
        
        <div class="flex gap-4">
            <button @click="showModal = false" class="flex-1 px-4 py-2 border border-gray-400 rounded hover:bg-gray-100 transition">
                NÃO
            </button>
            
            <button @click="document.getElementById(formId).submit()" class="flex-1 px-4 py-2 bg-red-800 text-white font-bold rounded hover:bg-red-900 transition"> 
                SIM
            </button>
        </div>
    </div>
</div>

<div class="absolute bottom-10 left-2/3">
    <h1><strong>FUTUROS UPDATES!</strong></h1>
        <ul>
            <ol> - roteiro de combate</ol>
                <p>As habilidades, ataques e magias, agora vão ter uma checkbox para voce organizar o que quer fazer</p>
            <ol> - otimizações da ficha</ol>
            <ol> - alterar a ordem das magias/ataques/itens</ol>
            <ol> - mais blocos na aba de descrição</ol>
        </ul>
    </div>
</body>
</html>
