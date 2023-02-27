<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    protected $validationCondition = [
        'isbn' => 'required|number|max:13|unique:books,isbn',
        'title' => 'required|min:2|max:100|unique:books,title',
        'author' => 'required|min:2|string',
        'publication_date' => 'required|date',
        'description' => 'required|string|min:6',
        'genre' => 'required|string|min:2',
        'cover_image' => 'required|url',
    ];

    protected $messagesOfErrors = [
        'title.required' => 'Il titolo è obblogatorio',
        'title.min' => 'Il titolo deve contere almeno 2 caratteri',
        'description.required' => 'La descrizione è necessaria',
        'description.min' => 'La descrizione deve contenere minimo 6 caratteri',
        'thumb.required' => 'L\'url della immagine è fondamentale',
        'author.required' => 'l\'autore è necessario',
        'used_technology.required' => 'la tecnologia utilizzata nel progetto è necessaria',
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
