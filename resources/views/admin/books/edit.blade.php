@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        @include('admin.books.partials.editCreate', [
            'method' => 'PUT',
            'route' => 'admin.books.edit',
            'book' => $book,
        ])
    </div>
@endsection
