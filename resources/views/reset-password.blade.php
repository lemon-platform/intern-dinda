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
        <h1 class="text-4xl">Reset Password</h1>
    </div>

    <div class="mt-12">
        <form action="/reset-password" method="POST" class="grid gap-3">
            @csrf
            <input type="hidden" name="token" value="{{ request()->token }}">
            <input type="hidden" name="email" value="{{ request()->email }}">
            @error('email')
                <div class="mt-1 text-white bg-red-700 h-12 flex items-center justify-center">{{ $message }}</div>
            @enderror
            <div>
                <label class="text-sm font-medium block" for="password">New Password</label>
                <input class="h-10 px-3 border w-full mt-1" id="password" type="password" name="password" autocomplete="new-password">
                @error('password')
                    <div class="mt-1 text-red-700">{{ $message }}</div>
                @enderror
            </div>
            <div>
                <label class="text-sm font-medium block" for="password-confirmation">Confirm New Password</label>
                <input class="h-10 px-3 border w-full mt-1" id="password-confirmation" type="password" name="password_confirmation" autocomplete="new-password">
                @error('password_confirmation')
                    <div class="mt-1 text-red-700">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="bg-slate-200 h-12 rounded font-medium">Update Password</button>
        </form>
    </div>
</body>
</html>
