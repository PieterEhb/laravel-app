<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\comment;
use App\Models\contactform;
use App\Models\news;
use App\Models\Speedrun;
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

    /*function exists incase register new user breaks*/
    protected function createUserinfo($userId)
    {
        //lookup userInfo
        $userInfo = userInfo::where('user_id', '=', $userId)->first();

        if ($userInfo == null) {
            $userInfo = new userInfo();
            $userInfo->user_id = $userId;
            $userInfo->save();
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
        if ($userId != Auth::user()->id) {
            abort(403, 'you are not allowed here');
        }
        $user = User::where('id', '=', $userId)->first();
        $this->createUserinfo($user->id);
        return view('user.edit', compact('user'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();
        $userInfo = userInfo::where('user_id', '=', $user->id)->first();
        $validated = $request->validate(
            [
                'birthday' => 'required',
                'bio' => 'required|min:4',
                'avatar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
            ]
        );
        if (Arr::exists($validated, 'avatar') && $validated['avatar'] != null) {
            /*Delete old image*/
            $oldImage = $userInfo->image;
            Storage::delete($oldImage);
            /*Set new image*/
            $image = $validated['avatar'];
            $destinationPath = 'storage/app/public/avatarImages/';
            $avatar = "avatar" . date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $avatar);
            $userInfo->image = $avatar;
        }
        $userInfo->birthday = $validated['birthday'];
        $userInfo->bio = $validated['bio'];
        $userInfo->save();
        return redirect()->route('user.profile', $user->id)->with('success', "Profile Changed Successfully");
    }

    public function changePassword($id)
    {
        $user = User::where('id', '=', $id)->first();
        return view('auth.changePassword', compact('user'));
    }

    public function changePasswordSave($userId, Request $request)
    {
        if ($userId != Auth::user()->id) {
            abort(403, 'Not authorized');
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

    public function index()
    {
        $users = User::whereNotIn('id', [1,2])->get();
        return view('user.index', compact('users'));
    }

    public function destroy($id)
    {
        if(Auth::user()->id != $id){
            if(!Auth::user()->is_admin){
                abort(403,'you can not do this');
            }
            
        };
        $user = User::findOrFail($id);
        $userInfo = Userinfo::where('user_id','=',$id);
        /*update linked comments to deleted*/
        $comments = comment::where('user_id','=',$user->id)->update(['user_id'=>1]);
        /*update linked news to deleted*/
        $news = news::where('user_id','=',$user->id)->update(['user_id'=>1]);
        /*update linked contactForms to deleted*/
        $contactforms = contactform::where('user_id','=',$user->id)->update(['user_id'=>1]);
        /*delete userInfo*/
        if($userInfo != null){
            //$oldImage = $userInfo->image;
            //Storage::delete($oldImage);
            $userInfo->delete();
        }
        /*delete speedruns*/
        $speedruns = Speedrun::where('user_id','=',$user->id)->delete();
        if(Auth::user()->is_admin && Auth::user()->id != $id){
            $user->delete();
            return redirect()->route('user.index');
        }else{
            $user->delete();
            return redirect()->route('home');
        }

    }
    
    public function updateRole($id){
        if(!Auth::user()->is_admin || Auth::user()->id == $id){
            abort(403,'you can not do this');
        };
        $user = User::findOrFail($id);
        if(!$user->is_admin){
            $user->is_admin = 1;
            $user->save();
        }else{
            $user->is_admin = 0;
            $user->save();
        }
        return redirect()->route('user.index');
    }
}
