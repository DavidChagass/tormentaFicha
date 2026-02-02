<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="{{ asset('IconTormenta20.ico') }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Criar Magias</title>
    <style>
        input {
            background: transparent !important;
            border: none !important;
            border-bottom: 1px solid #656668 !important;
            border-radius: 0 !important;
            padding: 2px 5px !important;
        }

        input:focus {
            outline: none !important;
            border-bottom: 1px solid #b12d2d !important;
            box-shadow: none !important;

        }

        textarea {
            background: transparent !important;
            border: none !important;
            border: 1px solid #656668 !important;
            border-radius: 0 !important;
            padding: 2px 5px !important;
        }

        textarea:focus {
            outline: none !important;
            border: 1px solid #b12d2d !important;
            box-shadow: none !important;

        }

        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            /* display: none; <- Crashes Chrome on hover */
            -webkit-appearance: none;
            margin: 0;
            /* <-- Apparently some margin are still there even though it's hidden */
        }

        input[type=number] {
            -moz-appearance: textfield;
            /* Firefox */
        }
    </style>
</head>

<body class="bg-[#1a0a0a] grid h-screen content-center place-items-center">
    <div
        class=" flex flex-col gap-4 bg-[#f4ebd0] flex rounded-lg shadow-2xl w-fit h-fit content-evenly border border-2 p-2 border-transparent">
        <div
            class=" flex flex-col gap-4 bg-[#f4ebd0] flex rounded-lg shadow-2xl w-fit h-fit content-evenly border border-2 p-2 border-red-900">

            <form action="{{ route('magia.store', ['id' => $id, 'tab' => $tab]) }}" method="POST"
                class="grid grid-cols-2 gap-6 p-4">
                @csrf
                <div>
                    <label class="text font-bold uppercase text-[12px] block text-red-800" for="nome">Nome</label>
                    <input class="w-fit bg-transparent border border-2 border-red-800 rounded font-bold" type="text"
                        name="nome" placeholder="nome" required>
                </div>
                <div>
                    <label class="text font-bold uppercase text-[12px] block text-red-800"
                        for="circulo">Circulo</label>
                    <input class="w-fit bg-transparent border border-2 border-red-800 rounded font-bold" type="number"
                        name="circulo" placeholder="circulo" required>
                </div>
                <div>
                    <label class="text font-bold uppercase text-[12px] block text-red-800" for="escola">Escola</label>
                    <input class="w-fit bg-transparent border border-2 border-red-800 rounded font-bold" type="text"
                        name="escola" placeholder="escola" required>
                </div>
                <div>
                    <label class="text font-bold uppercase text-[12px] block text-red-800"
                        for="execucao">Execucao</label>
                    <input class="w-fit bg-transparent border border-2 border-red-800 rounded font-bold" type="text"
                        name="execucao" placeholder="execucao" required>
                </div>
                <div>
                    <label class="text font-bold uppercase text-[12px] block text-red-800"
                        for="alcance">Alcance</label>
                    <input class="w-fit bg-transparent border border-2 border-red-800 rounded font-bold" type="text"
                        name="alcance" placeholder="alcance" required>
                </div>
                <div>
                    <label class="text font-bold uppercase text-[12px] block text-red-800" for="alvo">Alvo</label>
                    <input class="w-fit bg-transparent border border-2 border-red-800 rounded font-bold" type="text"
                        name="alvo" placeholder="alvo" required>
                </div>
                <div>
                    <label class="text font-bold uppercase text-[12px] block text-red-800"
                        for="duracao">Duracao</label>
                    <input class="w-fit bg-transparent border border-2 border-red-800 rounded font-bold" type="text"
                        name="duracao" placeholder="duracao" required>
                </div>
                <div>
                    <label class="text font-bold uppercase text-[12px] block text-red-800"
                        for="resistencia">Resistencia</label>
                    <input class="w-fit bg-transparent border border-2 border-red-800 rounded font-bold" type="text"
                        name="resistencia" placeholder="resistencia" required>
                </div>
                <div>
                    <label class="text font-bold uppercase text-[12px] block text-red-800"
                        for="descricao">Descricao</label>
                    <textarea class="w-full p-2 bg-transparent border-2 border-dashed border-red-900/30 rounded focus:outline-none"
                        rows="10" cols="20" name="descricao" placeholder="melhorias de magia, etc"></textarea>
                </div>

                <button
                    class=" bg-red-900 h-fit w-full text-white px-3 py-1 rounded font-bold hover:bg-red-800 transition"
                    type="submit">Criar Magia</button>
            </form>
        </div>
    </div>
</body>

</html>
