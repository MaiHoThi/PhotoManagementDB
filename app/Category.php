<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    // hasmany =>truyen vao(foreinkey,primarykey);
   public function Photo()
   {
       return $this->hasMany('App\Photo','category_id','id');
   }
}
