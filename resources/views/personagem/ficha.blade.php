<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ficha Tormenta 20</title>
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Crimson+Pro:wght@400;700&display=swap');

        body {
            background-color: #1a0a0a;
            font-family: 'Crimson Pro', serif;
        }

        input:focus {
            outline: none;
        }

        .pdf-input {
            background: transparent !important;
            border: none !important;
            border-bottom: 1px solid #656668 !important;
            border-radius: 0 !important;
            padding: 2px 5px !important;
        }

        .pdf-input:focus {
            outline: none !important;
            border-bottom: 2px solid #b12d2d !important;
            box-shadow: none !important;
            background: rgba(39, 39, 39, 0.5) !important;
        }

        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            /* display: none; <- Crashes Chrome on hover */
            -webkit-appearance: none;
            margin: 0;
            /* <-- Apparently some margin are still there even though it's hidden */
        }

        ::-webkit-scrollbar {
            width: 5px;
        }

        /* Track */
        ::-webkit-scrollbar-track {
            background: transparent;
        }

        /* Handle */
        ::-webkit-scrollbar-thumb {
            background: #888;
        }

        /* Handle on hover */
        ::-webkit-scrollbar-thumb:hover {
            background: #555;
        }

        input[type=number] {
            -moz-appearance: textfield;
            /* Firefox */
        }
    </style>
    @livewireStyles

</head>

<body class="p-4">

    <div @yield('content')
        class="max-w-5xl mx-auto bg-[#fdf6e3] text-gray-800 p-8 shadow-2xl rounded-sm border-2 border-[#d1c4ae] relative">

        @livewire('ficha-personagem', ['id' => $personagem->id])
    </div>

    @livewireScripts

</body>

</html>
