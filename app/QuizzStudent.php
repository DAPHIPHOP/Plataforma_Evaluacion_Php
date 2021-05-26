<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Quizz;
use App\QuestionResult;
use App\lista_app;
use App\direcciones;

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

    public function alumno()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }

     public function results()
    {
        return $this->hasMany(QuestionResult::class,'quizz_id');
    }


    public function aplicaciones()
    {
        return $this->hasMany(lista_app::class, 'id_quizz_alumno');
    }

    public function direcciones()
    {
        return $this->hasOne(direcciones::class,'id_quizz_alumno');
    }
}
