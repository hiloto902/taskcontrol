<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Answer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AnswerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("answer/index")->with('answers',Answer::whereIn('task_id',
Task::whereIn('matter_id', Auth::user()->company->matter->pluck('id'))->get()->pluck('id'))->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //返信を保存
        $answer = new Answer();
        $answer->answer = $request->input('answer');
        $answer->task_id = $request->input('task_id');
        $answer->save();

        return redirect(route('answers.index'));
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
        return view("answer/edit")
            ->with('answer', Answer::find($id));
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
        $answer->answer = $request->input('answer');
        $answer->task_id = $request->input('task_id');
        $answer->save();

        return redirect(route('answers.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $answer->delete();
        return redirect(route('answers.index'));
    }
}
