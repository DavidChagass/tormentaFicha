<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Criar Magias</title>
</head>

<body>
    <div>
        <form action="{{route('magia.store')}}" method="POST">
            @csrf
            <div>
                <input type="text" name="nome" placeholder="nome" required>
            </div>
            <div>
                <input type="number" name="circulo" placeholder="circulo" required>
            </div>
            <div>
                <input type="text" name="escola" placeholder="escola" required>
            </div>
            <div>
                <input type="text" name="execucao" placeholder="execucao" required>
            </div>
            <div>
                <input type="text" name="alcance" placeholder="alcance" required>
            </div>
            <div>
                <input type="text" name="alvo" placeholder="alvo" required>
            </div>
            <div>
                <input type="text" name="duracao" placeholder="duracao" required>
            </div>
            <div>
                <input type="text" name="resistencia" placeholder="resistencia" required>
            </div>
            <div>
                <textarea name="descricao" placeholder="melhorias de magia, etc">
                </textarea>
            </div>

            <button type="submit">criar magia</button>
        </form>
    </div>
</body>

</html>
