<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DeletedReglarea extends Model
{
    protected $fillable = ['mecanic_id', 'beneficiar_id','pret_lucru', 'user_id', 'old_parent_id', 'nr_masina'];

    public function Beneficiar()
    {
    	return $this->belongsTo('App\Beneficiar', 'beneficiar_id', 'id');
    }
}
