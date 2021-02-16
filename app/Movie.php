<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    protected $fillable = ['title','year','director','poster','rented','synopsis'];
    
    protected $table = 'movies';
}
