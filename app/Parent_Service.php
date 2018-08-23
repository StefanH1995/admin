<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Parent_Service extends Model
{
	protected $fillable = ['beneficiar_id', 'mecanic_id', 'nr_masina'];

    public function Service()
    {
    	return $this->hasMany('App\Service', 'parent_id', 'id');
    }

    public function Beneficiar()
    {
    	return $this->belongsTo('App\Beneficiar', 'beneficiar_id', 'id');
    }

    public function Mecanic()
    {
    	return $this->belongsTo('App\Mecanic', 'mecanic_id', 'id');
    }

}
