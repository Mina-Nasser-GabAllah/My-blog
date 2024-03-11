<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table='posts';
    protected $primaryKey='id';
    protected $fillable=[
        'id',
        'title',
        'content',
        'section_id',
        'user_id',
    ];

    public function Section(){
        return $this->belongsTo('App\Models\Section');
    }
    public  function User(){
        return $this->belongsTo('App\Models\User');
    }
    public function Comments(){
        return $this->hasMany('App\Models\Comment');
    }
    public function Photos(){
        return $this->belongsToMany('App\Models\Photo','post_photo');
    }
    use HasFactory;
}
