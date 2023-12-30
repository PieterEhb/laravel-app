@extends('layouts.admin')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card border-dark mb-2">
                <div class="card-header" style="color: orange">
                    <h3>FAQ</h3>
                </div>
                <div class="card-body row">
                    <div class="col">
                        <a class="btn btn-warning" href="{{route('faq.create')}}">create question</a>
                    </div>
                    <div class="col text-end">
                        <a class="btn btn-warning" href="{{route('faqcategories.create')}}">create question category</a>
                    </div>
                </div>
            </div>
            <div class="card border-warning mb-2">
                <div class="card-header " style="color: orange;border-bottom: 1px solid orange;">FAQ</div>
                @foreach ($questioncategories as $category )
                <div class="card-body">
                    <div class="row mb-1">
                        <div class="col">
                            <h3 style="color: orange">{{ $category->name}}</h3>
                        </div>
                        <div class="col text-end me-3">
                            <a class="btn btn-warning" href="{{route('faqcategories.edit', $category->id)}}">edit</a>
                        </div>
                    </div>
                    @foreach ( $questions->where('category_id', $category->id) as $question )
                    <div class="row">
                        <div class="col">
                            <div class="card border-warning  mb-2 ">
                                <div class="card-body ">
                                    <div class="row mb-1">
                                        <div class="col">
                                        <p class="mb-1" style="color: orange"><strong>{{$question->question}}</strong></p>
                                        </div>
                                        <div class="col text-end">
                                            <a class="btn btn-warning" href="{{route('faq.edit', $question->id)}}">edit</a>
                                        </div>
                                        
                                        <p class="mb-1">{{$question->response}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                        @endforeach
                        <hr style="color:orange">
                    </div>
                    @endforeach

                </div>

            </div>
        </div>
    </div>

    @endsection