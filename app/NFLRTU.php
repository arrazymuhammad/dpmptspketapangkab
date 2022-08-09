<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NFLRTU extends Model
{
    protected $table = 'master_nflrtu';

    protected $guarded = [
        '_token'
    ];
    public $timestamps = true;
    protected $primaryKey = 'id_nflrtu';
}
