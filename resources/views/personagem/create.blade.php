<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Document</title>
</head>

<body>
    <div class="bg-gray-600 grid h-screen content-left place-items-center">

        <form
            class="flex flex-col gap-4 bg-gray-700 grid content-left place-items-center rounded-lg shadow-2xl w-96 h-144 content-evenly "
            action="{{ route('personagem.store') }}" method="POST">
            <h2 class="text-2xl font-bold text-center text-gray-300">Criar Personagem</h2>
            @csrf
            <div>
                <input
                    class="w-60 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-transparent bg-gray-500 placeholder:text-gray-300 text-white"
                    type="text" name="nome" placeholder="nome" required>
            </div>
            <div>
                <input
                    class="w-60 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-transparent bg-gray-500 placeholder:text-gray-300 text-white"
                    type="text" name="raca" placeholder="raca" required>
            </div>
                <div>
                <input
                    class="w-60 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-transparent bg-gray-500 placeholder:text-gray-300 text-white"
                    type="text" name="classe" placeholder="classe" required>
            </div>
            <div>
                <input
                    class="w-60 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-transparent bg-gray-500 placeholder:text-gray-300 text-white"
                    type="text" name="divindade" placeholder="divindade (opcional)">
            </div>
                <div>
                <input
                    class="w-60 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-transparent bg-gray-500 placeholder:text-gray-300 text-white"
                    type="text" name="nivel" placeholder="nivel" required>
            </div>
                <h3 class="text-white text-sm p-2">Os atributos, itens, magias e status(vida/mana/estresse) serão adicionados após a criação inicial</h3>
            <button class=" rounded-md bg-gray-800 w-60 py-2 text-sm font-medium text-white text-center"
                type="submit">criar personagem</button>
        </form>
    </div>
</body>

</html>
