@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">News</div>
                @foreach ($newsPosts as $newspost )
                @include('partials.news overview partial')
                @endforeach

            </div>
        </div>
    </div>
</div>

@endsection