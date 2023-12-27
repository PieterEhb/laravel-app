<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\comment;
use App\Models\news;


class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => []]);
    }

    public function comment($newsId)
    {
        $news = news::findOrFail($newsId);
        return view('comment.create', compact('news'));
    }

    public function add(Request $request, $newsId)
    {
        $newsPost = news::findOrFail($newsId);
        $validated = $request->validate(
            [
                'message' => 'required|min:5'
            ]
        );
        $comment = new Comment();
        $comment->message = $validated['message'];
        $comment->user_id = Auth::user()->id;
        $comment->news_id = $newsId;
        $comment->save();
        return redirect()->route('news.show',$newsId);
    }
}
