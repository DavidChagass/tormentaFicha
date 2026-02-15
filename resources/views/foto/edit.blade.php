<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="{{ asset('IconTormenta20.ico') }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Editar a foto</title>
</head>

<body>
    <div class="max-w-xl mx-auto p-8 bg-[#f4ebd0] border-2 border-red-900 shadow-xl mt-10">
        <h1 class="text-2xl font-bold text-red-900 border-b-2 border-red-900 mb-6 uppercase">Alterar Fotinha
        </h1>

        <form action="{{ route('foto.update', $personagem->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-6">
                <label class="block font-bold text-red-900 mb-2">Link da Imagem (URL)</label>
                <input type="text" name="foto" value="{{ $personagem->foto }}"
                    class="w-full p-2 border-2 border-red-900/30 bg-white focus:outline-none focus:border-red-900"
                    placeholder="link da foto.png" required>
                <p class="text-base text-gray-600 mt-2 italic">* RECOMENDO USAR O Postimages.org</p> 
            </div>

            <div class="flex justify-between items-center">
                <a href="{{ route('personagem.show', $personagem->id) }}"
                    class="text-gray-600 underline text-sm">Voltar sem salvar</a>
                <button type="submit" class="bg-red-900 text-white px-6 py-2 font-bold hover:bg-red-800 transition">
                    CONFIRMAR FOTINHA
                </button>
            </div>
        </form>
    </div>
</body>

</html>
