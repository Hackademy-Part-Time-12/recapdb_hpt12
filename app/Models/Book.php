<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'author', 'cover', 'plot', 'user_id', 'editor_id'
    ];

    //? un libro è relazionato a più utenti? No, quindi il metodo sarà al singolare
    public function user(){
        //? un libro ha tanti utenti? No quindi il metodo è belongsTo()
        return $this->belongsTo(User::class);
    }

    //? un libro è relazionato a più editori? No, quindi il metodo sarà al singolare
    public function editor(){
        //? un libro ha tanti editori? No e quindi il metodo è belongsTo()
        return $this->belongsTo(Editor::class);
    }

    //? un libro è relazionato a più categorie? Sì quindi il metodo è al plurale
    public function categories(){
        //? un libro ha tante categorie? Sì , quindi il metodo è belongsToMany()
        return $this->belongsToMany(Category::class);
    }
}
