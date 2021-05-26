<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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
        return view('admin.quizz.edit',['quizz'=>$quizz]);
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

        return redirect()->route('admin.quizz.edit',['quizz'=>$quizz]);
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
