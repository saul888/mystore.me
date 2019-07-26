<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class type extends Model
{
    //Table Name
    protected $table = 'types';
    //Primary Key
    public $primaryKey = 'id';
    //Timestamps
    public $timestamps = true;
}
