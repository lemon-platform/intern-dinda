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
    <div>Statistik Peminjam</div>

    <div class="mt-6">
        <table class="table-auto w-full">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Buku</th>
                    <th>Jumlah</th>
                    <th>Tanggal Pinjam</th>
                    <th>Tanggal Kembali</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data_peminjam as $peminjam)
                    <tr>
                        <td>{{ $peminjam['nama'] }}</td>
                        <td>{{ $peminjam['buku'] }}</td>
                        <td class="text-right">{{ $peminjam['jumlah'] }}</td>
                        <td class="text-right">{{ $peminjam['tanggal_pinjam'] }}</td>
                        <td class="text-right">{{ $peminjam['tanggal_kembali'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
