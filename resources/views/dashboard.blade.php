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
    <ul>
        @foreach ($personagens as $p)
            <li class="ml-4 my-8 p-4 w-40 bg-red-800">
                <a class="    rounded text-white" href="{{ route('personagem.show', $p->id) }}">
                    {{ $p->nome }} - nivel {{ $p->nivel }} - {{ $p->classe }}
                </a>

            </li>

            <form class="my-16" action="{{ route('delete.personagem', $p->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit">deletar o personagem: {{ $p->nome }}</button>
            </form>
            <hr class="border border-2 border-gray-900 my-2 w-60 ">
        @endforeach
    </ul>
</body>

</html>
