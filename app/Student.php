<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
class Student extends Model
{

    public $table = 'student';

    public $timestamps = false;


    protected $fillable = [


    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
