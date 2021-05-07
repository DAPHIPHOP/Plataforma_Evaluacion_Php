<?php

namespace App\Http\Controllers;

use App\Quizz;
use App\Http\Requests\StoreTestRequest;
use App\Option;
use App\Question;
use App\QuizzStudent;
use App\QuestionResult;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TestsController extends Controller
{

    public function start()
    {
        return view('client.starttest');
    }
    public function index(Request $request)
    {

        $quizz = Quizz::findOrFail($request->id);

        $questions = Question::whereQuizzId($quizz->id)->paginate(1)->appends(['id' => $request->id]);
        $question = $questions->first();

        $student = auth()->user()->alumno;
        $quizz_student = QuizzStudent::where(['quizz_id' => $quizz->id, 'student_id' => $student->id])->exists();

        if ($quizz_student) {
            $quizz_student = QuizzStudent::where(['quizz_id' => $quizz->id, 'student_id' => $student->id])->first();
        } else {
            $quizz_student = QuizzStudent::create(['start' => Carbon::now(), 'quizz_id' => $quizz->id, 'student_id' => $student->id]);
        }

        if ($quizz_student->estado == 'Finalizado') {
            return redirect()->route('client.test.finish', ['id' => $quizz_student->id]);
        }
        $marquedByStudent = $question->marquedsByStudent->where('question_id', $question->id)
            ->where('quizz_id', $quizz_student->id)->first();


        return view('client.test', ['questions' => $questions, 'marqued' => $marquedByStudent, 'intento' => $quizz_student]);
    }

    public function store(StoreTestRequest $request)
    {
        $student = auth()->user()->alumno;

        $question = Question::findOrfail(key($request->questions));
        $option_marqued = Option::findOrFail($request->questions[key($request->questions)]);
        $quizz = $question->quizz;


        $correctOption = $question->questionOptions->where('is_answer', 1)->first();

        $points = 0;
        if ($option_marqued->id == $correctOption->id) {
            $points = $question->points;
        }

        $quizz_student = QuizzStudent::where(['quizz_id' => $quizz->id, 'student_id' => $student->id])->first();
if($quizz_student->estado!='Finalizado'){

    $anser_student = QuestionResult::updateOrCreate(
        ['quizz_id' => $quizz_student->id, 'question_id' => $question->id],
        ['option_id' => $option_marqued->id, 'points' => $points]
    );
    return response()->json(['message' => 'Respuesta no guardada']);
}


        return response()->json(['message' => 'Respuesta guardada']);
    }


    public function finish($id)
    {
        $quizz_student = QuizzStudent::findOrFail($id);
        if ($quizz_student->estado != 'Finalizado') {
            $quizz_student->estado = 'Finalizado';
            $quizz_student->save();
        }

        $results = $quizz_student->results->sum('points');
        $quizz = $quizz_student->quizz->quizzQuestions->sum('points');

        return view('client.results', ['results' => $results, 'total' => $quizz]);
    }
}
