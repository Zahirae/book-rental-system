@extends('layout.base')

@section('content')

<form class="d-flex mt-5 mb-5" action= "{{route('search')}}" method="POST"><!--   -->
    @csrf
    <input class="form-control me-2" type="search" name="search" id="search" placeholder="Search" aria-label="Search">
    <button class="btn btn-outline-success" type="submit">Search</button>
</form>
<table class="table table-bordered mt-5">
    <thead>
      <tr>
        <th scope="col">Number of users in the system</th>
        <th scope="col">Number of genres</th>
        <th scope="col">Number of books</th>
        <th scope="col">Number of active book rentals</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>{{$users->count()}}</td>
        <td>{{$genres->count()}}</td>
        <td>{{$books->count()}}</td>
        <td>{{$borrows->count()}}</td>
      </tr>
    </tbody>
  </table>

  <div class="container">
    <ul class="list-group mt-5 mb-5">
        @foreach ($genres as $genre)
           <li class="list-group-item list-group-item-danger">
               <a class="nav-link" href="{{ route('ListByGenre', $genre['id']) }}">{{$genre['name']}}</a>
            </li>
        @endforeach
      </ul>
  </div>
@endsection
