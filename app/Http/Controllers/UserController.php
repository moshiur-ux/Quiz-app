<?php

namespace App\Http\Controllers;

 use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $users=(new User)->allUsers();
         return view('backend.user.index',compact('users'));
         
         
    
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,[

            'name'=>'required',
            'email'=>'required|unique:users',
            'password'=>'required|min:5'
            




        ]);

        $user = (new User)->storeUser($request->all());

        return redirect()->route('user.index')->with('message','User created successfully!');



    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, string $id)
    { 
        $user =(new User)->findUser($id);
        return view('backend.user.edit',compact('user'));

        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request,[

            'name'=>'required'

        ]);

        $user =(new User)->updateUser($request->all(),$id);
        return redirect()->route('user.index')->with('message','user update successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

    


       $user=(new User)->deleteUser($id);
       return redirect()->route('user.index')->with('message','Question deleted successfully!');
        
        
    }
}
