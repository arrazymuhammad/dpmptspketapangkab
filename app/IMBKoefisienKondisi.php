<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IMBKoefisienKondisi extends Model
{
    protected $table = 'y_koefisien_kondisi';

    protected $guarded = [
        '_token'
    ];
    public $timestamps = true;
    protected $primaryKey = 'id_koefisien_kondisi';
}
