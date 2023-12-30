<?php

namespace App\Http\Controllers;

use App\Models\contactform;
use Illuminate\Http\Request;
use App\Models\news;
use App\Models\question;

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
        return view('home',compact('newsPosts'));
    }

    public function about()
    {
        return view('other.about');
    }

    public function adminIndex(){
        $this->middleware('auth', ['except' => []]);
        $this->middleware('admin', ['except' => []]);
        $drafts = News::where('status','=','draft')->latest()->get();
        $questions = question::latest()->take(5)->get();
        $contactforms = contactform::where('status','=','new')->latest()->take(5)->get();
        return view('adminhome',compact('drafts','questions','contactforms'));
    }
}
