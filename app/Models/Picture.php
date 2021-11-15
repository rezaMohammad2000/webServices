<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Picture extends Model
{
    use HasFactory;

    public function users()
    {
        return $this->belongsToMany(User::class,"picture_user","picture_id","user_id","id","id");
    }
}
