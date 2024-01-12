<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\contactform;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContactformController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' =>['create','store']]);
        $this->middleware('admin', ['except' =>['create','store']]);
    }

    public function index(){
        if(!Auth::user()->is_admin){
            abort(403,'only admins can see contactForms');
        }
        $contactforms = contactForm::latest()->get();
        return view('contactForm.index',compact('contactforms'));
    }

    public function create(){
        return view('contactForm.create');
    }

    public function store(Request $request){
        $validate = $request->validate([
            'name' =>'required|min:3',
            'email' =>'required|email',
            'message' => 'required|min:5'
        ]);
        $contactForm = new contactForm();
        $contactForm->name = $validate['name'];
        $contactForm->email = $validate['email'];
        $contactForm->message = $validate['message'];
        $contactForm->status = 'new';
        $contactForm->save();
        return redirect()->route('home');
    }

    public function show($id){
        $contactform = contactForm::findOrFail($id);
        return view('contactform.show', compact('contactform'));
    }

    public function edit($id){
        $contactform = contactForm::findOrFail($id);
        return view('contactform.edit', compact('contactform'));
    }

    public function update($id,Request $request){
        $contactform = contactForm::findOrFail($id);
        $validate = $request->validate([
            'response' => 'required|min:10'
        ]);
        $contactform->response = $validate['response'];
        $contactform->status = 'finished';
        $contactform->user_id = Auth::user()->id;
        $contactform->save();
        return redirect()->route('contactform.index');
    }

    public function destroy($id){
        if(!Auth::user()->is_admin){
            abort(403,'only admins can delete contactForms');
        }
        $contactForm = contactForm::findOrFail($id);
        $contactForm->delete();
        return redirect()->route('contactform.index');
    }
}
