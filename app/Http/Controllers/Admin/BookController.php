<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;
use Illuminate\Validation\Rule;

class BookController extends Controller
{
    protected $validationCondition = [
        'isbn' => 'required|number|max:13|unique:books,isbn',
        'title' => 'required|min:2|max:100',
        'author' => 'required|min:2|string',
        'publication_date' => 'required|date',
        'description' => 'required|string|min:6',
        'genre' => 'required|string|min:2',
        'cover_image' => 'required|url',
    ];

    protected $messagesOfErrors = [
        'isbn.required' => 'L\'isbn è obblogatorio',
        'isbn.max' => 'L\'isbn deve essere di 13 caratteri',
        'title.required' => 'Il titolo è obblogatorio',
        'title.min' => 'Il titolo deve contere almeno 2 caratteri',
        'author.required' => 'l\'autore è necessario',
        'publication_date.required' => 'la data di pubblicazione è necessaria',
        'description.required' => 'La descrizione è necessaria',
        'description.min' => 'La descrizione deve contenere minimo 6 caratteri',
        'genre.required' => 'il genere del libro è necessario',
        'genre.min' => 'il genere del libro è almeno di 2 caratteri',
        'cover_image.required' => 'L\'url della immagine è fondamentale',
    ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::all();
        return view('admin.books.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.books.create', ["book" => new Book()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $newBook = new Book();
        $newBook->fill($data);
        $newBook->save();

        return redirect()->route('admin.books.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $book = Book::findOrFail($id);
        return view('admin.books.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Book $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        return view('admin.books.edit', compact('book'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Book $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        $newCondition = $this->validationCondition;
        //riconfermo le regole precedenti e aggiungo 'esclusione della unique
        $newCondition['isbn'] = ['required', 'max:13', Rule::unique('books')->ignore($book->id)];
        $data = $request->validate($newCondition, $this->messagesOfErrors);
        $book->update($data);
        return redirect()->route('admin.books.show', $book->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('admin.books.index')->with('message', "$book->title è stato cancellato con successo")->with('alert-type', 'danger');
    }
}
