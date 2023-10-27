<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'id', 'user_id', 'body'
    ];

    protected $guarded = [];
    // protected $table = 'comment';

    public function creator()
    {
        return $this->belongsTo(User::class, 'user_id');
    }


}
