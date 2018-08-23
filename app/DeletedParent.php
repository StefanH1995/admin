<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DeletedParent extends Model
{
    protected $fillable = ['mecanic_id', 'beneficiar_id', 'user_id', 'suma', 'old_parent_id', 'nr_masina'];

    public function Beneficiar()
    {
    	return $this->belongsTo('App\Beneficiar', 'beneficiar_id', 'id');
    }

    public function DeletedService()
    {
    	return $this->hasMany('App\DeletedService', 'parent_id', 'id');
    }


}
