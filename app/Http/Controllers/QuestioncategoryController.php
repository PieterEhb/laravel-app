<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\questioncategory;
use Illuminate\Http\Request;

class QuestioncategoryController extends Controller
{
    public function index(){

    }

    public function create(){
            $questioncategories = questioncategory::all();
            return view('faqCategory.create', compact('questioncategories'));
    }
    public function store(Request $request){
        $validated = $request->validate([
            'name' => 'required|min:4|unique:questioncategories',
            'status' => 'in:shown,notShown|required',
        ]);
        $questionCategory = new questioncategory();
        $questionCategory->name = $validated['name'];
        $questionCategory->status = $validated['status'];
        $questionCategory->save();
        return redirect()->route('faq.adminFAQ');
    }
    public function edit(){
        
    }
    public function update(){
        
    }
    public function destroy(){
        
    }
}
