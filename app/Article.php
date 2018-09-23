<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    //
    protected $fillable = ['login_id','role','name','password','mail','test_mail','updated_person'];

    public function documents(){
    	return $this->hasMany('App\Document');
    }
}
