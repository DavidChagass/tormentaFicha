<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="{{ asset('IconTormenta20.ico') }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Login</title>
</head>

<body>
    <div class=" bg-red-950 grid h-screen content-center place-items-center">

        <form
            class="flex flex-col gap-4 bg-[#f4ebd0] shadow-2xl border-2 border-red-800 grid content-center place-items-center rounded-lg shadow-2xl w-96 h-60 content-evenly "
            action="{{ route('login') }}" method="POST">
            <h2 class="text-2xl font-bold text-center text-gray-950">Login</h2>
            @csrf
            <div>

                <input
                    class="w-60 rounded-md px-4 py-2 focus:outline-none focus:ring-2 border border-red-700 focus:ring-inset focus:ring-transparent bg-[#f4ebd0]  placeholder:text-gray-700 text-gray-950"
                    type="text" name="name" placeholder="Nome" required>
            </div>
            <div>

                <input
                    class="w-60 rounded-md px-4 py-2 focus:outline-none focus:ring-2 border border-red-700 focus:ring-inset focus:ring-transparent bg-[#f4ebd0]  placeholder:text-gray-700 text-gray-950"
                    type="password" name="password" placeholder="Senha" required>
            </div>
            <button class=" rounded-md bg-red-800 w-60 py-2 text-sm font-medium text-white text-center hover:bg-red-900"
                type="submit">Entrar</button>
        </form>

    </div>
</body>

</html>
