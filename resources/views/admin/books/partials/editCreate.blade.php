<form action="{{ route($route, $book->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method($method)

    @if ($errors->any())
        <div class="alert alert-danger mt-3">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="mb-3">
        <label for="isbn" class="form-label">
            ISBN
        </label>
        <input type="number" name="isbn" value="{{ old('title', $book->isbn) }}" class="form-control">
    </div>
    <div class="mb-3">
        <label for="title" class="form-label">
            Titolo del Libro
        </label>
        <input type="text" name="title" value="{{ old('title', $book->title) }}" class="form-control">
    </div>
    <div class="mb-3">
        <label for="author" class="form-label">
            Autore
        </label>
        <input type="text" name="author" value="{{ old('author', $book->author) }}" class="form-control">
    </div>
    <div class="mb-3">
        <label for="publication_date" class="form-label">
            Data di Pubblicazione
        </label>
        <input type="date" name="publication_date" value="{{ old('publication_date', $book->publication_date) }}"
            class="form-control">
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">
            Descrizione
        </label>
        <textarea class="form-control" name="description" rows="3">{{ old('description', $book->description) }}</textarea>
    </div>
    <div class="mb-3">
        <label for="genre" class="form-label">
            Genere
        </label>
        <input type="text" name="genre" value="{{ old('genre', $book->genre) }}" class="form-control">
    </div>
    <div class="mb-3">
        <label for="cover_image" class="form-label">
            Immagine di Copertina
        </label>
        <input type="text" name="cover_image" value="{{ old('cover_image', $book->cover_image) }}"
            class="form-control">
    </div>

    <button type="submit" class="btn btn-success">Aggiungi Libro</button>
</form>
