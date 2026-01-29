<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
</head>
<body>
        <a href="{{route('personagem.create')}}">criar personagem</a>
        <hr>
        <ul>
            @foreach($personagens as $p)
            <li>
                <a href="{{route('personagem.show', $p->id)}}">
                    {{$p->name}} - nivel {{$p->nivel}} {{$p->classe}}
                </a>
            </li>
            @endforeach
        </ul>
    </body>
</html>