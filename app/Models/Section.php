<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    protected $table='sections';
    protected $primaryKey='id';
    protected $fillable=[
        'id',
        'name',
        'admin',
    ];

    public function Admin()
    {
        return $this->belongsTo('App\Models\User','admin');
    }
    public function Posts()
    {
        return $this->hasMany('App\Models\Post');
    }
    use HasFactory;
}
