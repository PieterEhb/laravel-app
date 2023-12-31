@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 mb-1">
            <div class="card border-dark bg-dark">
                <div class="card-header row" style="color: orange">
                    <div class="col-md-9">
                        <h3>Speedruns any%: fastest to slowest</h3>
                    </div>
                    <div class="col-md-3 text-end">
                        <a href="{{route('speedrun.create')}}" class="btn btn-warning">Upload any run</a>
                    </div>
                </div>
                @foreach ($speedruns->where('category','=','any%') as $speedrun )
                @include('partials.speedrunOverviewPartial')
                @endforeach
            </div>
        </div>
        <div class="col-md-6 mb-1">
            <div class="card border-dark bg-dark">
                <div class="card-header row" style="color: orange">
                    <div class="col">
                        <h3>Speedruns default settings: fastest to slowest</h3>
                    </div>
                </div>
                @foreach ($speedruns->where('category','=','default settings') as $speedrun )
                @include('partials.speedrunOverviewPartial')
                @endforeach
            </div>
        </div>
    </div>
</div>


@endsection