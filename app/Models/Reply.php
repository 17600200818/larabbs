<?php

namespace App\Models;

class Reply extends Model
{
    protected $fillable = ['content'];

    public function User()
    {
        return $this->belongsTo(User::class);
    }

    public function Topic()
    {
        return $this->belongsTo(Topic::class);
    }
}
