<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table='comments';
    protected $primaryKey='id';
    protected $fillable=[
        'id',
        'content',
        'post_id',
        'user_id',
    ];
    public function User(){
        return $this->belongsTo('App\Models\User');
    }
    public function Post(){
        return $this->hasMany('App\Models\Post');
    }
    use HasFactory;
}
