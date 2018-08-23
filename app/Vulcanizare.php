<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vulcanizare extends Model
{
    protected $fillable = ['vulcanizator_id', 'suma', 'beneficiar_id', 'nr_masina'];

    public function Beneficiar()
    {
    	return $this->belongsTo('App\Beneficiar', 'beneficiar_id', 'id');
    }

    public function Vulcanizator()
    {
    	return $this->belongsTo('App\Vulcanizator', 'vulcanizator_id', 'id');
    }
}
