@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card border-dark  mb-2 row">
                <div class="card-header bg-dark" style="color: orange"><h3>About the game</h3></div>
                <div class="card-body text-white bg-dark"> 
                    <p>
                        Factorio is a game in which you build and maintain factories.
                        <br>
                        You will be mining resources, researching technologies, building infrastructure, automating production, and fighting enemies. Use your imagination to design your factory, combine simple elements into ingenious structures, apply management skills to keep it working, and protect it from the creatures who don't really like you.
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="card border-dark bg-dark col">
                    <div class="card-header bg-dark" style="color: orange"><h3>News</h3></div>
                    @foreach ($newsPosts as $newspost )
                    @include('partials.news overview partial')
                    @endforeach
                </div>
                <div class="col ms-2 p-0">
                    <div class="card border-dark bg-dark p-2">
                        <div class="card-header bg-dark " style="border-bottom: 1px solid orange; color: orange"><h3>Trailer</h3></div>
                        <iframe class="mt-2" width="620" height="400" src="https://www.youtube.com/embed/J8SBp4SyvLc" title="Factorio - Trailer 2020" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                    </div>
                </div>


            </div>

        </div>
    </div>
</div>
@endsection