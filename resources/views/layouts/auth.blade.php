<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>@yield('title') - Page</title>
</head>
<body class="bg-gray-900">

    @if ($errors->any())

        <div class="w-full h-auto bg-red-600 text-white">
            <ul>
                @foreach ($errors->all() as $errors )
                    <li class="text-decoration-none">{{ $errors }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if (session('status'))
        <div class="w-full h-auto bg-green-600 text-white">
            {{ session('status') }}
        </div>
    @endif
    @yield('content')


</body>
</html>