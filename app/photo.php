<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class photo extends Model
{
    protected $fillable = ['album_id','description','photo','title','size'];

    public function album(){
        return $this->belongsTo('App\album');
    }
}
