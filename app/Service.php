<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = ['piese', 'cantitate', 'pret', 'suma', 'pret_lucru', 'suma_totala', 'mecanic_id', 'beneficiar_id', 'is_free', 'grupa', 'parent_id'];

    public function Beneficiar()
    {
    	return $this->belongsTo('App\Beneficiar', 'beneficiar_id', 'id');
    }

    public function Mecanic()
    {
    	return $this->belongsTo('App\Mecanic', 'mecanic_id', 'id');
    }

    public function Parent_Service()
    {
    	return $this->belongsTo('App\Parent_Service', 'parent_id', 'id');
    }

}
