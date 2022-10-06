@extends('layout.base')

@section('content')<!---->
<form action="{{ route('books.store') }}" method="POST">
    @csrf
    <div class="form-group">
      <label for="title" class="form-label">Title</label>
      <input
        name="title"
        type="text"
        class="form-control @error('title') is-invalid @enderror"
        id="title"
        placeholder=""
        value="{{ old('title', '') }}">
    @error('title')
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror
    </div>
    <div class="form-group">
        <label for="authors" class="form-label">Authors</label>
        <input
        name="authors"
        type="text"
        class="form-control @error('authors') is-invalid @enderror"
        id="authors"
        placeholder=""
        value="{{ old('authors', '') }}">

    @error('authors')
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror
    </div>
    <div class="form-group">
        <label for="description" class="form-label">Description</label>
        <input
        name="description"
        type="text"
        class="form-control @error('description') is-invalid @enderror"
        id="description"
        placeholder=""
        value="{{ old('description', '') }}">

    @error('description')
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror
    </div>
    <div class="form-group">
        <label for="released_at" class="form-label">Released at</label>
        <input
        name="released_at"
        type="date"
        class="form-control @error('released_at') is-invalid @enderror"
        id="released_at"
        placeholder=""
        value="{{ old('released_at', '') }}">

    @error('released_at')
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror
    </div>
    <div class="form-group">
        <label for="cover_image" class="form-label">Cover image</label>
        <input
        name="cover_image"
        type="text"
        class="form-control @error('cover_image') is-invalid @enderror"
        id="cover_image"
        placeholder=""
        value="{{ old('name', '') }}">

    @error('cover_image')
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror
      </div>
      <div class="form-group">
        <label for="pages" class="form-label">Pages</label>
        <input
        name="pages"
        type="text"
        class="form-control @error('pages') is-invalid @enderror"
        id="pages"
        placeholder=""
        value="{{ old('pages', '') }}">

    @error('pages')
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror
      </div>
      <div class="form-group">
        <label for="language_code" class="form-label">language code</label>
        <input
        name="language_code"
        type="text"
        class="form-control @error('language_code') is-invalid @enderror"
        id="language_code"
        placeholder=""
        value="{{ old('language_code', '') }}">

    @error('language_code')
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror
      </div>
      <div class="form-group">
        <label for="isbn" class="form-label">Isbn</label>
        <input
        name="isbn"
        type="text"
        class="form-control @error('isbn') is-invalid @enderror"
        id="isbn"
        placeholder=""
        value="{{ old('isbn', '') }}">

    @error('isbn')
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror
      </div>
      <div class="form-group">
        <label for="in_stock" class="form-label">In stock</label>
        <input
        name="in_stock"
        type="text"
        class="form-control @error('in_stock') is-invalid @enderror"
        id="in_stock"
        placeholder=""
        value="{{ old('in_stock', '') }}">

    @error('in_stock')
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror
      </div>
      <div class="form-group d-flex flex-wrap">
        @foreach ($genres as $genre)
        <div class="custom-control custom-switch col-sm-2">
            <input name="genres[]" value="{{ $genre->id }}" type="checkbox" class="custom-control-input" id="genre{{ $genre->id }}">
            <label class="custom-control-label" for="genre{{ $genre->id }}">{{ $genre->name }}</label>
        </div>
        @endforeach
    </div>
    <button type="submit mb-5" class="btn btn-primary">add book</button>
  </form>
@endsection
