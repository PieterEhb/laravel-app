<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\question;
use App\Models\questioncategory;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index']]);
        $this->middleware('admin',['except'=>['index','create','store']]);
    }

    public function adminIndex()
    {
        $questions = question::where('status', '=', 'shown')->latest()->get();
        $questioncategories = questioncategory::all();
        //dd($questions);
        return view('faq.index', compact('questions','questioncategories'));
    }

    public function index()
    {
        $questions = question::where('status', '=', 'shown')->latest()->get();
        $questioncategories = questioncategory::all();
        //dd($questions);
        return view('faq.index', compact('questions','questioncategories'));
    }

    public function create()
    {
        $questioncategeories = questioncategory::get();
        return view('faq.create', compact('questioncategeories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'question' => 'required|min:4',
            'response' => 'required|min:4',
            'status' => 'in:shown,notShown|required',
            'category' => 'required|exists:questioncategories,id'
        ]);
        $question = new question();
        $question->question = $validated['question'];
        $question->question = $validated['response'];
        $question->category_id = $validated['category'];
        $question->user_id = Auth::user()->id;
        $question->status = 'new';
        $question->save();
        return redirect()->route('faq.index')->with('success', "Question made Successfully");
    }

    public function show($id)
    {
        $question = question::findOrFail($id);
        return view('faq.show', compact('question'));
    }

    public function edit($id)
    {
        $question = question::findOrFail($id);
        if(!Auth::user()->is_admin){
            abort(403);
        }
        $questioncategeories = questioncategory::get();
        return view('faq.edit', compact('question','questioncategeories'));
    }

    public function update(Request $request, $id)
    {
        $question = question::findOrFail($id);
        $validated = $request->validate([
            'question' => 'required|min:3',
            'response' => 'required|min:2',
            'category' => 'required|exists:questioncategories,id',
            'status' => 'in:shown,notShown|required'
        ]);
        $question->question = $validated['question'];
        $question->response = $validated['response'];
        $question->category_id = $validated['category'];
        $question->status = $validated['status'];
        $question->save();
        return redirect()->route('faq.index')->with('success', "Question Answered Successfully");
    }

    public function destroy($id)
    {
        if (!Auth::user()->is_admin) {
            abort(403, 'only admins can delete questions');
        }
        $question = question::findOrFail($id);
        $question->delete();
        return redirect()->route('faq.index')->with('success', 'question deleted');
    }
}
