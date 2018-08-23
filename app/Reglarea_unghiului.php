<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reglarea_unghiului extends Model
{
    protected $fillable = ['mecanic_id', 'pret_lucru', 'beneficiar_id', 'nr_masina'];

    public function Beneficiar()
    {
    	return $this->belongsTo('App\Beneficiar', 'beneficiar_id', 'id');
    }

    public function Reglarea_mecanic()
    {
    	return $this->belongsTo('App\Reglarea_mecanic', 'mecanic_id', 'id');
    }
}
