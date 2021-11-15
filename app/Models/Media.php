<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    use HasFactory;
    protected $fillable=[
      'email',
      'website',
      'instagram',
      'youtube',
      'aparat',
      'user_id'
    ];
    const CREATED_AT = "create_at";
    const UPDATED_AT = "update_at";
    public function user()
    {
        return $this->belongsTo(User::class,"id","user_id");
    }
}
