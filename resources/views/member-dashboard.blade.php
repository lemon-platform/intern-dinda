<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="p-6 max-w-7xl mx-auto">
    <div class="flex items-center">
        <div class="text-2xl">Selamat datang</div>
        <form action="/logout" method="POST">
            @csrf
            <button>Logout</button>
        </form>
    </div>

    <div class="mt-6">
        pilih buku yang kamu suka
    </div>
</body>
</html>
