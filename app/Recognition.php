<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Recognition extends Model
{
    use SoftDeletes;

    public $table = 'recognitions';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'id_usuario',
        'attempt',
        'similarity',
        'image',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
