<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\User;
use App\Models\Podcast;
use Illuminate\Database\Eloquent\Model;

class Listen extends Model
{
    use HasFactory;
    protected $table = 'listen';
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $fillable = [
        'user_id',
        'listened',
        'podcast_id'
    ];

    protected $with = ['user'];

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }
    public function podcast()
    {
        return $this->belongsTo('App\Models\Podcast', 'podcast_id');
    }
}
