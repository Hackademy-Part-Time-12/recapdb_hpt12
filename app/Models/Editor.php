<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Editor extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    //? un editore è relazionato a più libri? Sì, quindi il metodo sarà al plurale
    public function books(){
        //? un editore ha tanti libri? Sì e quindi il metodo è hasMany()
        return $this->hasMany(Book::class);
    }
}
