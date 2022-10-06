<?php

namespace Database\Seeders;
use DB;
use App\Models\Borrow;
use App\Models\User;
use App\Models\Book;
use Illuminate\Database\Seeder;

class BorrowSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        //DB::table('borrows')->truncate();

        $librarian = User::findOrFail(2);
        $borrow = Borrow::all();

        $librarian->managedRequests()->saveMany($borrow);
        $librarian->managedRequests()->saveMany($borrow);

    }
}
