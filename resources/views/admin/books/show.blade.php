@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card text-center mt-5">
        <div class="card-header">
            {{ $book->title }}
        </div>
        <div class="card-body p-3 m-3">
            <h2 class="card-title fw-bold p-3">
                {{ $book->title }}
            </h2>
            <p class="card-text mb-4">
                {{ $book->content }}
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