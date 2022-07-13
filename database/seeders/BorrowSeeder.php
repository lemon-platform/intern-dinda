<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BorrowSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('borrows')->truncate();

        $borrowers = User::query()
            ->get();

        foreach ($borrowers as $borrower) {
            $book = Book::query()
                ->inRandomOrder()
                ->first();

            $borrower->borrow()->attach($book, [
                'amount' => 1
            ]);
        }
    }
}
