<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="icon" href="{{asset('IconTormenta20.ico')}}">
    <title>Welcome</title>
</head>

<body class="bg-[#f4ebd0]">
    <div class="grid    h-screen content-center place-items-center">
          <a class=" rounded-md bg-red-800 w-60 py-2 w-40 text-sm font-medium text-white text-center content-center"
        href="{{ route('login') }}">Login</a>
    </div>
  
</body>

</html>
