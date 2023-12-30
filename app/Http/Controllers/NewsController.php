<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\news;
use App\Models\comment;
use App\Models\like;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
        $this->middleware('admin', ['except' => ['index', 'show']]);
    }

    public function Index()
    {
        $newsPosts = News::where('status','=','released')->latest()->paginate(5);
        return view('news.index', compact('newsPosts'));
    }

    public function adminIndex()
    {
        $newsPosts = News::orderby('status','asc')->latest()->paginate(5);
        return view('news.admin', compact('newsPosts'));
    }
    public function store(Request $request)
    {
        $user = Auth::user();
        /*         if(!$user->is_admin){
            abort(403);
        } */
        //dd($request);
        error_log('we get here');
        $validated = $request->validate([
            'title' => 'required|min:4',
            'message' => 'required|min:4',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'status' => 'in:draft,released|required'
        ]);
        dd($validated);
        if ($image = $validated['image']) {
            $destinationPath = 'storage/app/public/newsimages/';
            $newsImage = "newsimage" . date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $newsImage);
        }
        error_log('we get here 2');
        $newsPost = new news();
        $newsPost->title = $validated['title'];
        $newsPost->message = $validated['message'];
        $newsPost->status = $validated['status'];
        $newsPost->user_id = $user->id;
        $newsPost->image = $newsImage;
        $newsPost->save();
        return redirect()->route('news.adminNews');
    }

    public function create()
    {
        /*         if(!Auth::user()->is_admin){
            abort(403);
        } */
        return view('news.create');
    }

    public function show($id)
    {
        $news = News::findOrFail($id);
        return view('news.show', compact('news'));
    }

    public function adminShow($id)
    {
        $news = News::findOrFail($id);
        return view('news.adminshow', compact('news'));
    }

    public function edit($id)
    {
        $news = News::findOrFail($id);
        if (!Auth::user()->is_admin) {
            abort(403);
        }
        return view('news.edit', compact('news'));
    }

    public function update($id, Request $request)
    {

        $newsPost = news::findOrFail($id);
        $user = Auth::user();
        /*         if(!$user->is_admin){
            abort(403);
        } */
        
        $validated = $request->validate([
            'title' => 'required|min:5',
            'message' => 'required|min:20',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'status' => 'in:draft,released|required'
        ]);
        if (Arr::exists($validated, 'image')) {
            /*Delete old image*/
            $oldImage = $newsPost->image;
            // dd($oldImage);
            Storage::delete('/storage/app/public/newsimages/' . $oldImage);
            /*Set new image*/
            $image = $validated['image'];
            $destinationPath = 'storage/app/public/newsimages/';
            $newsImage = "newsimage" . date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $newsImage);
            $newsPost->image = $newsImage;
        }
        $newsPost->title = $validated['title'];
        $newsPost->message = $validated['message'];
        $newsPost->status = $validated['status'];
        $newsPost->user_id = $user->id;
        $newsPost->save();
        return redirect()->route('news.adminNews', $id);
    }

    public function destroy($id)
    {
        if (!Auth::user()->is_admin) {
            abort(403, 'only admins can delete posts');
        }
        $news = news::findOrFail($id);
        //delete file from storage
        $comment = Comment::where('news_id', '=', $news->id)->delete();
        $likes = Like::where('news_id','=',$news->id)->delete();
        $news->delete();
        return redirect()->route('news.adminNews');
    }
}
