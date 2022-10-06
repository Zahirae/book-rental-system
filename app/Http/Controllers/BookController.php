<?php

namespace App\Http\Controllers;
use App\Models\Book;
use App\Models\Genre;
use App\Http\Requests\BookFormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{
    /*
    public function __construct()
    {
        $this->authorizeResource(Book::class, 'book');
    }
    */

    public function index()
    {
        $books = Book::all();

        return view('books/listBooks', [
            'books' => $books,
        ]);
    }

    public function create()
    {
      /*return view('books/create');*/

      $genres = Genre::all();

        return view('books/create', [
            'genres' => $genres
        ]);
    }

    public function show(Book $book)
    {
        return view('books/bookDataSheet', [
            'book' => $book,
        ]);
    }

    public function store(BookFormRequest $request)
    {
        $validated_data = $request->validated();
        $book = Book::create($validated_data);
        $book->genres()->sync($validated_data['genres'] ?? []);
        return redirect()->route('books.show', $book);
    }

    public function edit($id)
    {
        $book = Book::findOrFail($id);
        $genres = Genre::all();
        return view('books/editBook', [
            'book' => $book,
            'genres' => $genres
        ]);
    }

    public function update(BookFormRequest $request, $id) {
        $book = Book::findOrFail($id);
        $validated_data = $request->validated();
        $book->update($validated_data);
        $book->genres()->sync($validated_data['genres'] ?? []);
        return redirect()->route('books.show', $book);
    }

    public function destroy(Book $book)
    {
       // $book = Book::findOrFail($id);
        $book->delete();
        return redirect()->route('books.index');
    }
}
