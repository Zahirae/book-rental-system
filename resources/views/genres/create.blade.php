@extends('layout.base')

@section('content')<!---->
<form action="{{ route('genres.store') }}" method="POST">
    @csrf
    <div class="form-group">
      <label for="name" class="form-label">Name</label>
      <input
        name="name"
        type="text"
        class="form-control @error('name') is-invalid @enderror"
        id="name"
        placeholder=""
        value="{{ old('name', '') }}">
    @error('name')
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror
    </div>


    <div class="form-group">

    <label for="style" class="form-label">Style</label>
        <select class="form-select" aria-label="Default select example"
        name="style"
        type="text"
        class="form-control @error('style') is-invalid @enderror"
        id="style"
        placeholder="">
            <option selected>primary</option>
            <option value="1">secondary</option>
            <option value="2">success</option>
            <option value="3">danger</option>
            <option value="3">warning</option>
            <option value="3">info</option>
            <option value="3">light</option>
            <option value="3">dark</option>
        </select>
        @error('style')
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror
    </div>

    <button type="submit mb-5" class="btn btn-primary">add Genre</button>
  </form>
@endsection
