@extends('layouts.admin')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card border-warning">
                <img src="/storage/app/public/newsimages/{{$news->image}}" class="card-img-top" alt="..." style="height: 200px; object-fit:cover">
                <div class="card-body" >
                    <div class="row">
                        <div class="col">
                            <h3 style="color: orange" class="">{{ $news->title}}</h3>
                        </div>
                        <div class="col text-end">
                            @auth
                            @if (Auth::user()->is_admin)
                            <a class="btn btn-warning" href="{{route('news.edit', $news->id)}}">Edit</a>
                            @endif
                            @endauth
                        </div>
                        <hr class="mt-1">
                    </div>
                    <div class="">
                        {!! $news->message !!}
                    </div>
                    <br>
                    <a class="btn btn-warning" href="{{route('comment', $news->id)}}">Comment</a>
                    <hr class="m-2">
                    @foreach ($news->comment->sortByDesc('updated_at') as $comment )
                    <div class="row">
                        <div class="col-md-1"></div>
                        <div class="col-md-11">
                            <div class="card border-warning  mb-2 ">
                                <div class="card-body ">
                                    <p class="">{{$comment->message}}</p>
                                    <small style="color: gray;">comment by <a style="color: orange;text-decoration:none" href="{{route('user.profile', $comment->user->id)}}">{{$comment->user->name}}</a> made on {{$comment->updated_at->format('d/m/Y')}}</small>
                                    <br>
                                    @auth
                                    @if (Auth::user()->id == $comment->user->id)
                                    <small><a class="btn btn-warning" href="{{route('comment.edit', $comment->id)}}">edit</a></small>
                                    @endif
                                    @endauth
                                    @auth
                                    @if (Auth::user()->is_admin)
                                    <form action="{{route('comment.delete', $comment->id)}}" method="POST">
                                        @csrf
                                        <button class="btn btn-danger" type="submit">delete</button>
                                    </form>
                                    @endif
                                    @endauth
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