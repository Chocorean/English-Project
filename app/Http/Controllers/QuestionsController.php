<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Validator;
use App\Question;

class QuestionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        
            $question = new Question;
            $question->video_id=$_POST['video_id'];
            $question->question = $request->question;
            $question->answer=$request->answer;
            $question->isWithGap=0;
            $question->save();
            $video=DB::table('video')->where('id','=',$request->video_id)->first();
            $questions=DB::table('questions')->where('video_id','=',$video->id)->get();
            $result=compact('video','questions');
            return view('exercices.newQuestion',$result);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $video=DB::table('video')->where('id',$id)->first();
        $questions=DB::table('questions')->where('video_id',$id)->get();
        $result=compact('video','questions');
        return view('exercices.exercice',$result);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $question=DB::table('questions')->where('id','=',$id)->first();
        $video=DB::table('video')->where('id','=',$question->video_id)->first();
        DB::table('questions')->where('id','=',$id)->delete();
        $questions=DB::table('questions')->where('video_id','=',$video->id)->get();
        $result=compact('video','questions');
        return view('exercices.newQuestion',$result);
    }

    public function check(Request $request){
        $id=$_POST['id'];
        $validator=Validator::make($_POST,
                ['answer_'.$id=>'required'],['answer_'.$id.'.required'=>'An answer is required.']);
        $validator->after(function ($validator) {
            $id=$_POST['id'];
            $question=DB::table('questions')->where('id',$id)->first();
        if (strcasecmp($_POST['answer_'.$id],$question->answer)==0){
            
            $validator->errors()->add('correct_answer_'.$id,'Good job !');
        }
        else{       
            $validator->errors()->add('answer_'.$id,'The expected anwser was : "'.$question->answer.'"');
        }
    });
       $request->flash();
       return back()->withErrors($validator);

    }

    public function new(){
        $video=DB::table('video')->where('id','=',$_POST['id'])->first();
        $questions=DB::table('questions')->where('video_id','=',$video->id)->get();
        $result=compact('video','questions');
        return view('exercices.newQuestion',$result);
    }
}
