@extends('backend.layouts.master')
    
     @section('title','create user')

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


              <h3>Create user</h3>

            </div>

            <div class="module-body">

           <form action=" {{route('user.store')}}" method="POST">@csrf
            <div class="controls-group">

            <label class="control-label" for="name">Full Name</label>

            <div class="controls">

            <input  type="text" name="name" class="span8 @error('name') border-red @enderror" placeholder="bio" value="{{old('name')}}">
             

</div>
                             @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
  

</div>




<div class="control-group">

<label class="control-label">Email</label>
<div class="controls">

<input  type="email" name="email" class="span8"  value="{{old('name')}}">

</div>
 
                 @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror


</div>
<div class="control-group">

<label class="control-label">password</label>
<div class="controls">

<input  type="text" name="password" class="span8" value="{{old('name')}}">

</div>
 
                 @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror


</div>

<div class="control-group">

<label class="control-label">Address</label>
<div class="controls">

<input  type="text" name="address" class="span8"  value="{{old('name')}}">

</div>
 
                 @error('address')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror


</div>
<div class="control-group">

<label class="control-label">phone</label>
<div class="controls">

<input  type="number" name="phone" class="span8"  value="{{old('name')}}">

</div>
 
                 @error('phone')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror


</div>


<div class="controls">

<button type="submit" class="btn  btn-success">Create user</button>


</div>

</form>

</div>

</div>

        </div>




</form>

         </div>

    </div>





@endsection       