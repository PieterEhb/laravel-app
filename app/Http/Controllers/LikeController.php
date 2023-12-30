<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Like;
use App\Models\news;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function like($newsId){
        $news = news::findOrFail($newsId);
        $like = Like::where('news_id','=', $newsId)->where('user_id', '=', Auth::user()->id)->first();
        if($like != null){
            abort(403, 'cannot like post more then once');
        }

        $like = new like;
        $like->news_id = $newsId;
        $like->user_id = Auth::user()->id;
        $like->save();
        return back();
    }
}
