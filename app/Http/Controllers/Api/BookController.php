<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index(){
        $books = Book::paginate(25);
        return response()->json([
            'success' => true,
            'results' => $books
        ]);
    }

    public function show(Book $book)
    {
        return response()->json([
            'success' => true,
            'results' => $book
        ]);
    }
}