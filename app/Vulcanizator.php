<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vulcanizator extends Model
{
    protected $fillable = ['nume'];

        public function Vulcanizare()
    {
    	return $this->hasMany('App\Vulcanizare', 'vulcanizator_id', 'id');
    }
}
