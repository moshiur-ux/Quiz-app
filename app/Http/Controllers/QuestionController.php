<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\quiz;
use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $questions =(new Question)->getQuestions();
        return view('backend.question.index',compact('questions'));


        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $quizes=(new quiz)->allQuiz();
        return view('backend.question.create',compact('quizes'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data=$this->validateForm($request);
        $question =(new Question)->storeQuestion($data);
        $Answer=(new Answer)->storeAnswer($data,$question);
        
        return redirect()->route('question.create')->with('message','Question created successfully');

    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request,string $id)
    {
        $question =(new Question)->getQuestionById($id);
        return view('backend.question.show',compact('question'));
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $question=(new Question)->findQuestion($id);
        return view('backend.question.edit',compact('question'));

        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data =$this->validateForm($request);
        $question =(new Question)->updateQuestion($id,$request);
        $answer=(new Answer)->updateAnswer($request,$question);
        return redirect()->route('question.show',$id)->with('message','Question updated successfully!');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        (new Answer)->deleteAnswer($id);
        (new Question)->deleteQuestion($id);
        return redirect()->route('question.index')->with('message','Question deleted successfully!');
        
        
    }

    public function validateForm($request)
    {
        return $this->validate($request, [
            'quiz'=>'required',
            'question'=>'required|min:3',
            'options'=>'bail|required|array|min:3',
            'options.*'=>'bail|required|string|distinct',
            'correct_answer'=>'required'



        ]);
    }
}
