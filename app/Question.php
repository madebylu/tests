<?php

namespace Tests;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{   
    public function answers(){
        return $this->hasMany('Tests\Answer');
    }
    public function draggables(){
        return $this->hasMany('Tests\Draggable');
    }
    public function draggable_answers(){
        return $this->hasMany('Tests\DraggableAnswer');
    }
}
