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
    @if (session('error_banner'))
        <div class="w-full bg-red-700 text-white mb-12 text-center py-3">{{ session('error_banner') }}</div>
    @endif

    <div class="p-6 bg-gray-100 border">
        <h1 class="text-4xl">Forget Password</h1>
    </div>

    <div class="mt-12">
        <form action="/forget-password" method="POST" class="grid gap-3">
            @csrf
            <div>
                <label class="text-sm font-medium block" for="email">Email</label>
                <input class="h-10 px-3 border w-full mt-1" id="email" type="email" name="email" autocomplete="email username" autofocus>
                @error('email')
                    <div class="mt-1 text-red-700">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="bg-slate-200 h-12 rounded font-medium">Send Reset Link Password</button>
        </form>

        @if (session()->has('status'))
            <div class="bg-green-50 text-green-900 flex items-center justify-center mt-8 h-12 w-full">
                {{ session('status') }}
            </div>
        @endif

        <div class="mt-12 flex flex-col gap-2 items-start">
            <a href="/login" class="font-medium text-blue-600 underline">Balik ke login</a>
        </div>
    </div>
</body>
</html>
