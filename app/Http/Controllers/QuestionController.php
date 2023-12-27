<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' =>['index']]);
    }

    /* public function index(){
        if(!Auth::user()->is_admin){
            abort(403,'only admins can delete contactForms');
        }
        $contactForms = contactForm::latest()->get();
        return view('contactForm.index',compact('contactForms'));
    }

    public function create(){
        return view('contactForm.create');
    }

    public function store(Request $request){
        $validate = $request->validate([
            'name' =>'required|min:5',
            'email' =>'required|email',
            'message' => 'required|min:10'
        ]);
        $contactForm = new contactForm();
        $contactForm->name = $validate['name'];
        $contactForm->email = $validate['email'];
        $contactForm->message = $validate['message'];
        $contactForm->status = 'new';
        $contactForm->save();
        return redirect()->route('home')->with('success', "Question made Successfully");
    }

    public function show($id){
        $contactForm = contactForm::findOrFail($id);
        return view('contactForm.show', compact('contactForm'));
    }

    public function edit(){
            abort(404,'nothing here');
    }

    public function update(){
        abort(404,'nothing here');
    }

    public function destroy($id){
        if(!Auth::user()->is_admin){
            abort(403,'only admins can delete contactForms');
        }
        $contactForm = contactForm::findOrFail($id);
        $contactForm->delete();
        return redirect()->route('contactForm.index')->with('success', 'contactForm deleted');
    } */
}
