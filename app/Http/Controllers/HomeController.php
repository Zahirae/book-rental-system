<?php

namespace App\Http\Controllers;
use App\Models\Book;
use App\Models\Genre;
use App\Models\User;
use App\Models\Borrow;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $books = Book::all();
        $genres = Genre::all();
        $users = User::all();
        $borrows = Borrow::all();

        return view('index',['books'=> $books,
        'genres'=> $genres,'users'=> $users,'borrows'=> $borrows,]
    );
    }

    public function show(Genre $genre){
        $books = $genre->books;
        return view('listByGenre',['genre'=> $genre,'books'=> $books,]);
    }

    public function activeBorrow(User $user){
        //$borrows = $user->readerBorrows;
        $PENDINGrequests = $user->readerBorrows()->where('status','PENDING')->get();
        $REJECTEDrequests = $user->readerBorrows()->where('status','REJECTED')->get();
        $ACCEPTEDrequestsInTime = $user->readerBorrows()->where('status','ACCEPTED')->get();
        $ACCEPTEDrequestsLate = $user->readerBorrows()->where('status','ACCEPTED')->get();
        $RETURNEDrequests = $user->readerBorrows()->where('status','RETURNED')->get();
        //dd($PENDINGrequests);
        return view('borrows/list', [
            'PENDINGrequests' => $PENDINGrequests,
            'ACCEPTEDrequestsInTime' => $ACCEPTEDrequestsInTime,
            'ACCEPTEDrequestsLate' => $ACCEPTEDrequestsLate,
            'REJECTEDrequests' => $REJECTEDrequests,
            'RETURNEDrequests' => $RETURNEDrequests,
        ]);
    }

    public function filter(Request $request){
        //CONTAINS
        $books = Book::where('title','like','%' . $request->input('search') . '%')->orWhere('authors','like','%' . $request->input('search') . '%')->get();
        return view('books/listBooks', [
            'books' => $books,
        ]);
    }
}
