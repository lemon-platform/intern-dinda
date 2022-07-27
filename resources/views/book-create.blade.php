@extends('layout.admin-book')

@section('content')
    <div class="flex gap-4 items-center">
        <h1 class="text-4xl font-bold">Book Create</h1>
        <a class="h-8 px-6 rounded bg-gray-100 font-medium items-center inline-flex ml-auto" href="/admin/buku">Back</a>
    </div>
    <div class="grid gap-6 mt-4 grid-cols-3">
        <div></div>
        <form action="/admin/buku/create" method="POST">
            @csrf
            <div>Add Book</div>
            <div class="mt-6">
                <label class="text-2xl block" for="title">Title</label>
                <input id="title" type="text" name="title" value="{{ old('title', '') }}" class="border px-3 py-2 w-full mt-2 text-4xl" required>
                @error('title')
                    <div class="mt-2 text-red-600 text-lg">{{ $message }}</div>
                @enderror
            </div>
            <div class="mt-6">
                <label class="text-2xl block" for="genre">Genre</label>
                <select class="border px-3 py-2 w-full mt-2 text-4xl" name="genre" id="genre" required>
                    <option value="">Pilih Genre</option>
                    @foreach (config('custom.genre') as $genre)
                        <option value="{{ $genre }}" @selected(old('genre') === $genre)>{{ $genre }}</option>
                    @endforeach
                </select>
                @error('genre')
                    <div class="mt-2 text-red-600 text-lg">{{ $message }}</div>
                @enderror
            </div>
            <div class="mt-6">
                <label class="text-2xl block" for="stock">Stock</label>
                <input min="0" id="stock" type="number" name="stock" value="{{ old('stock', 0) }}" class="border px-3 py-2 w-full mt-2 text-4xl">
                @error('stock')
                    <div class="mt-2 text-red-600 text-lg">{{ $message }}</div>
                @enderror
            </div>
            <div class="mt-6">
                @if (session()->has('status'))
                    <div class="flex py-3 px-6 flex items-center justify-center bg-green-100 text-green-700">
                        {{ session('status') }}
                    </div>
                @endif
                <button type="submit" class="h-12 bg-blue-600 px-6 rounded text-2xl text-white mt-6">Tambah</button>
            </div>
        </form>
    </div>
@endsection
