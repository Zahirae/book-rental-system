@extends('layout.base')

@section('content')
    <!-- filters -->

    <!-- Book list -->
    <div class="container mt-5 mb-5">
        <ul class="list-group">
            @foreach ($borrows as $borrow)
            <li class="list-group-item" aria-current="true">
                <div class="row">
                    <div class="col">
                        <p>Reader ID :</p>    {{ $borrow['reader_id'] }}
                    </div>
                    <div class="col">
                      <p>Deadline :</p>  {{ $borrow['deadline'] }}
                    </div>
                    <div class="col">
                      <p>Returned at :</p>  {{ $borrow['returned_at'] }}
                    </div>
                    <div class="col">
                        <p>Request processed at :</p>  {{ $borrow['request_processed_at'] }}
                    </div>
                    <div class="col">
                        <p>Status :</p>    {{ $borrow['status'] }}
                    </div>
                </div>
            </li>
            @endforeach
          </ul>
    </div>
@endsection
