<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Quizz;
use App\QuestionResult;
class QuizzStudent extends Model
{

    public $table = 'quizz_student';
    public $timestamps=false;



    protected $fillable = [
        'quizz_id',
        'student_id',
        'start',
        'estado'

    ];

    public function quizz()
    {
        return $this->belongsTo(Quizz::class, 'quizz_id');
    }

    public function results()
    {
        return $this->hasMany(QuestionResult::class,'quizz_id');
    }
}
