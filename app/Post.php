<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //Table Name (Opional) (Class name will be used in case not specified)
    protected $table = 'posts';
    //Primary Key (Opional) (id will be used in case not specified)
    public $primaryKey = 'id';
    //Timestamps (Opional) (true by default)
    public $timestamps = true;

    function user(){
        return $this->belongsTo('App\User');
    }

}
