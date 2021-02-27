<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use App\Models\User;
use Cviebrock\EloquentSluggable\Sluggable;


class Quiz extends Model
{
    use HasFactory;
    use Sluggable;

    protected $fillable=[
        'title',
        'description',
        'status',
        'finished_at',
        'slug',
    ];
    protected $dates=['finished_at'];
    public function getFinishedAtAttribute($date){
        return $date ? Carbon::parse($date) : null;
    }
    public function questions()
    {
        return $this->hasMany('App\Models\Question');
    }

    protected $appends=['details'];
    public function getDetailsAttribute()
    {
        if($this->results->count()>0)
        {
            return [
                'avarage'=>round($this->results()->avg('point')),
                'join_count'=>count($this->results()->get()) //$this->>results()->count()
            ];
        }
       return null;

    }
    public function results()
    {
        return $this->hasMany('App\Models\Result');
    }
    public function my_result()
    {
        return $this->hasOne('App\Models\Result')->where('user_id',auth()->user()->id);
    }

    public function topTen()
    {
        return $this->results()->orderByDesc('point')->take(10);
    }
    public function sluggable(): array
    {
        return [
            'slug' => [
                'onUpdate' => true,
                'source' => 'title'
            ]
        ];
    }


}
