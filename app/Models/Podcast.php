<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Podcast extends Model
{
    use HasFactory;
    protected $table = 'books';
    protected $primaryKey = 'id';
    public $incrementing = true;
    public $timestamps = true;
    protected $fillable = [
        'title',
        'info',
        'length',
        'released',
        'creator',
    ];
            
}
