<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class vendor extends Model
{
    //Table Name
    protected $table = 'vendors';
    //Primary Key
    public $primaryKey = 'id';
    //Timestamps
    public $timestamps = true;
}
