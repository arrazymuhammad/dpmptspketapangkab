<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kawasan extends Model
{
    protected $table = 'master_kawasan';

    protected $guarded = [
        '_token'
    ];
    public $timestamps = true;
    protected $primaryKey = 'id_kawasan';
}
