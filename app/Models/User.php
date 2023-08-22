<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
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
     * @var array<int, string>
     */

     const ADMIN = 1;
     const EDITOR = 2;
     const USER = 3;

     public function isAdmin(){
        if(auth()->user()->role_id == self::ADMIN){
            return true;
        }
     }

     public function isEditor(){
        if(auth()->user()->role_id == self::EDITOR){
            return true;
        }
     }

     public function isUser(){
        if(auth()->user()->role_id == self::USER){
            return true;
        }
     }

    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function contact()
    {
        return $this->hasOne(Contact::class);
    }
}
