<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Like extends Model
{
    use HasFactory;

    public function user()
    {

        return $this->belongsTo(User::class)->withDefault();
    }

    public function likeable()
    {

        return $this->morphTo();
    }
}
