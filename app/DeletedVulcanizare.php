<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DeletedVulcanizare extends Model
{
    protected $fillable = ['vulcanizator_id', 'beneficiar_id','suma', 'user_id', 'old_parent_id', 'nr_masina'];

    public function Beneficiar()
    {
    	return $this->belongsTo('App\Beneficiar', 'beneficiar_id', 'id');
    }
}
