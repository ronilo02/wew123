<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookInformation extends Model
{
    protected $table = 'book_information';
    
    protected $fillable = ['author','book_title','genre','isbn','published_date','previous_publisher','book_reference'];
}
