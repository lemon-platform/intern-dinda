@extends('layout.admin-book')

@section('content')
    <div class="flex gap-4 items-center">
        <h1 class="text-4xl font-bold">Book Update</h1>
        <a class="h-8 px-6 rounded bg-gray-100 font-medium items-center inline-flex ml-auto" href="/admin/buku">Back</a>
    </div>
    <div class="grid gap-6 mt-4 grid-cols-3">
        <div></div>
        <form action="/admin/buku/{{ $book->id }}/edit" method="POST">
            @csrf
            <div>Update Book</div>
            <div class="mt-6">
                <label class="text-2xl block" for="title">Title</label>
                <input id="title" type="text" name="title" value="{{ old('title', $book->title) }}" class="border px-3 py-2 w-full mt-2 text-4xl" required>
                @error('title')
                    <div class="mt-2 text-red-600 text-lg">{{ $message }}</div>
                @enderror
            </div>
            <div class="mt-6">
                <label class="text-2xl block" for="genre">Genre</label>
                <select class="border px-3 py-2 w-full mt-2 text-4xl" name="genre" id="genre" required>
                    <option value="">Pilih Genre</option>
                    @foreach (config('custom.genre') as $genre)
                        <option value="{{ $genre }}" @selected(old('genre', $book->genre) === $genre)>{{ $genre }}</option>
                    @endforeach
                </select>
                @error('genre')
                    <div class="mt-2 text-red-600 text-lg">{{ $message }}</div>
                @enderror
            </div>
            <div class="mt-6">
                <label class="text-2xl block" for="stock">Stock</label>
                <input min="0" id="stock" type="number" name="stock" value="{{ old('stock', $book->stock) }}" class="border px-3 py-2 w-full mt-2 text-4xl">
                @error('stock')
                    <div class="mt-2 text-red-600 text-lg">{{ $message }}</div>
                @enderror
            </div>
            <div class="mt-6">
                <button type="submit" class="h-12 bg-blue-600 px-6 rounded text-2xl text-white mt-6">Update</button>
            </div>
        </form>
    </div>
@endsection
