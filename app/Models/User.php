<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use GuzzleHttp\Psr7\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\HasApiTokens;
use PhpParser\Node\Scalar\String_;
use function PHPUnit\Framework\stringContains;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'role',
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

    public function Section(){
        return $this->hasOne('App\Models\Section','admin');
    }
    public function Posts()
    {
        return $this->hasMany('App\Models\Post');
    }
    public function Comments(){
        return $this->hasMany('App\Models\Comment');
    }

    public function getRedirectRoute()
    {
        return match(strtolower($this->role)) {
            'admin' => 'Admin/Post',
            'editor' => 'Admin/Post',
            'user' => 'Main',
        };
    }
    }

