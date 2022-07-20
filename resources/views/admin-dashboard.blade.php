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
        <div class="text-2xl">Statistik Peminjam</div>
        <form class="ml-auto flex items-center gap-3 bg-slate-300 px-3 py-2 border shadow-inset rounded" action="">
            <input type="text" class="border h-10 px-3" name="nama" value="{{ request()->query('nama') }}" placeholder="nama" autofocus>
            <input type="text" class="border h-10 px-3" name="buku" value="{{ request()->query('buku') }}" placeholder="buku">
            <button type="submit" class="bg-slate-100 px-6 border shadow rounded text-sm font-medium h-10">Cari</button>
        </form>
        <form class="ml-6" action="/logout" method="POST">
            @csrf
            <button type="submit" class="bg-red-600 px-6 border shadow rounded text-sm font-medium h-10 text-white">Logout</button>
        </form>
    </div>

    <div class="mt-6">
        <table class="border-collapse table-auto w-full text-sm">
            <thead>
                <tr>
                    <th class="border-b dark:border-slate-600 font-medium p-4 pl-8 pt-0 pb-3 text-slate-400 dark:text-slate-200 text-left">Nama</th>
                    <th class="border-b dark:border-slate-600 font-medium p-4 pt-0 pb-3 text-slate-400 dark:text-slate-200 text-left">Buku</th>
                    <th class="border-b dark:border-slate-600 font-medium p-4 pt-0 pb-3 text-slate-400 dark:text-slate-200 text-right">Jumlah</th>
                    <th class="border-b dark:border-slate-600 font-medium p-4 pt-0 pb-3 text-slate-400 dark:text-slate-200 text-right">Tanggal Pinjam</th>
                    <th class="border-b dark:border-slate-600 font-medium p-4 pr-8 pt-0 pb-3 text-slate-400 dark:text-slate-200 text-right">Tanggal Kembali</th>
                </tr>
            </thead>
            <tbody class="bg-white dark:bg-slate-800">
                @foreach ($data_peminjam as $peminjam)
                    <tr>
                        <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">{{ $peminjam['nama'] }}</td>
                        <td class="border-b border-slate-100 dark:border-slate-700 p-4 text-slate-500 dark:text-slate-400">{{ $peminjam['buku'] }}</td>
                        <td class="border-b border-slate-100 dark:border-slate-700 p-4 text-slate-500 dark:text-slate-400 text-right">{{ $peminjam['jumlah'] }}</td>
                        <td class="border-b border-slate-100 dark:border-slate-700 p-4 text-slate-500 dark:text-slate-400 text-right">{{ $peminjam['tanggal_pinjam'] }}</td>
                        <td class="border-b border-slate-100 dark:border-slate-700 p-4 pr-8 text-slate-500 dark:text-slate-400 text-right">{{ $peminjam['tanggal_kembali'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
