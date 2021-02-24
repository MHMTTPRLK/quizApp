<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Question;
use App\Models\Quiz;
use App\Http\Requests\QuestionCreateRequestion;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        //$quiz=Quiz::find($id);
        $quizzes= Quiz::whereId($id)->with('questions')->first() or abort(404, 'Quiz Bulunamadı');
        return view('admin.question.list',compact('quizzes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $quiz=Quiz::find($id);
       return view('admin.question.create',compact('quiz'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(QuestionCreateRequestion $request,$id)
    {

      if( $request->hasFile('image'))
      {
          $fileName=Str::slug($request->question).'.'.$request->image->extension();
          $fileNameWithUpload='Uploads/'.$fileName;
          $request->image->move(public_path('Uploads'),$fileName);
          $request->merge([
             'image'=>$fileNameWithUpload
          ]);
      }
      Quiz::find($id)->questions()->create($request->post());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($quiz_id,$id)
    {
        return $quiz_id."- ".$id;
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
        //
    }
}
