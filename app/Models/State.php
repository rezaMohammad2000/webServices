<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    protected $fillable=[
        'name','provice_id'
    ];

    const CREATED_AT = 'create_at';
    const UPDATED_AT = 'update_at';

    use HasFactory;

    public function user()
    {
        return $this->hasOne(User::class,"state_id","id");
    }
}
