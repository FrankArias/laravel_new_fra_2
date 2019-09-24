<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('index');
        // $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::paginate(3);
        return view('books.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('books.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'descripcion' => 'required',
        ]);
        $book = new Book;
        $book->title = $request->title;
        $book->descripcion = $request->descripcion;
        $book->user_id = Auth::user()->id;
        $book->save();
        // Book::create($request->all());

        Session::flash('message', 'Libro creado correctamente');

        return redirect()->route('books.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        return view('books.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {

        return $this->checkUserID($book->user_id) ? redirect('/books') : view('books.edit', compact('book'));

        // return;
    }
    public function checkUserID($bookID)
    {
        if (Auth::user()->id != $bookID) {
            return true;
        }
        return false;
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        if ($this->checkUserID($book->user_id)) {
            return redirect('/books');
        }

        $request->validate([
            'title' => 'required',
            'descripcion' => 'required',
        ]);

        $book->update($request->all());
        Session::flash('message', 'Libro actualizado correctamente');
        return redirect()->route('books.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        $book->delete();
        Session::flash('message', 'Libro ha sido borrado  correctamente');
        return redirect()->route('books.index');
    }
}