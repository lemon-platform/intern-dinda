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
        <h1 class="text-4xl">Register</h1>
    </div>

    <div class="mt-12">
        <form action="/register" method="POST" class="grid gap-3">
            @csrf
            <div>
                <label class="text-sm font-medium block" for="nama">Nama</label>
                <input class="h-10 px-3 border w-full mt-1" id="nama" type="text" name="nama" value="{{ old('nama') }}" autocomplete="name" autofocus required>
                @error('nama')
                    <div class="mt-1 text-red-700">{{ $message }}</div>
                @enderror
            </div>
            <div>
                <label class="text-sm font-medium block" for="email">Email</label>
                <input class="h-10 px-3 border w-full mt-1" id="email" type="email" name="email" value="{{ old('email') }}" autocomplete="email username" required>
                @error('email')
                    <div class="mt-1 text-red-700">{{ $message }}</div>
                @enderror
            </div>
            <div>
                <label class="text-sm font-medium block" for="password">Password</label>
                <input class="h-10 px-3 border w-full mt-1" id="password" type="password" name="password" autocomplete="new-password" required>
                @error('password')
                    <div class="mt-1 text-red-700">{{ $message }}</div>
                @enderror
            </div>
            <div>
                <label class="text-sm font-medium block" for="password-confirmation">Konfirmasi Password</label>
                <input class="h-10 px-3 border w-full mt-1" id="password-confirmation" type="password" name="password_confirmation" autocomplete="new-password" required>
                @error('password_confirmation')
                    <div class="mt-1 text-red-700">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="bg-slate-200 h-12 rounded font-medium">Register</button>
        </form>

        <div class="mt-12">
            <a href="/login" class="font-medium text-blue-600 underline">Balik ke halaman login</a>
        </div>
    </div>
</body>
</html>
