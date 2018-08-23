<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DeletedService extends Model
{
    protected $fillable = ['mecanic_id', 'beneficiar_id', 'user_id', 'piese', 'cantitate', 'suma', 'pret_lucru', 'suma_totala', 'pret', 'parent_id', 'old_id'];

    public function Beneficiar()
    {
    	return $this->belongsTo('App\Beneficiar', 'beneficiar_id', 'id');
    }

    public function DeletedParent()
    {
    	return $this->belongsTo('App\DeletedParent', 'parent_id', 'id');
    }
}
