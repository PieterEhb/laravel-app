<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Userinfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['profile']]);
    }

    protected function createUserinfo($userId){
        //lookup userinfo
        $userinfo = userinfo::where('user_id', '=', $userId)->first();

        if ($userinfo == null) {
            $userinfo = new userinfo();
            $userinfo->user_id = $userId;
            $userinfo->save();
            error_log('added record');
        }
        return;
    }
    public function profile($id)
    {
        $user = User::where('id', '=', $id)->first();
        $this->createUserinfo($id);
        return view('user.profile', compact('user'));
    }

    public function edit($userId)
    {
        if($userId != Auth::user()->id){
            abort(403,'you are not allowed here');
        }
        $user = User::where('id', '=', $userId)->first();
        $this->createUserinfo($user->id);
        return view('user.edit', compact('user'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();
        $userinfo = userinfo::where('user_id','=',$user->id)->first();
        
        $validated = $request->validate(
            [
                'birthday' => 'required|min:3',
                'bio' => 'required|min:20',
                'avatar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
            ]
        );
        if (Arr::exists($validated,'avatar')) { 
            /*Delete old image*/
            $oldImage=$userinfo->image;
            Storage::delete($oldImage);
            /*Set new image*/
            $image = $validated['avatar'];           
            $destinationPath = 'storage/app/public/newsimages/';
            $avatar = "avatar".date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $avatar);
            $userinfo->image = $avatar;
        }
        $userinfo->birthday = $validated['birthday'];
        $userinfo->bio = $validated['bio'];
        $userinfo->save();
        return redirect()->route('user.profile', $user->id)->with('success', "Profile Changed Successfully");

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
