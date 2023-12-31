@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card border-dark  mb-2 row">
                <div class="card-header bg-dark" style="color: orange">
                    <h3>About the game</h3>
                </div>
                <div class="card-body text-white bg-dark">
                    <p>
                        Factorio is a game in which you build and maintain factories.
                        <br>
                        You will be mining resources, researching technologies, building infrastructure, automating production, and fighting enemies. Use your imagination to design your factory, combine simple elements into ingenious structures, apply management skills to keep it working, and protect it from the creatures who don't really like you.
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col ps-0">
                    <div class="card border-dark bg-dark">
                        <div class="card-header bg-dark" style="color: orange">
                            <h3>News</h3>
                        </div>
                        @foreach ($newsPosts as $newspost )
                        @include('partials.newsOverviewPartial')
                        @endforeach
                    </div>
                </div>
                <div class="col">
                    <div class="row">
                        <div class="card mb-2   border-dark bg-dark">
                            <div class="card-header bg-dark" style="color: orange">
                                <h3>Latest Release</h3>
                            </div>
                            <div class="card-body text-white bg-dark">
                                <p>Stable: 1.1.100</p>
                                <hr>
                                <p>Experimental: 1.1.101</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col p-0">
                            <div class="card mb-2 border-dark bg-dark p-2 ">
                                <div class="card-header bg-dark " style="border-bottom: 1px solid orange; color: orange">
                                    <h3>Speedruns any%</h3>
                                </div>
                                <table class="table-warning text-white">
                                    <tr>
                                        <th>rank</th>
                                        <th>user</th>
                                        <th>time</th>
                                        <th>post date</th>
                                    </tr>
                               @php
                                   $rank = 1;
                               @endphp
                                @foreach ($speedruns as $speedrun )
                                @include('partials.indexOverviewPartial')
                                @php
                                   $rank++;
                               @endphp
                                @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col p-0">
                            <div class="card mb-2 border-dark bg-dark p-2 ">
                                <div class="card-header bg-dark " style="border-bottom: 1px solid orange; color: orange">
                                    <h3>Speedruns default</h3>
                                </div>
                                <table class="table-warning text-white">
                                    <tr>
                                        <th>rank</th>
                                        <th>user</th>
                                        <th>time</th>
                                        <th>post date</th>
                                    </tr>
                               @php
                                   $rank = 1;
                               @endphp
                                @foreach ($speedrunsDefault as $speedrun )
                                @include('partials.indexOverviewPartial')
                                @php
                                   $rank++;
                               @endphp
                                @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection