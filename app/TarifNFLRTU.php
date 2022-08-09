<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TarifNFLRTU extends Model
{
    protected $table = 'master_nflrtu_tarif';

    protected $guarded = [
        '_token'
    ];
    public $timestamps = true;
    protected $primaryKey = 'id_nflrtu_tarif';
}
