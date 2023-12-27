<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\userinfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['profile']]);
    }

    public function profile($id)
    {
        $user = User::where('id', '=', $id)->first();
        return view('user.profile', compact('user'));
    }

    public function edit($userId)
    {

        $user = User::where('id', '=', $userId)->first();

        //lookup userinfo
        $userinfo = userinfo::where('user_id', '=', $user->id)->first();

        if ($userinfo == null) {
            $userinfo = new userinfo();
            $userinfo->user_id = $user->id;
            $userinfo->save();
            error_log('added record');
        }
        return view('user.edit', compact('user'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();
        $userinfo = userinfo::where('user_id','=',$user->id)->first();
        
        $validated = $request->validate(
            [
                'birthday' => 'required|min:3',
                'bio' => 'required|min:20'
            ]
        );
        $userinfo->birthday = $validated['birthday'];
        $userinfo->bio = $validated['bio'];
        $userinfo->save();
        return redirect()->route('user.profile', $user->id)->with('success', "Profile Changed Successfully");
        // return view('posts.index');

    }

    public function changePassword($id)
    {
        $user = User::where('id', '=', $id)->first();
        return view('auth.changePassword', compact('user'));
    }

    public function changePasswordSave($userId, Request $request)
    {
        if($userId != Auth::user()->id){
            abort(403,'Not authorized');
        }
        $validated = $request->validate([
            'current_password' => 'required|string',
            'new_password' => 'required|confirmed|min:8|string'
        ]);
        $auth = Auth::user();

        // The passwords matches
        if (!Hash::check($validated['current_password'], $auth->password)) {
            return back()->with('error', "Current Password is Invalid");
        }

        // Current password and new password same
        if (strcmp($validated['current_password'], $validated['new_password']) == 0) {
            return redirect()->back()->with("error", "New Password cannot be same as your current password.");
        }

        $user =  User::find($auth->id);
        $user->password =  Hash::make($validated['new_password']);
        $user->save();
        return redirect()->route('user.profile', $user->id)->with('success', "Password Changed Successfully");
    }
}
