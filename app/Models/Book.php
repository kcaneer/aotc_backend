<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Book extends Model
{
    use HasFactory;
    protected $table = 'books';
    protected $primaryKey = 'id';
    public $incrementing = true;
    public $timestamps = true;
    protected $fillable = [
        'id',
        'title',
        'excerpt',
        'isbn',
        'pages',
        'cost',
        'value',
        'released',
        'create_at',
        'updated_at'
    ];
            
}
