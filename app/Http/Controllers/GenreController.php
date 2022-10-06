<?php

namespace App\Http\Controllers;
use App\Models\Genre;
use App\Http\Requests\GenreFormRequest;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    /*
    public function __construct()
    {
        $this->authorizeResource(Genre::class, 'genre');
    }
*/
    public function index()
    {
        $genres = Genre::all();
        return view('genres/list', [
            'genres' => $genres,
        ]);
    }

    public function create()
    {
      return view('genres/create');
    }

    public function show(Genre $genre)
    {

    }

    public function store(GenreFormRequest $request)
    {
        $validate_data = $request->validated();
        $id = Genre::create($validate_data);
        return redirect()->route('genres.index');
    }

    public function edit(Genre $genre)
    {
        return view('genres/edit', [
            'genre' => $genre
        ]);
    }

    public function update(GenreFormRequest $request, Genre $genre) {
        $validate_data = $request->validated();
        $genre->update($validate_data);
        return redirect()->route('genres.index');
    }

    public function destroy(Genre $genre)
    {
        $genre->delete();
        return redirect()->route('genres.index');
    }
}
