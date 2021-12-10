<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    use HasFactory;

    protected $table = 'photos';

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function formats()
    {
        return $this->hasMany(Format::class);
    }

}


