<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public function Photo()
    {
        return $this->hasMany("App\Tag","taggable","photo_id","tag_id");
    }
}
