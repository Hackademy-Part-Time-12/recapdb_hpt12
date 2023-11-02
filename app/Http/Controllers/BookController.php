<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Mail\ThankyouMail;
use Illuminate\Http\Request;
use App\Http\Requests\BookRequest;
use App\Models\Category;
use App\Models\Editor;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class BookController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('index', 'show');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::orderBy('created_at', 'desc')->get();
        return view('book.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $editors = Editor::all();
        $categories = Category::all();
        return view('book.create', compact('editors', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BookRequest $request)
    {
        $book = Book::create([
            'title' => $request->title,
            'author' => $request->author,
            'plot' => $request->plot,
            'cover' => $request->file('cover')->store('public/covers'),
            'user_id' => Auth::user()->id,
            'editor_id' => $request->editor_id,
        ]);
        $book->categories()->attach($request->categories);
        // Mail::to(Auth::user()->email)->send(new ThankyouMail());
        return redirect(route('homepage'))->with('message', 'Libro inserito con successo');
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        return view('book.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {   
        $editors = Editor::all();
        $categories = Category::all();
        return view('book.edit', compact('book', 'editors', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        $book->update([
            'title' => $request->title,
            'author' => $request->author,
            'plot' => $request->plot,
            'cover' => $request->file('cover') ? $request->file('cover')->store('public/covers') : $book->cover,
            'editor_id' => $request->editor_id,
        ]);
        // $book->categories()->detach();
        // $book->categories()->attach($request->categories);
        $book->categories()->sync($request->categories);

        return redirect(route('book.show', $book))->with('message', 'Libro aggiornato con successo');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        $book->categories()->detach();
        $book->delete();
        return redirect(route('homepage'))->with('message', 'Libro eliminato con successo');
    }
}
