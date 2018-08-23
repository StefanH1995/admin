<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rapoarte extends Model
{
    protected $fillable = ['mecanic_id', 'reglarea_mecanic_id','vulcanizator_id', 'service', 'service_transfer', 'vulcanizare', 'vulcanizare_transfer', 'total'];
}
