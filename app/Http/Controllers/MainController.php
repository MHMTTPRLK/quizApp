<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quiz;


class MainController extends Controller
{
 public function dashboard()
 {
    $quizzes=Quiz::where('status','publish')->withCount('questions')->paginate('3');
     return view('dashboard',compact('quizzes'));
 }
    public function quiz_detail()
    {
        $quizzes=Quiz::where('status','publish')->withCount('questions')->paginate('3');
        return view('dashboard',compact('quizzes'));
    }
}
