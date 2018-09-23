<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    //
    protected $fillable = ['mobile','published_at','body'];

    public function article(){
    	return $this->belongsTo('App\Article');
    }

}
