<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

    protected $fillable = ['name','birthday'];

    protected $table = 'author';
    public function books()
    {
        return $this->hasMany(Book::class);
    }
}
