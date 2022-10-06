@extends('layout.base')

@section('content')
    <!-- filters -->

    <!-- Book list -->
    <div class="container mt-5 mb-5">
        <div class="col-sm-3 my-3">
            <div class="card h-75">
                <a href="{{ route('genres.create') }}" class="btn btn-secondary h-100 pt-5">add genre</a>
            </div>
          </div>
        <ul class="list-group">
            @foreach ($genres as $genre)
            <li class="list-group-item" aria-current="true">
                <div class="row">
                    <div class="col">
                      <p>Name :</p>  {{ $genre['name'] }}
                    </div>
                    <div class="col">
                      <p>Style :</p>  {{ $genre['style'] }}
                    </div>
                    <div class="col">
                        <a href="{{ route('genres.edit', $genre['id']) }}" class="btn btn-primary">Edit</a>
                    </div>
                    <div class="col">
                        <form action="{{ route('genres.destroy', $genre) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit"  class="btn btn-danger">Delete</button>
                          </form>
                    </div>
                </div>
            </li>
            @endforeach
          </ul>

    </div>
@endsection
