<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Video;
use App\Question;
use DB;
use Validator;

class VideosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $videos=DB::table('video')->get();
        $result=compact('videos');
        return view('exercices.videos',$result);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('exercices.newVideo');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validator=Validator::make($_POST,['question'=>'required','answer'=>'required','url'=>'required','level'=>'required']);
        if ($validator->fails()){
            $request->flash();
            return back()->withErrors($validator);
            
        }
        else{
        $video = new Video;
        $url=str_replace('watch?v=','embed/',$request->url);
        $video->url=$url;
        $video->level=$request->level;
        $video->save();

        //$video=Video::create(['url'=>$request->url,'level'=>$request->level]);
        $question = new Question;
        $question->video_id=$video->id;
        $question->question = $request->question;
        $question->answer=$request->answer;
        $question->isWithGap=0;
        $question->save();
        //Question::create(['video_id'=>$video->id,'question'=>]);
        return view('dashboard');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $videos=DB::table('video')->where('level','=',$id)->get();
        //var_dump($videos);
        $result=compact('videos');
        //var_dump($result);
        return view('exercices.videos',$result);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('questions')->where('video_id',$id)->delete();
        DB::table('video')->where('id',$id)->delete();
        return redirect()->action('VideosController@index');
    }
}
