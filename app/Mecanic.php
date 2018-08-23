<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mecanic extends Model
{
    protected $fillable = ['nume', 'prenume'];

    public function Service()
    {
    	return $this->hasMany('App\Service', 'mecanic_id', 'id');
    }

    public function Parent_Service()
    {
        return $this->hasMany('App\Parent_Service', 'mecanic_id', 'id');
    }
}
