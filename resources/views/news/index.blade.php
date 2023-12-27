@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">News</div>
                @foreach ($newsPosts as $newspost )
                <div class="card-body">
                    <h3><a href="{{route('news.show', $newspost->id)}}">{{ $newspost->title}}</a></h3>
                    <p>{{$newspost->message}}</p>
                    <small>posted by <a href="{{ route('user.profile',$newspost->user_id )}}">{{$newspost->user->name}}</a></small>
                </div>
                @endforeach

            </div>
        </div>
    </div>
</div>

@endsection