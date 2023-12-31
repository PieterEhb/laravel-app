@extends('layouts.admin')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 mb-1">
            <div class="card border-dark">
                <div class="card-header row" style="color: orange">
                    <div class="col-md-9">
                        <h3>Speedruns any%: review</h3>
                    </div>
                </div>
                @foreach ($toReviewSpeedruns->where('category','=','any%') as $speedrun )
                @include('partials.adminSpeedrunOverviewPartial')
                @endforeach
            </div>
        </div>
        <div class="col-md-6 mb-1">
            <div class="card border-dark ">
                <div class="card-header row" style="color: orange">
                    <div class="col">
                        <h3>Speedruns default settings: review</h3>
                    </div>
                </div>
                @foreach ($toReviewSpeedruns->where('category','=','default settings') as $speedrun )
                @include('partials.adminSpeedrunOverviewPartial')
                @endforeach
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-6 mb-1">
            <div class="card border-dark">
                <div class="card-header row" style="color: orange">
                    <div class="col-md-9">
                        <h3>Speedruns any%: fastest to slowest</h3>
                    </div>
                </div>
                @foreach ($acceptedSpeedruns->where('category','=','any%') as $speedrun )
                @include('partials.adminSpeedrunOverviewPartial')
                @endforeach
            </div>
        </div>
        <div class="col-md-6 mb-1">
            <div class="card border-dark">
                <div class="card-header row" style="color: orange">
                    <div class="col">
                        <h3>Speedruns default settings: fastest to slowest</h3>
                    </div>
                </div>
                @foreach ($acceptedSpeedruns->where('category','=','default settings') as $speedrun )
                @include('partials.adminSpeedrunOverviewPartial')
                @endforeach
            </div>
        </div>
    </div>
</div>


@endsection