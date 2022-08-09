<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IMBTarifDasar extends Model
{
    protected $table = 'y_tarifdasar';

    protected $guarded = [
        '_token'
    ];
    public $timestamps = true;
    protected $primaryKey = 'id_tarifdasar';
}
