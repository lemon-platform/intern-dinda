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
<body class="p-6 max-w-[600px] mx-auto">
    <div class="p-6 bg-gray-100 border">
        <h1 class="text-4xl">Selamat datang di perpus online</h1>
    </div>

    <div class="mt-12">
        <p>Saya adalah</p>

        <div class="grid grid-cols-2 gap-3 mt-3">
            <a class="flex items-end h-32 p-2 bg-green-100 border rounded" href="">Peminjam</a>
            <a class="flex items-end h-32 p-2 bg-blue-100 border rounded" href="">Pemilik</a>
            <a class="flex items-end h-32 p-2 bg-gray-100 border rounded" href="">Admin</a>
        </div>
    </div>
</body>
</html>
