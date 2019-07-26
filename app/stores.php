<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class stores extends Model
{
    //Table Name
    protected $table = 'stores';
    //Primary Key
    public $primaryKey = 'id';
    //Timestamps
    public $timestamps = true;
}
