<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MasterPerizinan extends Model
{
    protected $table = 'master_perizinan';

    protected $guarded = [
        '_token'
    ];
    public $timestamps = false;
    protected $primaryKey = 'id';
}
