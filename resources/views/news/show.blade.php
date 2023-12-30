@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card border-warning bg-dark">
                <img src="/storage/app/public/newsimages/{{$news->image}}" class="card-img-top" alt="..." style="height: 200px; object-fit:cover">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <h3 style="color: orange" class="">{{ $news->title}}</h3>
                        </div>
                        <hr class="mt-1">
                    </div>
                    <div class="text-white">
                        {!! $news->message !!}
                    </div>
                    <br>
                    <a class="btn btn-warning" href="{{route('comment', $news->id)}}">Comment</a>
                    @auth
                    @if($news->likes()->where('user_id', '=', Auth::user()->id)->first() != null)
                    @else
                    <a class="btn btn-warning" href="{{route('like',$news->id)}}">like post</a>
                    @endif
                    @endauth
                    <br>
                    <p class="text-white">Post heeft {{ $news->likes()->count() }} likes</p>
                    <hr class="m-2">
                    @foreach ($news->comment->sortByDesc('updated_at') as $comment )
                    <div class="row">
                        <div class="col-md-1"></div>
                        <div class="col-md-11">
                            <div class="card border-warning bg-dark  mb-2 ">
                                <div class="card-body p-2">
                                    <p class="text-white">{{$comment->message}}</p>
                                    <div class="row">
                                        <div class="col">
                                            <small style="color: gray;">comment by <a style="color: orange;text-decoration:none" href="{{route('user.profile', $comment->user->id)}}">{{$comment->user->name}}</a> made on {{$comment->updated_at->format('d/m/Y')}}</small>
                                            @auth
                                            <br>
                                            @if (Auth::user()->id == $comment->user->id)
                                            <small><a class="btn btn-warning" href="{{route('comment.edit', $comment->id)}}">edit</a></small>
                                            @endif
                                            @endauth
                                            <hr>
                                        </div>
                                        <div class="col text-end">
                                            @if (($comment->report->where('user_id','=',Auth::user()->id)->count()) == 0)
                                            <small><a class="btn btn-secondary btn-sm" href="{{route('comment.report', $comment->id)}}">report</a></small>
                                            @else
                                            <small><button class="btn btn-secondary btn-sm" disabled href="">reported</button></small>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                    @endforeach

                    <br>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection