<?php

namespace App\Models;
use App\Models\Question;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class quiz extends Model
{
    use HasFactory;
    /**
     * Summary of fillable
     * @var array
     */
    protected $fillable =['name','description','minutes'];
    /**
     * Summary of questions
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function questions()

    {
        return $this->hasMany(Question::class);

    }

    /**
     * Summary of storeQuiz
     * @param mixed $data
     * @return mixed
     */
    public function storeQuiz($data)
    {
        return Quiz::create($data);
    }

    /**
     * Summary of allQuiz
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function allQuiz()
    {
        return Quiz::all();
    }


    /**
     * Summary of getQuizById
     * @param mixed $id
     * @return mixed
     */
    public function getQuizById($id){


        return Quiz::find($id);

    }
    

    /**
     * Summary of updateQuiz
     * @param mixed $data
     * @param mixed $id
     * @return mixed
     */
    public function updateQuiz($data,$id){


        return Quiz::find($id)->update($data);
        
    }

    public function deleteQuiz($id)

    {
        return Quiz::find($id)->delete();
        


    }
}
