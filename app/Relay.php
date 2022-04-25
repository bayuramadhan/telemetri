<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Relay extends Model
{
    protected $table = 'relays';
    public $primaryKey = 'id';
    public $timestamps = true;
}
