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
                        <a class="btn btn-primary">create a new project</a>
                    </th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                @foreach ($books as $book)
                    <tr>
                        <td>{{ $books->id }}</td>
                        <td>{{ $books->title }}</td>
                        <td>{{ $books->author }}</td>
                        <td>{{ $books->date }}</td>
                        <td>
                            <a class="btn btn-primary" href="{{ route('admin.books.show', $books->id) }}">Show</a>

                            <a class="btn btn-success" href="{{ route('admin.books.edit', $books->id) }}">Edit</a>

                            <form action="{{ route('admin.books.destroy', $books->id) }}" method="POST"
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
        {{ $books->links() }}
    </div>
@endsection
