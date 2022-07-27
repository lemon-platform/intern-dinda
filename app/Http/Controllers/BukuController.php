<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    public function readAll()
    {
        return view('book-list', [
            'books' => Book::orderByDesc('id')->get()
        ]);
    }

    public function viewCreate()
    {
        return view('book-create');
    }

    public function create(Request $request)
    {
        $data = $request->validate([
            'title' => ['required'],
            'genre' => ['required'],
            'stock' => ['required','gt:0'],
        ]);

        $book = new Book();

        $book->create([
            'title' => $data['title'],
            'genre' => $data['genre'],
            'stock' => $data['stock'],
        ]);

        return redirect()->to('/admin/buku');
    }

    public function read(Request $request, int $id)
    {
        $book = Book::find($id);

        return view('book-detail', [
            'book' => $book
        ]);
    }

    public function viewUpdate(Request $request, int $id)
    {
        $book = Book::find($id);

        return view('book-update', [
            'book' => $book
        ]);
    }

    public function update(Request $request, int $id)
    {
        $data = $request->validate([
            'title' => ['required'],
            'genre' => ['required'],
            'stock' => ['required','gt:0'],
        ]);

        $book = Book::find($id);

        $book->update([
            'title' => $data['title'],
            'genre' => $data['genre'],
            'stock' => $data['stock'],
        ]);

        return redirect()
            ->to('/admin/buku/' . $id)
            ->with('status', 'Successfully updated book!');
    }

    public function delete(Request $request, int $id)
    {
        $book = Book::find($id);

        $book->delete();

        return redirect()
            ->to('/admin/buku')
            ->with('status', 'Successfully deleting book!');
    }
}
