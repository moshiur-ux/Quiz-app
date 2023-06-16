<?php

namespace App\Http\Controllers;

use App\Models\quiz;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request )
    {
        $quizzes =(new Quiz)->allQuiz();
        return view ('backend.quiz.index',compact('quizzes'));

        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        return view('backend.quiz.create');

        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    { 
        $data= $this->validateForm($request);
        $quiz  =(new Quiz)->storeQuiz($data);

        return redirect()->back()->with('message','Quiz created Succesfully');
        


             
    }

    /**
     * Display the specified resource.
     */
    public function show( Request $request ,string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, string $id)
    {
        $quiz =(new Quiz)->getQuizById($id);
        return view('backend.quiz.edit',compact('quiz'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         
        $data=$this->validateForm($request);
        $quiz =(new Quiz)->updateQuiz($data,$id);

        return redirect(route('quiz.index'))->with('message','Quiz updated successfully');     

        //return redirect()->back()->with('message','Quiz updated Succesfully');
        




        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        (new Quiz)->deleteQuiz($id);

       return redirect(route('quiz.index'))->with('message','Quiz deleted successfully'); 


    }

    public function validateForm($request)
    {
        return $this->validate($request,[

        'name'=>'required|string',
        'description'=>'required|min:3|max:500',
        'minutes'=>'required|integer'



    ]);

    }
}
