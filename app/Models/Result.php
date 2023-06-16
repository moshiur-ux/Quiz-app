<?php

namespace App\Models;
use App\Question;
use App\Answer;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    use HasFactory;
    protected $fillable =['user_id','question_id','answer-id','quiz_id'];

    public function question()
    {
        return $this->belongsTo(Question::class);

    }

    public function answer()
    {
        return $this->belongsTo(Answer::class);

        
    }

}
