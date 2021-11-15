<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Owner extends Model
{
    use HasFactory;
    protected $fillable=[
      'car_personal',
      'car_affroad',
      'car_personal_ej',
      'van',
      'bus',
      'middle_bus',
      'user_id',
      'home_city',
      'home_nature'
    ];
    const CREATED_AT = "create_at";
    const UPDATED_AT = "update_at";

    public function user()
    {
        return $this->belongsTo(User::class,"id","user_id");
    }
}
