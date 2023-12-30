<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\comment;
use App\Models\reports;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function PHPUnit\Framework\isEmpty;

class ReportsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => []]);
    }

    public function reportComment($commentId)
    {
        $comment = comment::findOrfail($commentId);
        $report = reports::where('comment_id','=',$commentId)->where('user_id', '=', Auth::user()->id)->first();
        
        if ($report == null) {
            $report = new reports();
            $report->user_id = Auth::user()->id;
            $report->comment_id = $commentId;
            $report->save();
            $comment->is_reported=1;
            $comment->save();
        } 

        return back();
    }
}
