<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Handlers\ImageUploadHandler;
use Auth;
class UsersController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth',['except'=>['show']]);
    }

    public function show(User $user){
        return view('users.show',compact('user'));
    }

    public function update(UserRequest $request,ImageUploadHandler $upload,User $user){
        $this->authorize('update',$user);
        $data=$request->all();

        if($request->avatar){
            $result=$upload->save($request->avatar,'avatars',$user->id,362);
            if($result)
            {
                $data['avatar']=$result['path'];
            }
        }
        $user->update($data);
        return redirect()->route('users.show',$user)->with('success','个人资料更新完成');
    }

    public function edit(User $user){
        $this->authorize('update',$user);
        return view('users.edit',compact('user'));
    }
}
