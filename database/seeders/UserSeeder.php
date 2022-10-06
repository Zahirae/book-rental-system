<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
use Hash;
use App\Models\User;
use App\Models\Borrow;
use App\Models\Book;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $books = Book::all();
        DB::table('users')->truncate();
        DB::table('borrows')->truncate();

        User::create([
            'name' => 'reader',
            'email' => 'reader@brs.com',
            'password' => Hash::make('password'),
        ]);

        User::create([
            'name' => 'librarian',
            'email' => 'librarian@brs.com',
            'password' => Hash::make('password'),
            'is_librarian' => true
        ]);

        User::factory()->count(5)->create()
        ->each(function ($user)use($books){
            $user->readerBorrows()->createMany(
                Borrow::factory(3)->make()->toArray()
            )->each(function ($borrow)use($books){

                $borrow->books()->associate($books[random_int(0, 9)]);
                $borrow->save();
            });
        }
    );



    }
}
