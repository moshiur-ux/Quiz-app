@extends('backend.layouts.master')

   @section('title','Update question')

   @section('content')



    <div class="span9">

      <div class="content">

      @if(Session::has('message'))
            <div class="alert alert-success" role="alert">
            {{Session::get('message')}}

             </div>
           
            @endif
 
            


      <form action="{{route('question.update',[$question->id])}}" method="POST">@csrf
   {{method_field('PUT')}}

        <div class="module">

            <div class="module-head">


              <h3>Update question</h3>

            </div>

            <div class="module-body">


<div class="controls-group">

<label class="control-label">Choose Quiz</label>

<div class="controls">
    <select name="quiz" class="span8">
        @foreach(App\Models\quiz::all() as $quiz)

        <option value ="{{$quiz->id}}"

        @if($quiz->id==$question->quiz_id)selected
        @endif

        
        >{{$quiz->name}}


        </option>


        @endforeach


</select>

</div>

</div>

          

            <div class="controls-group">

            <label class="control-label" for="question">Question name</label>

            <div class="controls">

            <input  type="text" name="question" class="span8" placeholder="Name of a quiz" value="{{$question->question}}">
             
                             @error('question')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
  

</div>
<div class="controls-group">

<label class="control-label" for="options">options</label>

<div class="controls">

@foreach($question->answers as $key=>$answer) 

<input  type="text" name="options[]" class="span7"  value="{{$answer->answer}}"   required="">
<input type="radio" name="correct_answer" value="{{$key}}" @if($answer->is_correct){{'checked'}}@endif>
<span>Is correct answer</span>

@endforeach

</div>
 
                 @error('question')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror


</div>



<div class="controls-group">
    <div class="controls">

<button type="submit" class="btn  btn-success">Submit</button>

</div>

</div>

</div>

</div>






</form>

         </div>

    </div>

   @endsection
