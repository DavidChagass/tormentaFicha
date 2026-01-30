<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Editar Ataque</title>
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
            <form action="{{ route('ataque.update', $ataque->id) }}" method="POST" class="grid gap-6 p-4">
                @csrf
                @method('PUT')
                <div>
                    <label class="text font-bold uppercase text-[12px] block text-red-800">Nome</label>
                    <input type="text" name="nome" placeholder="Nome" value="{{ $ataque->nome }}"
                        class="w-fit bg-transparent border border-2 border-red-800 rounded font-bold">
                </div>
                <div class="h-fit">
                    <label class="text font-bold uppercase text-[12px] block text-red-800"
                        for="descricao">Descricao</label>
                    <textarea rows="5" cols="20" name="descricao" placeholder="ataques, habilidades, passivas de combate"
                        class="w-full p-2 bg-transparent border-2 border-dashed border-red-900/30 rounded focus:outline-none">{{ $ataque->descricao }}</textarea>
                </div>


                <button class="bg-red-900 text-white px-3 py-1 rounded font-bold hover:bg-red-800 transition"
                    type="submit">Editar Ataque/habilidade</button>
            </form>
        </div>

        </form>
        <form class="content-center justify-items-center justify-self-center w-fit ml-auto mr-auto"
            action="{{ route('ataque.delete', $ataque->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button class=" bg-red-900 text-white px-3 py-1 rounded font-bold hover:bg-red-800 transition"
                type="submit">DELETAR ATAQUE/HABILIDADE</button>
        </form>
    </div>

</body>

</html>
