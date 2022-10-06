@extends('layout.base')

@section('content')
    <!-- filters -->

    <!-- Book list -->
    <div class="container mt-5 mb-5">
        <h1>Genre : {{$genre['name']}}</h1>
        <ul class="list-group">
            @foreach ($books as $book)
            <a href="{{ route('books.show', $book['id']) }}" class="btn btn-primary">
            <li class="list-group-item" aria-current="true">
                <div class="row">
                    <div class="col">
                      <p>Title :</p>  {{ $book['title'] }}
                    </div>
                    <div class="col">
                      <p>Authors :</p>  {{ $book['authors'] }}
                    </div>
                    <div class="col">
                        {{ $book['description'] }}
                    </div>
                    <div class="col">
                        <p>Date of release :</p>    {{ $book['released_at'] }}
                    </div>
                </div>
            </li> </a>
            @endforeach
          </ul>
    </div>
@endsection
