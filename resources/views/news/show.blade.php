@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">News</div>
                
                <div class="card-body">
                    <h3>{{ $news->title}}</h3>
                    <p>{{$news->message}}</p>
                    @if (Auth::user()->is_admin)
                    <a href="{{route('news.edit', $news->id)}}">Edit</a>
                    @endif
                    <br>
                    <a href="{{route('comment.create', $news->id)}}">Comment</a>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection