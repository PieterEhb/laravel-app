<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\Speedrun;
use Illuminate\Http\Request;

class SpeedrunController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index','show']]);
        $this->middleware('auth', ['except' => ['index','show','create']]);
    }

    public function adminIndex()
    {
        $acceptedSpeedruns = Speedrun::where('status', '=', 'accepted')->orderBy('time_seconds', 'asc')->get();
        $toReviewSpeedruns = Speedrun::where('status', '=', 'commited')->orderBy('time_seconds', 'asc')->get();
        return view('speedrun.adminindex', compact('toReviewSpeedruns', 'acceptedSpeedruns'));
    }
    public function index()
    {
        $speedruns = Speedrun::where('status', '=', 'accepted')->orderBy('time_seconds', 'asc')->get();
        return view('speedrun.index', compact('speedruns'));
    }
    public function create()
    {
        return view('speedrun.create');
    }
    public function store(Request $request)
    {
        $user = Auth::user();
        $validated = $request->validate([
            'info' => 'required|min:4',
            'videoLink' => 'required',
            'videoTitle' => 'required|min:4',
            'category' => 'in:any%,default settings|required',
            'time' => 'required',
            'gameVersion' => 'required'
        ]);
        $speedrun = new Speedrun();
        $speedrun->user_id = $user->id;
        $speedrun->info = $validated['info'];
        $speedrun->videoLink = $validated['videoLink'];
        $speedrun->videoTitle = $validated['videoTitle'];
        $speedrun->category = $validated['category'];
        $speedrun->game_version = $validated['gameVersion'];
        $speedrun->time_seconds = $validated['time'];
        $speedrun->status = 'commited';
        $speedrun->save();
        return redirect()->route('speedrun.index');
    }
    public function edit($id)
    {
        $speedrun = Speedrun::findOrFail($id);
        if (!Auth::user()->is_admin) {
            abort(403);
        }
        return view('speedrun.edit', compact('speedrun'));
    }
    public function update($id, Request $request)
    {
        $speedrun = Speedrun::findOrFail($id);
        $validated = $request->validate([
            'info' => 'required|min:4',
            'videoLink' => 'required|active_url',
            'videoTitle' => 'required|min:4',
            'category' => 'in:any%,default settings|required',
            'time' => 'required',
            'gameVersion' => 'required',
            'status' => 'required|in:commited,accepted,rejected'
        ]);
        $speedrun->info = $validated['info'];
        $speedrun->videoLink = $validated['videoLink'];
        $speedrun->videoTitle = $validated['videoTitle'];
        $speedrun->category = $validated['category'];
        $speedrun->game_version = $validated['gameVersion'];
        $speedrun->time_seconds = $validated['time'];
        $speedrun->status = $validated['status'];
        $speedrun->save();
        return redirect()->route('speedrun.adminIndex');
    }
    public function show($id)
    {
        $speedrun = Speedrun::findOrFail($id);
        return view('speedrun.show', compact('speedrun'));
    }


    public function adminShow($id)
    {
        $speedrun = Speedrun::findOrFail($id);
        return view('speedrun.adminshow', compact('speedrun'));
    }
    public function destroy($id)
    {
        if (!Auth::user()->is_admin) {
            abort(403, 'only admins can delete runs');
        }
        $speedrun = Speedrun::findOrFail($id);
        $speedrun->delete();
        return redirect()->route('speedrun.Index');
    }
}
