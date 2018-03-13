<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Auth;
class UsersController extends Controller
{
    //
    public function show(User $user){
        return view('users.show',compact('user'));
    }

    public function update(UserRequest $request,User $user){
        $user->update($request->all());
        return redirect()->route('users.show',$user)->with('success','个人资料更新完成');
    }

    public function edit(User $user){
        return view('users.edit',compact('user'));
    }
}
