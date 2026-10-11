<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $fillable ={
        'title'
        'publication_year',
        'category_id'
        'description'
    }
    public function books()
    {
        return $this->hasMany(Book::class, 'category_id');
    }
    
}
