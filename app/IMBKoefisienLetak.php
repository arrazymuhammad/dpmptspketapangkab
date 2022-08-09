<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IMBKoefisienLetak extends Model
{
    protected $table = 'y_koefisien_letak';

    protected $guarded = [
        '_token'
    ];
    public $timestamps = true;
    protected $primaryKey = 'id_koefisien_letak';
}
