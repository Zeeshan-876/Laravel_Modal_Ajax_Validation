<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;
    public $table = 'authors';
    public $primaryKey = 'id';
    public $fillable = [
        'author_name','book_id'
    ];
    public function getBook(){
        return $this->belongsTo(Book::class);
    }
}
