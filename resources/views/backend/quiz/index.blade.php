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
                          <h3> All Quizes</h3>
                        </div>
                        <div class="module-body">
                        
                          <table class="table table-striped">
                            <thead>
                            <tr>
                              <th>#</th>
                              <th>Name</th>
                              <th>Description</th>
                              <th>Minutes</th>
                              <th></th>
                              <th></th>
                              <th></th>

                            </tr>
                            </thead>
                            <tbody>
                              @if(count($quizzes)>0)
                              @foreach($quizzes as $key=>$quiz)
                            <tr>
                              <td>{{$key+1}}</td>
                              <td>{{$quiz->name}}</td>
                              <td>{{$quiz->description}}</td>
                              <td>{{$quiz->minutes}}</td>

                              <td>
                                <a href="{{route('quiz.question',[$quiz->id])}}">
                                <button class="btn btn-primary" type="submit">View Question</button>
                                </a>


                              </td>
                              <td>
                                
                              <a  href="{{route('quiz.edit',[$quiz->id])}}" >

                              <button class="btn btn-primary" type="submit">Edit</button>

                              </a>

                              </td>

                              <td> 

                              <form id="delete-form-{{ $quiz->id }}" method="POST"  action="{{route('quiz.destroy',[$quiz->id])}}">@csrf
                                
                              {{method_field('DELETE')}}

                              </form>

                            <a  href="#" onclick="if (confirm('Do you want to delete?'))
                            
                            {

                            event.preventDefault(); document.getElementById('delete-form-{{ $quiz->id }}').submit();

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
                            <td> No quiz  to display</td>
                          @endif



                            
                            
                            </tbody>
                          </table>





            @endsection