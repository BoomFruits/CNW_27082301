<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Book;
use Ramsey\Uuid\Type\Integer;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('books.index',['books' => Book::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('books.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'Title' => 'required',
            'Author' => 'required|alpha',
            'Genre' => 'required|alpha',
            'PublicationYear' => 'date|required',
            'ISBN' => 'required',
            'CoverImageURL' => 'required|url'
        ]);
        $title = $request->input('Title');
        $author = $request->input('Author');
        $genre = $request->input('Genre');
        $py = $request->input('PublicationYear');
        $isbn = $request->input('ISBN');
        $url = $request->input('CoverImageURL');
        DB::table('books')->insert([
           'title' => $title,
           'author' => $author,
           'genre' => $genre,
           'PublicationYear' => $py,
           'ISBN' => $isbn,
           'CoverImageURL' => $url 
        ]);
        return redirect()->route('books.index')->with('success','Book Added Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // $book = Book::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $book = Book::find($id);
        return view('books.edit',['book'=>$book]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $book = Book::find($id);
        $request->validate([
            'Title' => 'required',
            'Author' => 'required',
            'Genre' => 'required',
            'PublicationYear' => 'date|required',
            'ISBN' => 'required',
            'CoverImageURL' => 'required|url'
        ]);
        $book->title = $request->input('Title');
        $book->author = $request->input('Author');
        $book->genre = $request->input('Genre');
        $book->PublicationYear = $request->input('PublicationYear');
        $book->ISBN = $request->input('ISBN');
        $book->CoverImageURL = $request->input('CoverImageURL');
        $book->update();
        return redirect()->route('books.index')->with('success','Book Edited Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // $book = Book::where('BookID',$id)->first();
        $book = Book::find($id);
        $book->delete();
        return redirect()->route('books.index')->with('success','Book Deleted Successfully');
    }
}
