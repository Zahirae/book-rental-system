<?php

namespace Database\Seeders;

use DB;
use Hash;

use App\Models\Book;
use App\Models\Borrow;
use App\Models\User;
use App\Models\Genre;
use Illuminate\Database\Seeder;



class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('books')->truncate();
        DB::table('book_genre')->truncate();

        $genres = Genre::all();


        Book::factory()->count(10)->create()
        ->each(function ($book) use ($genres) {
            for ($i = 0; $i < random_int(1, 4); $i++) {
                $book->genres()->toggle($genres[random_int(0, 4)]);
            }
        });

    }
}
