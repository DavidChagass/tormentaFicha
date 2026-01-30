<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editar Magia</title>
</head>

<body>
    <div>
        <form action="{{ route('magia.update', $magia->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div>
                <label for="nome">Nome</label>
                <input type="text" name="nome" placeholder="nome" value="{{ $magia->nome }}" required>
            </div>
            <div>
                <label for="circulo">Circulo</label>
                <input type="number" name="circulo" placeholder="circulo" value="{{ $magia->circulo }}" required>
            </div>
            <div>
                <label for="escola">Escola</label>
                <input type="text" name="escola" placeholder="escola" value="{{ $magia->escola }}" required>
            </div>
            <div>
                <label for="execucao">Execucao</label>
                <input type="text" name="execucao" placeholder="execucao" value="{{ $magia->execucao }}" required>
            </div>
            <div>
                <label for="alcance">Alacance</label>
                <input type="text" name="alcance" placeholder="alcance" value="{{ $magia->alcance }}" required>
            </div>
            <div>
                <label for="alvo">Alvo</label>
                <input type="text" name="alvo" placeholder="alvo" value="{{ $magia->alvo }}" required>
            </div>
            <div>
                <label for="duracao">Duracao</label>
                <input type="text" name="duracao" placeholder="duracao" value="{{ $magia->duracao }}" required>
            </div>
            <div>
                <label for="resistencia">Resistencia</label>
                <input type="text" name="resistencia" placeholder="resistencia" value="{{ $magia->resistencia }}" required>
            </div>
            <div>
                <label for="descricao">Descricao</label>
                <textarea rows="10" cols="20" name="descricao" placeholder="melhorias de magia, etc" >{{ $magia->descricao }}</textarea>
            </div>

            <button type="submit">editar magia</button>
        </form>
        <form action="{{ route('magia.delete', $magia->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit">deletar magia</button>
        </form>
    </div>
</body>

</html>
