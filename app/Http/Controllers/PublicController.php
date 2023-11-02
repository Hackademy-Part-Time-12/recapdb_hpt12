<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PublicController extends Controller
{
    public function homepage() {
        $books = Book::orderBy('created_at', 'desc')->take(3)->get();
        return view('welcome', compact('books'));
    }

    public function profile(){
        return view('profile');
    }

    public function destroy(){
        foreach(Auth::user()->books as $book){
            $book->categories()->detach();
        }
    
        Auth::user()->delete();
        return redirect('homepage')->with('message', 'Ci dispiace! Torna a trovarci');
    }
}
