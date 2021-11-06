<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    public $table = 'books';
    public $primaryKey = 'id';
    public $fillable = [
        'book_name','price','publish_by','publish_date','pages'
    ];
    public function getAuthor(){
        return $this->hasOne(Author::class);
    }
}
