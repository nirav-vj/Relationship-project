<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('user/index',compact('users'));
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {

        $user  = new User;
        $user->user_name = $request['user_name'];
        $user->email = $request['email'];
        $user->password = $request['password'];
        $user->save();

        return redirect('users');
    }
    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(user $user,$id)
    {
        $user =  User::find($id);
        return view('user/edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, User $role,$id)
    {
        $user =  User::find($id);
        $user->user_name = $request['user_name'];
        $user->email = $request['email'];
        $user->password = $request['password'];
        $user->save();

        
        return redirect('/users');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $role,$id)
    {
        User::find($id)->delete();
        return redirect()->back();
    }

    public function trash(){
        $users = User::onlyTrashed()->get();
        return view('user/trash',compact('users'));
    }

    public function restore(User $role,$id)
    {
         User::withTrashed()->find($id)->restore();
        return redirect('users');
    }

    public function forcedelete(User $role,$id)
    {
        User::withTrashed()->find($id)->forceDelete();
        return redirect()->back();
    }
}