<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IndekLokasi extends Model
{
    protected $table = 'master_indek_lokasi';

    protected $guarded = [
        '_token'
    ];
    public $timestamps = true;
    protected $primaryKey = 'id_index_lokasi';
}
