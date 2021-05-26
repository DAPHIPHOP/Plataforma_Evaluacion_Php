<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Option;
use App\Question;
use App\Quizz;
use Illuminate\Http\Request;

class QuizzController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $quizzes=Quizz::all();  // selct ¨from quizz
        return view('admin.quizz.index', ['quizzes' => $quizzes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.Quizz.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $quizz=Quizz::create($request->all());
        $preguntas=$request->pregunta;

        foreach ($preguntas as $key =>$pregunta) {
            $question=new Question();
            $question->question_text=$pregunta;
            $question->quizz_id=$quizz->id;
            $question->points=1;
            $question->save();

            $st='opt'.$key;
            $st2='ans'.$key;
            $answer=$request->$st2;
            $options=$request->$st;
            foreach ($options as $key=>$option) {


                $opt=new Option();
                $opt->option_text=$option;
                $opt->question_id=$question->id;
                $opt->is_answer=(in_array(($key), $answer)) ? 1 : 0 ;
                $opt->save();
            }
        }





        return redirect()->route('admin.quizz.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $quizz=Quizz::findOrFail($id);
        return view('admin.quizz.edit', ['quizz'=>$quizz]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $quizz=Quizz::findOrFail($id);
        $quizz->update($request->all()); //update campo1 , campo , camp2 set campo1 actu, campo actu where quizz.id =1

        return redirect()->route('admin.quizz.edit', ['quizz'=>$quizz]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $quizz=Quizz::find($id);
        $quizz->delete(); //delete from  quizz where quiz.id = 1
    }
}
