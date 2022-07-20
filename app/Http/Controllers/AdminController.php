<?php

namespace App\Http\Controllers;

use App\Models\Borrow;
use Barryvdh\Debugbar\Facades\Debugbar;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function viewDashboard(Request $request)
    {
        $data_peminjam = Borrow::query()
            ->select('user_id', 'book_id', 'amount', 'created_at')
            ->whereHas('user', function(Builder $query) use ($request) {
                $query->where('name', 'like', '%' . $request->input('nama') . '%');
            })
            ->whereHas('book', function(Builder $query) use ($request) {
                $query->where('title', 'like', '%' . $request->input('buku') . '%');
            })
            ->with([
                'user:id,name',
                'book:id,title'
            ])
            ->get()
            ->map(fn($borrow) => [
                'nama' => $borrow->user->name,
                'buku' => $borrow->book->title,
                'jumlah' => $borrow->amount,
                'tanggal_pinjam' => $borrow->created_at->format('d M Y'),
                'tanggal_kembali' => $borrow->created_at->addWeeks(2)->format('d M Y'),
            ]);

        return view('admin-dashboard', [
            'data_peminjam' => $data_peminjam,
        ]);
    }
}
