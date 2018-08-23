<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reglarea_mecanic extends Model
{
	protected $fillable = ['nume', 'prenume'];
	
    public function ReglareaUnghiului()
    {
    	return $this->hasMany('App\Reglarea_unghiului', 'mecanic_id', 'id');
    }

    public function DeletedReglarea()
    {
    	return $this->hasMany('App\DeletedReglarea', 'mecanic_id', 'id');
    }

}
