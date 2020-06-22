<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mov extends Model
{
    protected $table = 'mov';
    protected $fillable=['descricao','id'];
}
