<?php

namespace App\Traits;

use App\Models\User;

trait TestTrait{
    public function getData($model){
        return $model::all();
    }

    public function scopeName($query){
        $query->where('name','alaa');
    }
}
