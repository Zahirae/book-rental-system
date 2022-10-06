@extends('layout.base')

@section('content')
    <!-- filters -->

    <!-- Book list -->
    <div class="container mt-5 mb-5">
        @php $book = App\Models\Book::findOrFail($borrow['books_id']); @endphp
        <ul class="list-group mb-5">
            <li class="list-group-item" aria-current="true">
                <div class="row">
                    <div class="col">
                        <p>Book Title :</p>{{ $book['title'] }}
                        </div>
                        <div class="col">
                            <p>Author :</p>{{ $book['authors'] }}
                        </div>
                    <div class="col">
                        <p>Status: {{ $borrow['status'] }}</p>
                    </div>
                    <div class="col">
                        <p>Request processed at :</p>{{ $borrow['request_processed_at'] }}
                    </div>
                    <div class="col">
                        <p>Request managed by :</p>{{ $borrow['request_managed_by'] }}
                    </div>
                    <div class="col">
                        <p>Deadline :</p>{{ $borrow['deadline'] }}
                    </div>
                    <div class="col">
                        <p>Returned at :</p>{{ $borrow['returned_at'] }}
                    </div>
                    <div class="col">
                        <p>Return managed by :</p>{{ $borrow['return_managed_by'] }}
                    </div>
                    @if (Auth::check())
                        @php $user = Auth::user();@endphp
                        @if($user['is_librarian'])
                            <div class="col">
                                <form action="{{ route('borrows.destroy', $borrow['id']) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"  class="btn btn-danger">Delete</button>
                                </form>
                            </div>
                </div>
            </li>
          </ul>
          <form action="{{ route('borrows.update', $borrow->id) }}" method="POST" class="mt-5">
            @method('put')
            @csrf
            <div class="form-group">

                <label for="style" class="form-label">status</label>
                    <select class="form-select" aria-label="Default select example"
                    name="status"
                    type="text"
                    class="form-control @error('style') is-invalid @enderror"
                    id="status"
                    placeholder="">
                        <option selected>ACCEPTED</option>
                        <option value="1">REJECTED</option>
                        <option value="2">RETURNED</option>
                    </select>
                    @error('status')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
                </div>
            <div class="form-group">
                <label for="deadline" class="form-label">deadline</label>
                <input
                name="deadline"
                type="date"
                class="form-control @error('deadline') is-invalid @enderror"
                id="deadline"
                placeholder=""
                value="{{ old('deadline', $borrow['deadline'])  }}">

            @error('deadline')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
            </div>
            <input type="hidden" id="user_id" name="user_id" value="">
            <button type="submit mb-5" class="btn btn-primary">save</button>
          </form>
                    @endif
                @endif
    </div>
@endsection
