<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\questioncategory;
use App\Models\question;
use Illuminate\Http\Request;

class QuestioncategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => []]);
        $this->middleware('admin', ['except' => []]);
    }

    public function index()
    {
    }

    public function create()
    {
        $questioncategories = questioncategory::all();
        return view('faqCategory.create', compact('questioncategories'));
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|min:4|unique:questioncategories',
            'status' => 'in:shown,notShown|required',
            'sequence' => 'numeric|gt:0'
        ]);
        $questionCategory = new questioncategory();
        $questionCategory->name = $validated['name'];
        $questionCategory->status = $validated['status'];
        $questionCategory->sequence = $validated['sequence'];
        $questionCategory->save();
        return redirect()->route('faq.adminFAQ');
    }
    public function edit($id)
    {
        $questionCategory = questioncategory::findOrFail($id);
        if (!Auth::user()->is_admin) {
            abort(403);
        }
        $questioncategories = questioncategory::get();
        return view('faqCategory.edit', compact('questionCategory', 'questioncategories'));
    }
    public function update($id, Request $request)
    {
        $questionCategory = questioncategory::findOrFail($id);
        $validated = $request->validate([
            'name' => 'required|min:4|unique:questioncategories',
            'status' => 'in:shown,notShown|required',
            'sequence' => 'numeric|gt:0'
        ]);
        $questionCategory->name = $validated['name'];
        $questionCategory->status = $validated['status'];
        $questionCategory->sequence = $validated['sequence'];
        $questionCategory->save();
        return redirect()->route('faq.adminFAQ');
    }
    public function destroy($id)
    {
        if (!Auth::user()->is_admin) {
            abort(403, 'only admins can delete questions');
        }
        $questionCategory = questionCategory::findOrFail($id);
        $questions = question::where('category_id', '=', $id)->delete();
        $questionCategory->delete();
        return redirect()->route('faq.adminFAQ');
    }
}
