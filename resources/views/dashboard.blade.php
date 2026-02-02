<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>

    <title>Dashboard</title>
</head>

<body class="bg-[#fdf6e3]">
    <div class="mt-12"></div>
    <a class="bg-red-800 text-white p-2 rounded m-4 " href="{{ route('personagem.create') }}">
        Criar personagem
    </a>
    <div class=" ">

    </div>
    <ul class="ml-4 mt-8">
        @foreach ($personagens as $p)
            <div class="border-red-800 border border-2 w-fit h-fit p-4 rounded">
                <a href="{{ route('personagem.show', $p->id) }}">
                    <li class="rounded text-white my-2 p-4 w-80 bg-red-800 rounded">
                        {{ $p->nome }} - nivel {{ $p->nivel }} - {{ $p->classe }}
                    </li>
                </a>
                <form action="{{ route('delete.personagem', $p->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="mt-16 bg-blue-200 w-fit p-4 rounded" type="submit">deletar:
                        {{ $p->nome }}</button>
                </form>
            </div>
        @endforeach
        <hr class="border  border-gray-700 my-2 w-96">
    </ul>
</body>

</html>
