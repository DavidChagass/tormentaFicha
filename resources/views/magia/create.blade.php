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
        <form action="{{ route('magia.store', $id) }}" method="POST">
            @csrf
                <div>
                <label for="nome">Nome</label>
                <input type="text" name="nome" placeholder="nome" required>
            </div>
            <div>
                <label for="circulo">Circulo</label>
                <input type="number" name="circulo" placeholder="circulo" required>
            </div>
            <div>
                <label for="escola">Escola</label>
                <input type="text" name="escola" placeholder="escola" required>
            </div>
            <div>
                <label for="execucao">Execucao</label>
                <input type="text" name="execucao" placeholder="execucao" required>
            </div>
            <div>
                <label for="alcance">Alacance</label>
                <input type="text" name="alcance" placeholder="alcance" required>
            </div>
            <div>
                <label for="alvo">Alvo</label>
                <input type="text" name="alvo" placeholder="alvo" value="" required>
            </div>
            <div>
                <label for="duracao">Duracao</label>
                <input type="text" name="duracao" placeholder="duracao" required>
            </div>
            <div>
                <label for="resistencia">Resistencia</label>
                <input type="text" name="resistencia" placeholder="resistencia"  required>
            </div>
            <div>
                <label for="descricao">Descricao</label>
                <textarea rows="10" cols="20" name="descricao" placeholder="melhorias de magia, etc" ></textarea>
            </div>

            <button type="submit">criar magia</button>
        </form>
    </div>
</body>

</html>
