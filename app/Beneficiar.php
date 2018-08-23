<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Beneficiar extends Model
{
    protected $fillable = ['nume', 'category', 'telefon', 'model', 'nr_masina', 'km'];

    public function Vulcanizare()
    {
    	return $this->hasMany('App\Vulcanizare', 'beneficiar_id', 'id');
    }

    public function ReglareaUnghiului()
    {
    	return $this->hasMany('App\ReglareaUnghiului', 'beneficiar_id', 'id');
    }

    public function Service()
    {
    	return $this->hasMany('App\Service', 'beneficiar_id', 'id');
    }

    public function Parent_Service()
    {
        return $this->hasMany('App\Parent_Service', 'beneficiar_id', 'id');
    }

    public function DeletedVulcanizare()
    {
        return $this->hasMany('App\DeletedVulcanizare', 'beneficiar_id', 'id');
    }
}
