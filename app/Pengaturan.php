<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengaturan extends Model
{
    protected $table = 'pengaturan';

    protected $guarded = [
        '_token',
        'created_at',
        'updated_at'
    ];
    public $timestamps = true;
    protected $primaryKey = 'id';
}
