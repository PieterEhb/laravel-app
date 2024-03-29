<?php

namespace App\Http\Controllers;

use App\Models\comment;
use App\Models\contactform;
use Illuminate\Http\Request;
use App\Models\news;
use App\Models\question;
use App\Models\reports;
use App\Models\Speedrun;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
/*     public function __construct()
    {
        $this->middleware('auth');
    }
 */
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $newsPosts = News::where('status','=','released')->latest()->take(5)->get();
        $speedruns = Speedrun::where('status', '=', 'accepted')->where('category','=','any%')->orderBy('time_seconds', 'asc')->take(5)->get();
        $speedrunsDefault = Speedrun::where('status', '=', 'accepted')->where('category','=','default settings')->orderBy('time_seconds', 'asc')->take(5)->get();
        return view('home',compact('newsPosts', 'speedruns','speedrunsDefault'));
    }

    public function about()
    {
        return view('other.about');
    }

    public function adminIndex(){
        $this->middleware('auth', ['except' => []]);
        $this->middleware('admin', ['except' => []]);
        $drafts = News::where('status','=','draft')->latest()->get();
        $releasedPosts = News::where('status','=','released')->latest()->take(2)->get();
        $questions = question::latest()->take(5)->get();
        $contactforms = contactform::where('status','=','new')->latest()->take(5)->get();
        $reportedcomments = comment::where('is_reported','=','1')->get();
        return view('adminhome',compact('drafts','releasedPosts','questions','contactforms','reportedcomments'));
    }
}
