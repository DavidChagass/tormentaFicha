<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>

    <title>Criar Item</title>
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
            <form action="{{ route('item.store',['id' =>  $id, 'tab'=> $tab]) }}" method="POST" class="grid gap-6 p-4">
                @csrf
                <div>
                    <label class="text font-bold uppercase text-[12px] block text-red-800">Nome</label>
                    <input type="text" name="nome" placeholder="Nome"
                        class="w-fit bg-transparent border border-2 border-red-800 rounded font-bold">
                </div>
                <div>
                    <label class="text font-bold uppercase text-[12px] block text-red-800"
                        for="quantidade">Quantidade</label>
                    <input type="number" name="quantidade" placeholder="quantidade" required
                        class="w-fit bg-transparent border border-2 border-red-800 rounded font-bold w-fit">
                </div>

                <div class="w-fit h-fit">
                    <label class="text font-bold uppercase text-[12px] block text-red-800" for="peso">Peso</label>
                    <input type="number" step="0.1" name="peso" placeholder="peso" required
                        class="w-fit bg-transparent border border-2 border-red-800 rounded font-bold">
                </div>
                <div class="h-fit">
                    <label class="text font-bold uppercase text-[12px] block text-red-800"
                        for="descricao">Descricao</label>
                    <textarea rows="5" cols="20" name="descricao" placeholder="itens em geral, dinheiro"
                        class="w-full p-2 bg-transparent border-2 border-dashed border-red-900/30 rounded focus:outline-none"></textarea>
                </div>


                <button class="bg-red-900 text-white px-3 py-1 rounded font-bold hover:bg-red-800 transition"
                    type="submit">criar item</button>
            </form>
        </div>
</body>

</html>
