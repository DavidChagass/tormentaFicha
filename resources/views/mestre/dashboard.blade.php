<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="{{ asset('IconTormenta20.ico') }}">
    <meta http-equiv="refresh" content="5">
    <title>Dashboard</title>
</head>

<body>
    @if ($personagem)
        @foreach ($personagem as $p)
            <ul>
                <ol>{{ $p->hp_atual }} / {{ $p->hp_maximo }} - <strong>{{ $p->nome }}</strong> 
                    </ol>
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
