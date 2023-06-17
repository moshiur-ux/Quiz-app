@extends('backend.layouts.master')

@section('title','create quiz')

@section('content')


<div class="span9">
        <div class="content">
        @if(Session::has('message'))
          <div class="alert alert-success" role="alert">
          {{Session::get('message')}}

          </div>
        
          @endif

          <div class="module">
            <div class="module-head">
              <h3> All Question</h3>
            </div>
            <div class="module-body">
            
              <table class="table table-striped">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Question</th>
                  <th>Quiz</th>
                  <th>Created</th>
                  <th></th>
                  <th></th>
                  <th></th>

                </tr>
                </thead>
                <tbody>
                  @if(count($questions)>0)
                  @foreach($questions as $key=>$question)
                <tr>
                  <td>{{$key+1}}</td>
                  <td>{{$question->question}}</td>
                  <td>{{$question->quiz?->name}}</td>
                  <td>{{date('F d,Y',strtotime($question->created_at))}}</td>
                  <td>
                    
                  <a  href="{{route('quiz.edit',[$question->id])}}" >

                  <button class="btn btn-primary" type="submit">Edit</button>

                  </a>

                  </td>

                  <td> 

                  <form id="delete-form-{{ $question->id }}" method="POST"  action="{{route('quiz.destroy',[$question->id])}}">@csrf
                    
                  {{method_field('DELETE')}}

                  </form>

                <a  href="#" onclick="if (confirm('Do you want to delete?'))
                
                {

                event.preventDefault(); document.getElementById('delete-form-{{ $question->id }}').submit();

                }
                
                else
                  {
                    event.preventDefault();

                  }
                
                
                ">

              
                

          <button class="btn btn-danger"  value="delete" type="submit">Delete</button>

          
    
                    </a>

                  
                  </td>
                
                </tr>
                @endforeach
                @else
                <td> No question to display</td>
              @endif



                
                
                </tbody>
              </table>

            {{$questions->links()}}





@endsection