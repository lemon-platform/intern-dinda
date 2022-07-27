@extends('layout.admin-book')

@section('content')
    <div class="flex gap-4 items-center">
        <h1 class="text-4xl font-bold">Book List</h1>
        <a class="h-8 px-6 rounded bg-blue-600 text-white font-medium items-center inline-flex" href="/admin/buku/create">Add New Book</a>
    </div>
    @if (session()->has('status'))
        <div class="flex py-3 px-6 flex items-center justify-center bg-green-100 text-green-700 mt-3">
            {{ session('status') }}
        </div>
    @endif
    <div class="grid gap-2 mt-4">
        <div class="grid grid-cols-3 gap-2">
            <div class="bg-gray-100 p-2">Judul</div>
            <div class="bg-gray-100 p-2">Genre</div>
            <div class="bg-gray-100 p-2">Stock</div>
        </div>
        @foreach ($books as $book)
            <div class="grid grid-cols-3 gap-2 hover:bg-gray-100">
                <div class="px-2">
                    <a href="/admin/buku/{{ $book->id }}" class="underline text-blue-600 font-medium">{{ $book->title }}</a>
                </div>
                <div class="px-2">{{ $book->genre }}</div>
                <div class="text-right px-2">{{ $book->stock }}</div>
            </div>
        @endforeach
    </div>
@endsection
