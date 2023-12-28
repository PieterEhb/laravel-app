<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\news;
use App\Models\comment;


class NewsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' =>['index','show']]);
        $this->middleware('admin',['except'=>['index','show']]);
    }

    public function index(){
        $newsPosts = News::latest()->get();
        return view('news.index',compact('newsPosts'));
    }
    public function store(Request $request){
        $user = Auth::user();
/*         if(!$user->is_admin){
            abort(403);
        } */
        $validate = $request->validate([
            'title' =>'required|min:5',
            'message' => 'required|min:20'
        ]);
        $newsPost = new news();
        $newsPost->title = $validate['title'];
        $newsPost->message = $validate['message'];
        $newsPost->user_id = $user->id;
        $newsPost->image_id = 0;
        $newsPost->save();
        return redirect()->route('news.index')->with('success', "Post made Successfully");
    }

    public function create(){
/*         if(!Auth::user()->is_admin){
            abort(403);
        } */
        return view('news.create');
    }

    public function show($id){
        $news = News::findOrFail($id);
        return view('news.show', compact('news'));
    }

    public function edit($id){
        $news = News::findOrFail($id);
        if(!Auth::user()->is_admin){
            abort(403);
        }
        return view('news.edit', compact('news'));
    }

    public function update($id, Request $request){
        $newsPost = news::findOrFail($id);
        $user = Auth::user();
/*         if(!$user->is_admin){
            abort(403);
        } */
        $validate = $request->validate([
            'title' =>'required|min:5',
            'message' => 'required|min:20'
        ]);
        $newsPost->title = $validate['title'];
        $newsPost->message = $validate['message'];
        $newsPost->user_id = $user->id;
        $newsPost->image_id = 0;
        $newsPost->save();
        return redirect()->route('news.index')->with('success', "Post made Successfully");
    }

    public function destroy($id){
        if(!Auth::user()->is_admin){
            abort(403,'only admins can delete posts');
        }
        $news = news::findOrFail($id);
        $comment = Comment::where('news_id','=',$news->id)->delete();
        $news->delete();
        return redirect()->route('news.index')->with('success', 'post deleted');
    }
    
}
