<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class Usuario extends Model implements Authenticatable
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = [
        'name',
        'email',
        'username',
        'photo_url',
        'password',
    ];
    protected $hidden = [
        'password',
    ];

    protected static function booted()
    {
        static::creating(function ($user) {
            $user->password = Hash::make($user->password); // Critografa a senha do usuario antes de adiciona-la ao banco de dados
        });
        static::updating(function ($user) {
            if ($user->isDirty('password')) {
                $user->password = Hash::make($user->password); // Critografa a senha do usuario antes de adiciona-la ao banco de dados
            }
        });
    }

    public function getAuthIdentifierName()
    {
        return 'id';
    }

    public function getAuthIdentifier()
    {
        return $this->id;
    }

    public function getAuthPassword()
    {
        return $this->password;
    }

    public function getRememberToken()
    {
    }

    public function setRememberToken($token)
    {
    }

    public function getRememberTokenName()
    {
    }

}
