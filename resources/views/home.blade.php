@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card border-dark  mb-2">
                <div class="card-header bg-dark text-white">About the game</div>

                <div class="card-body bg-secondary text-white">
                    <p>
                        Factorio is a game in which you build and maintain factories.
                        <br>
                        You will be mining resources, researching technologies, building infrastructure, automating production, and fighting enemies. Use your imagination to design your factory, combine simple elements into ingenious structures, apply management skills to keep it working, and protect it from the creatures who don't really like you.
                    </p>
                </div>
            </div>
            <div class="card border-dark bg-dark col-md-6">
                <div class="card-header bg-dark text-white">News</div>
                @foreach ($newsPosts as $newspost )
                @include('partials.news overview partial')
                    @endforeach
                </div>

            </div>
        </div>
    </div>
    @endsection