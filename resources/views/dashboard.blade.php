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
    <div class=" py-20 content-center place-items-center">
        <a class="bg-red-600 text-white p-4 " href="{{ route('personagem.create') }}">criar personagem</a>
    </div>
    <hr>
    <ul>
        @foreach ($personagens as $p)
            <li class="bg-red-50">
                <a href="{{ route('personagem.show', $p->id) }}">
                    {{ $p->nome }} - nivel {{ $p->nivel }} {{ $p->classe }}
                </a>
            </li>
        @endforeach
    </ul>
</body>

</html>
