<?php

namespace App\Http\Controllers;

use App\Models\Borrow;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function viewDashboard()
    {
        $data_peminjam = Borrow::query()
            ->select('user_id', 'book_id', 'amount', 'created_at')
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
