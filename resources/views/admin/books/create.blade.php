@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        @include('admin.books.partials.editCreate', [
            'method' => 'POST',
            'route' => 'admin.books.store',
            'book' => $book,
        ])
    </div>
@endsection
