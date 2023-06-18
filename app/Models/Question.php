<?php

namespace App\Models;
use App\Models\Answer;
use App\Models\Quiz;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
    protected $fillable =['question','quiz_id'];

    private $limit =3;
    private $order ='DESC';


    public function answers()
    {
        return $this->hasMany(Answer::class);

    }
    public function quiz()
    {
        return $this->belongsTo(Quiz::class);

        
    }
    public function storeQuestion($data)
    {
        $data['quiz_id']=$data['quiz'];
        return \App\Models\Question::create($data);

    }

    public function getQuestions()
    {
        return \App\Models\Question::orderBy('created_at',$this->order)->with('quiz')->paginate($this->limit);


    }

    public function getQuestionById($id)
    {
        return  \App\Models\Question::find($id);

    } 

    public function findQuestion($id)
    {
        return  \App\Models\Question::find($id);
    }


    public function updateQuestion($id,$data)
    {
        $question =Question::find($id);
        $question->question=$data['question'];
        $question->quiz_id =$data['quiz'];
        $question->save();
        return $question;

    }

    public function deleteQuestion($id)
    {
        \App\Models\Question::where('id',$id)->delete();

    }


}
