<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IMBKoefisienGuna extends Model
{
    protected $table = 'y_koefisien_guna';

    protected $guarded = [
        '_token'
    ];
    public $timestamps = true;
    protected $primaryKey = 'id_koefisien_guna';
}
