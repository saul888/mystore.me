<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class item extends Model
{
    protected $table = 'items';

    public $primaryKey = 'id';

    public $timestamps = true;
}
