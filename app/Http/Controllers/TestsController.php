<?php

namespace App\Http\Controllers;

use App\Quizz;
use App\Http\Requests\StoreTestRequest;
use App\Option;
use App\Question;
use App\QuizzStudent;
use App\QuestionResult;
class TestsController extends Controller
{

    public function start()
    {
        return view('client.starttest');
    }
    public function index()
    {
        $quizz = Quizz::find(1);
        $questions = Question::whereQuizzId($quizz->id)->paginate(1);
        $question=$questions->first();

        $student = auth()->user()->alumno;
        $quizz_student = QuizzStudent::firstOrCreate(['quizz_id' => $quizz->id, 'student_id' => $student->id]);

        $marquedByStudent=$question->marquedsByStudent->where('question_id',$question->id)
                                                      ->where('quizz_id',$quizz_student->id)->first();


        return view('client.test', ['questions' => $questions,'marqued'=>$marquedByStudent]);
    }

    public function store(StoreTestRequest $request)
    {
        $student = auth()->user()->alumno;

        $question = Question::findOrfail(key($request->questions));
        $option_marqued = Option::findOrFail($request->questions[key($request->questions)]);
        $quizz = $question->quizz;


        $correctOption=$question->questionOptions->where('is_answer',1)->first();

        $points=0;
        if($option_marqued->id==$correctOption->id){
        $points=$question->points;
        }

        $quizz_student = QuizzStudent::firstOrCreate(['quizz_id' => $quizz->id, 'student_id' => $student->id]);

        $anser_student=QuestionResult::updateOrCreate(['quizz_id' => $quizz->id,'question_id'=>$question->id],
        ['option_id'=>$option_marqued->id,'points'=>$points]);


        return response()->json(['message'=>'Respuesta guardada']);
    }
}
