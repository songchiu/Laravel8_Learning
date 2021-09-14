<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogPost extends Model
{
    //Using "BlogPost::create()" to add data
    //We must add some setting in the Model
    protected $fillable = ['title', 'content'];//In this array, we assign columns that can be filled

    use HasFactory;
}
