@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card text-center mt-5">
        <div class="card-header">
            <p>
                ISBN: {{ $book->isbn }}
            </p>
            <h3>
                {{ $book->author }}
            </h3>
        </div>
        <div class="card-body p-3 m-3">
            <h2 class="card-title fw-bold p-3">
                {{ $book->title }}
            </h2>
            <p class="">
                Genre: {{ $book->genre }}
            </p>
            <p class="card-text mb-4">
                {{ $book->description }}
            </p>
            <p class="card-text mb-4">
                {{ $book->publication_date }}
            </p>
            <a href="{{ route('admin.books.edit', $book->id) }}" class="btn btn-success">
                Edit
            </a>
            <form action="{{ route('admin.books.destroy', $book->id) }}" method="POST" class="d-inline-block">
                @csrf
                @method('DELETE')

                <button type="submit" class="btn btn-danger">
                    Delete
                </button>
            </form>
        </div>
        <div class="card-footer text-muted">
            {{ $book->book_date }}
        </div>
      </div>
</div>
@endsection