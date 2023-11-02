<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    //? una categoria è relazionata a più libri? Sì quindi il metodo è al plurale
    public function books(){
        //? una categoria ha tanti libri? Sì , quindi il metodo è belongsToMany()
        return $this->belongsToMany(Book::class);
    }
}
