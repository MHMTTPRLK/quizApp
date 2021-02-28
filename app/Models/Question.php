<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $fillable = [
       'question',
      'quiz_id',
      'image',
      'answer1',
      'answer2',
      'answer3',
      'answer4',
      'correct_answer'
    ];
    protected $appends=['true_percent'];
     public function  getTruePercentAttribute(){
      $answer_count= $this->answers()->count();
      $true_answer=$this->answers()->where('answer',$this->correct_answer)->count();
      return round((100/$answer_count)*$true_answer);
     }
     public function answers()
     {
         return $this->hasMany('App\Models\Answer');
     }
    public function my_answer()
    {
        return $this->hasOne('App\Models\Answer')->where('user_id',auth()->user()->id);
    }


}
