@extends('layouts.app ')
@section('content')
    <div class="container">
        @if (session('message'))
            <div class="alert alert-{{ session('message-class') }}">
                {{ session('message') }}
            </div>
        @endif
        <table class="table table-striped table-hover mt-5">
            <thead class="table-dark">
                <tr>
                    <th scope="col">#id</th>
                    <th scope="col">Title</th>
                    <th scope="col">Author</th>
                    <th scope="col">date</th>
                    <th scope="col">
                        <a class="btn btn-primary">create a new book</a>
                    </th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                @foreach ($books as $book)
                    <tr>
                        <td>{{ $book->id }}</td>
                        <td>{{ $book->title }}</td>
                        <td>{{ $book->author }}</td>
                        <td>{{ $book->publication_date }}</td>
                        <td>
                            <a class="btn btn-primary" href="{{ route('admin.books.show', $book->id) }}">Show</a>

                            <a class="btn btn-success" href="{{ route('admin.books.edit', $book->id) }}">Edit</a>

                            <form action="{{ route('admin.books.destroy', $book->id) }}" method="POST"
                                class="d-inline-block form-deleter">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
