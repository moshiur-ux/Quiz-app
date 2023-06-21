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
              <h3> User information</h3>
            </div>
            <div class="module-body">
            
              <table class="table table-striped">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Password</th>
                  <th>Address</th>
                  <th>Phone</th>
                   <th></th>
                   <th></th>
                   <th></th>
                   <th></th>
                   <th></th>
                   <th></th>
                  
    
                </tr>
                </thead>
                <tbody>
                  @if(count($users)>0)
                  @foreach($users as $key=>$user)
                <tr>
                  <td>{{$key+1}}</td>
                  <td>{{$user->name}}</td>
                  <td>{{$user->email}}</td>
                  <td>{{$user->visible_password}}</td>
                  <td>{{$user->address}}</td>
                  <td>{{$user->phone}}</td>

                  <td>
                    
                  <a  href="{{route('user.edit',[$user->id])}}" >

                  <button class="btn btn-primary" type="submit">Edit</button>

                  </a>

                  </td>

                  <td> 

                  <form id="delete-form-{{ $user->id }}" method="POST"  action="{{route('user.destroy',[$user->id])}}">@csrf
                    
                  {{method_field('DELETE')}}

                  </form>


                <a  href="#" onclick="if (confirm('Do you want to delete?'))
                
                {

                event.preventDefault(); document.getElementById('delete-form-{{ $user->id }}').submit();

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
                <td> No user to display</td>


              @endif



                
                
                </tbody>
              </table>


              <div class="pagination pagination-centred">

              {{$users->links()}}

                </div>


                </div>



                <div>


                <div>


                
           

                

@endsection