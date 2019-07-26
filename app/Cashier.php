<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cashier extends Model
{
    protected $table = 'cashiers';

    public $primaryKey = 'id';

    public $timestamps = true;
}
