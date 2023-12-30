@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card border-warning bg-dark mb-2">
                <div class="card-header "style="color: orange;border-bottom: 1px solid orange;">FAQ</div>
                @foreach ($questioncategories as $category )
                <div class="card-body text-white">
                    <h3 style="color: orange">{{ $category->name}}</h3>
                    @foreach ( $questions->where('category_id', $category->id) as $question )
                    <div class="row">
                        <div class="col">
                            <div class="card border-warning bg-dark  mb-2 ">
                                <div class="card-body ">
                                    <p class="mb-1"style="color: orange"><strong>{{$question->question}}</strong></p>
                                    <p class="text-white mb-1">{{$question->response}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <hr style="color:orange">
                </div>
                @endforeach

            </div>
            <div class="card border-warning bg-dark">
                <div class="card-header" style="color: orange">Ask us</div>
                <div class="card-body">
                   <a class="btn btn-warning" href="{{route('contactform.create')}}"><h4>Ask Question</h4></a> 
                </div>

            </div>

        </div>
    </div>
</div>

@endsection