<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuestionResult extends Model
{
    public $table = 'question_result';
    public $timestamps=false;



    protected $fillable = [
        'quizz_id',
        'question_id',
        'option_id',
        'points'

    ];

}
