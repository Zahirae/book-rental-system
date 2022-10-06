<?php

namespace Database\Seeders;
use DB;
use App\Models\Genre;
use Illuminate\Database\Seeder;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('book_genre')->truncate();
        DB::table('genres')->truncate();
        Genre::factory()->count(5)->create();
    }
}
