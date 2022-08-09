<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IndekGangguan extends Model
{
    protected $table = 'master_indek_gangguan';

    protected $guarded = [
        '_token'
    ];
    public $timestamps = true;
    protected $primaryKey = 'id_indek_gangguan';
}
