<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $table='photos';
    protected $primaryKey='id';
    protected $fillable=[
        'id',
        'path',
    ];
    public function Posts(){
        return $this->belongsToMany('App\Models\Post','post_photo');
    }


    use HasFactory;
}
