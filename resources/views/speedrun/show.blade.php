@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card border-warning bg-dark">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <div class="row">
                                <h4 style="color: orange" class="">{{ $speedrun->user->name}}</h4>
                            </div>
                            <div class="row text-white">
                                    <p class="">run info: {{ $speedrun->info}}</p>
                                    <p class="">time: {{ $speedrun->time_seconds}}</p>
                                    <p>video: {{$speedrun->videoTitle}}</p>
                                    <p>game version: {{$speedrun->game_version}}</p>
                            </div>
                            
                            @auth
                                @if (Auth::user()->id == $speedrun->user_id)
                                <form method="POST" action="{{ route('speedrun.destroy', $speedrun->id) }}" class="">
                                    @csrf
                                    @method('Delete')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete speedrun</button>
                                </form>
                                @endif
                            @endauth
                            
                        </div>
                        <div class="col">
                            <iframe src="{{$speedrun->videoLink}}" width="400" height="300" frameborder="0"></iframe>
                        </div>
                        <hr class="mt-1">
                    </div>
                    <br>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection