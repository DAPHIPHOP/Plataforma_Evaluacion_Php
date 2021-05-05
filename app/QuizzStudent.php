<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuizzStudent extends Model
{

    public $table = 'quizz_student';
    public $timestamps=false;



    protected $fillable = [
        'quizz_id',
        'student_id',

    ];

   /*  public function question()
    {
        return $this->belongsTo(Question::class, 'question_id');
    } */
}
