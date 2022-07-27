@extends('layout.admin-book')

@section('content')
    <div class="flex gap-4 items-center">
        <h1 class="text-4xl font-bold">Book Detail</h1>
        <a class="h-8 px-6 rounded bg-blue-600 text-white font-medium items-center inline-flex" href="/admin/buku/{{ $book->id }}/edit">Edit</a>
        <button type="submit" form="form-delete" class="h-8 px-6 rounded bg-red-600 text-white font-medium items-center inline-flex" href="/admin/buku/{{ $book->id }}/delete">Delete</button>
        <a class="h-8 px-6 rounded bg-gray-100 font-medium items-center inline-flex ml-auto" href="/admin/buku">Back</a>
    </div>
    <div class="grid gap-6 mt-4 grid-cols-3">
        <div class="border aspect-[21/29] p-6 shadow bg-blue-50 flex items-end">
            <div class="text-6xl pt-3 border-t-4 font-light tracking-tight break-all border-blue-700">{{ $book->title }}</div>
        </div>
        <div>
            <div>Properties</div>
            <div class="mt-6">
                <div class="text-2xl">Title</div>
                <div class="text-4xl">{{ $book->title }}</div>
            </div>
            <div class="mt-6">
                <div class="text-2xl">Genre</div>
                <div class="text-4xl">{{ $book->genre }}</div>
            </div>
            <div class="mt-6">
                <div class="text-2xl">Stock</div>
                <div @class(['text-4xl', 'text-red-700' => $book->stock === 0])>{{ $book->stock === 0 ? 'Out of Stock' : $book->stock }}</div>
            </div>
            @if (session()->has('status'))
            <div class="mt-6">
                <div class="flex py-3 px-6 flex items-center justify-center bg-green-100 text-green-700">
                    {{ session('status') }}
                </div>
            </div>
            @endif
        </div>
    </div>
    <form id="form-delete" action="/admin/buku/{{ $book->id }}/delete" method="POST" onsubmit="if(!confirm('Delete this book?')) return false;">
        @csrf
    </form>
@endsection
