@extends('layout.base')

@section('content')
    <!-- filters -->

    <!-- Book list -->
    <div class="container mt-5 mb-5">
        <h1>PENDING Requests</h1>
        <ul class="list-group">
            @foreach ($PENDINGrequests as $PENDINGrequest)
            @php $book = App\Models\Book::findOrFail($PENDINGrequest['books_id']); @endphp
            <a href="{{ route('borrows.show', $PENDINGrequest['id']) }}">
                <li class="list-group-item" aria-current="true">
                    <div class="row">
                        <div class="col">
                        <p>Book Title :</p>{{ $book['title'] }}
                        </div>
                        <div class="col">
                            <p>Author :</p>{{ $book['authors'] }}
                        </div>
                        <div class="col">
                            <p>Deadline :</p>{{ $PENDINGrequest['deadline'] }}
                        </div>
                        <div class="col">
                            <p>date of rental :</p>{{ $PENDINGrequest['request_processed_at'] }}
                        </div>
                    </div>
                </li>
            </a>
            @endforeach
          </ul>
    </div>
    <div class="container mt-5 mb-5">
        <h1>ACCEPTED Requests In Time</h1>
        <ul class="list-group">
            @foreach ($ACCEPTEDrequestsInTime as $ACCEPTEDrequestInTime)
            @php $book = App\Models\Book::findOrFail($ACCEPTEDrequestInTime['books_id']); @endphp
            <a href="{{ route('borrows.show', $PENDINGrequest['id']) }}">
                <li class="list-group-item" aria-current="true">
                    <div class="row">
                        <div class="col">
                            <p>Book Title :</p>{{ $book['title'] }}
                        </div>
                        <div class="col">
                            <p>Author :</p>{{ $book['authors'] }}
                            </div>
                        <div class="col">
                            <p>Deadline :</p>{{ $PENDINGrequest['deadline'] }}
                        </div>
                        <div class="col">
                            <p>date of rental :</p>{{ $ACCEPTEDrequestInTime['request_processed_at'] }}
                        </div>
                    </div>
                </li>
            </a>
            @endforeach
          </ul>
    </div>

    <div class="container mt-5 mb-5">
        <h1>ACCEPTED requests Late</h1>
        <ul class="list-group">
            @foreach ($ACCEPTEDrequestsLate as $ACCEPTEDrequestLate)
            @php $book = App\Models\Book::findOrFail($ACCEPTEDrequestLate['books_id']); @endphp
            <a href="{{ route('borrows.show', $PENDINGrequest['id']) }}">
                <li class="list-group-item" aria-current="true">
                    <div class="row">
                        <div class="col">
                            <p>Book Title :</p>{{ $book['title'] }}
                        </div>
                        <div class="col">
                            <p>Author :</p>{{ $book['authors'] }}
                            </div>
                        <div class="col">
                            <p>Deadline :</p>{{ $PENDINGrequest['deadline'] }}
                        </div>
                        <div class="col">
                            <p>date of rental :</p>{{ $ACCEPTEDrequestLate['request_processed_at'] }}
                        </div>
                    </div>
                </li>
            </a>
            @endforeach
          </ul>
    </div>

    <div class="container mt-5 mb-5">
        <h1>REJECTED Requests</h1>
        <ul class="list-group">
            @foreach ($REJECTEDrequests as $REJECTEDrequest)
            @php $book = App\Models\Book::findOrFail($REJECTEDrequest['books_id']); @endphp
            <a href="{{ route('borrows.show', $PENDINGrequest['id']) }}">
                <li class="list-group-item" aria-current="true">
                    <div class="row">
                        <div class="col">
                            <p>Book Title :</p>{{ $book['title'] }}
                        </div>
                        <div class="col">
                            <p>Author :</p>{{ $book['authors'] }}
                            </div>
                        <div class="col">
                            <p>Deadline :</p>{{ $PENDINGrequest['deadline'] }}
                        </div>
                        <div class="col">
                            <p>date of rental :</p>{{ $REJECTEDrequest['request_processed_at'] }}
                        </div>
                    </div>
                </li>
            </a>
            @endforeach
          </ul>
    </div>

    <div class="container mt-5 mb-5">
        <h1>RETURNED Requests</h1>
        <ul class="list-group">
            @foreach ($RETURNEDrequests as $RETURNEDrequest)
            @php $book = App\Models\Book::findOrFail($RETURNEDrequest['books_id']); @endphp
            <a href="{{ route('borrows.show', $PENDINGrequest['id']) }}">
                <li class="list-group-item" aria-current="true">
                    <div class="row">
                        <div class="col">
                            <p>Book Title :</p>{{ $book['title'] }}
                        </div>
                        <div class="col">
                            <p>Author :</p>{{ $book['authors'] }}
                            </div>
                        <div class="col">
                            <p>Deadline :</p>{{ $PENDINGrequest['deadline'] }}
                        </div>
                        <div class="col">
                            <p>date of rental :</p>{{ $RETURNEDrequest['request_processed_at'] }}
                        </div>
                    </div>
                </li>
            </a>
            @endforeach
          </ul>
    </div>
@endsection
