@extends('layout.base')

@section('content')
    <!-- filters -->

    <!-- Book list -->
    <div class="container mt-5 mb-5">
        <ul class="list-group">
            <li class="list-group-item" aria-current="true">
                <div class="row">
                    <div class="col-md-auto">
                        <img src="{{ $book['cover_image'] }}" height="200px" width="auto">
                    </div>
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
                        <p>Pges :</p>    {{ $book['pages'] }}
                    </div>
                    <div class="col">
                        <p>Date of release :</p>    {{ $book['released_at'] }}
                    </div>
                    <div class="col">
                        <p>Stock :</p>   {{ $book['in_stock'] }}
                    </div>
                   @if (Auth::check())
                        @php $user = Auth::user();@endphp
                        @if ($user['is_librarian'])
                            <div class="col">
                                <a href="{{ route('books.edit', $book['id']) }}" class="btn btn-primary">Edit</a>
                            </div>
                            <div class="col">
                                <form action="{{ route('books.destroy', $book['id']) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"  class="btn btn-danger">Delete</button>
                                    </form>
                            </div>
                        @else
                            <div class="col">
                                <form action="{{ route('borrows.store', $book['id']) }}" method="POST">
                                    @csrf
                                    <input type="hidden" id="books_id" name="books_id" value="{{$book['id']}}">
                                    <input type="hidden" id="status" name="status" value="PENDING">
                                    <button type="submit mb-5" class="btn btn-success">Borrow</button>
                                </form>
                            </div>
                        @endif
                   @endif

                </div>
            </li>
          </ul>
    </div>
@endsection
