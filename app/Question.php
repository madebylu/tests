<?php

namespace Tests;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{   
    public function answers(){
        return $this->hasMany('Tests\Answer');
    }
}
