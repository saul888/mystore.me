<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $table = 'sales';

    public $primaryKey = 'id';

    public $timestamps = true;
}
