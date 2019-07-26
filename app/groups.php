<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class groups extends Model
{
    protected $table = 'groups';

    public $primaryKey = 'id';

    public $timestamps = true;

    public function user(){
        return $this->belongsTo('App\user');
    }
}
