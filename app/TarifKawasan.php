<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TarifKawasan extends Model
{
    protected $table = 'master_kawasan_tarif';

    protected $guarded = [
        '_token'
    ];
    public $timestamps = true;
    protected $primaryKey = 'id_trf_kawasan';
}
