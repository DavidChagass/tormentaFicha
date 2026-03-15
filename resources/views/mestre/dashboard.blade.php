<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="{{ asset('IconTormenta20.ico') }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <meta http-equiv="refresh" content="10">
    <title>Dashboard</title>
</head>

<body>
    @if ($personagem)
        @foreach ($personagem as $p)
            <ul>
                <ol> <strong>{{ $p->nome }}</strong> - <i>hp atual: </i>{{ $p->hp_atual }} / <i>hp maximo: </i>
                    {{ $p->hp_maximo }}</ol>
            </ul>
        @endforeach
    @else
        <h2>não foi encontrado nenhum personagem</h2>
    @endif


{{-- 
    <script>
        setTimeout(function() {
            location.reload();
        }, 10000);
    </script> --}}
</body>

</html>
