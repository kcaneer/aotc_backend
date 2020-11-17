<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;
use Carbon\Carbon;

class BookController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function index()
    {
        //show json of all of my books
        // create query to get all the books and then do 
        return Book::all();
    }

    public function create()
    {
        //shows a view (form) to create a new book
        //is this postman ? tinker ? react ? 
        Book::factory()->create();

    }

    public function read(Request $request)
    {
        //see the single book that you just created
        $book = Book::find($request['id']);
        return $book;
    }

    public function update(Request $request)
    {
        //edit books already in the database
        $book = Book::find($request['id']);
        return $book;
        $book->title = $request['title'];
        $book->excerpt = $request['excerpt'];
        $book->isbn = $request['isbn'];
        $book->pages = $request['pages'];
        $book->cost = $request['cost'];
        $book->value = $request['value'];
        $book->released = $request['released'];
        $book->created_at = $request['created_at'];
        $book->updated_at = Carbon::now();
        $book->save();
    }

    public function deletebook(Request $request)
    {
        //delete books from the database
        Book::find($request['id'])->delete();
    }
}
