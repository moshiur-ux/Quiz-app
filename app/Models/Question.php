<?php

namespace App\Models;
use App\Answer;
use App\Quiz;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
    protected $fillable =['question','quiz_id'];

    public function answer()
    {
        return $this->hasMany(Annswer::class);

    }
    public function quiz()
    {
        return $this->hasMany(Quiz::class);

        
    }
}
