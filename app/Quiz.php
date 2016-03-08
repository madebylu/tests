<?php

namespace Tests;

use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    public function questions(){
        return $this->hasMany('Tests\Question');
    }
}
