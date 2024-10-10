<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = ['title','description','pages','author_id','category_id'];

    protected $table = 'book';
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function author(){
        return $this->belongsTo(Author::class);
    }
}
