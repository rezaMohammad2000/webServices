<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'family',
        'codmeli',
        'gender',
        'birthday',
        'description',
        'state_id',
        'referral',
        'mobile',
        'password',
        'remember_token'
    ];
    const CREATED_AT = "create_at";
    const UPDATED_AT = "update_at";

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function state()
    {
        return $this->belongsTo(State::class,"id","state_id");
    }

    public function activePersonal()
    {
        return $this->hasMany(ActivePersonal::class,"user_id","id");
    }

    public function media()
    {
        return $this->hasMany(Media::class,"user_id","id");
    }

    public function owner()
    {
        return $this->hasMany(Owner::class,"user_id","id");
    }

    public function pictures()
    {
        return $this->belongsToMany(Picture::class,"picture_user","user_id","picture_id","id","id");
    }

}
