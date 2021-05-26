<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Quizz extends Model
{
    use SoftDeletes;

    public $table = 'quizz';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'disp_from',
        'disp_to',
        'duration',
        'teacher_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];


    public function quizzQuestions()
    {
        return $this->hasMany(Question::class, 'quizz_id', 'id');
    }

      public function students()
    {
        return $this->hasMany(QuizzStudent::class, 'quizz_id', 'id');
    }
}
