<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\news;

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
        $newsPosts = News::latest()->take(5)->get();
        return view('home',compact('newsPosts'));
    }
}
