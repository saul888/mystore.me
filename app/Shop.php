<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    protected $table = 'shops';

    public $primaryKey = 'id';

    public $timestamps = true;
}
