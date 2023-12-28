@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">FAQ</div>
                @foreach ($questioncategories as $category )
                <div class="card-body">
                    <h3>{{ $category->name}}</h3>
                    @foreach ( $questions->where('category_id', $category->id) as $question )
                    <p>question: {{$question->question}}</p>
                    <p>answer: {{$question->response}}</p>
                    <small>asked by <a href="{{ route('user.profile',$question->user_id )}}">{{$question->user->name}}</a></small>
                    <br>
                    <small>answered by <a href="{{ route('user.profile',$question->response_by )}}">{{$question->responder->name}}</a></small>
                    <a href="{{ route('faq.edit',$question->id )}}">edit</a>
                    @endforeach
                    <hr>
                </div>
                @endforeach

            </div>
            <div class="card">
                <div class="card-header">FAQ</div>
                <div class="card-body">
                   <a href="{{route('faq.create')}}"><h4>Ask Question</h4></a> 
                </div>

            </div>

        </div>
    </div>
</div>

@endsection