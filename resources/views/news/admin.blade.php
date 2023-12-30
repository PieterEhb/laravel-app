@extends('layouts.admin')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card border-dark bg-dark">
                <div class="card-header" style="color: orange">All News</div>
                @foreach ($newsPosts as $newspost )
                @include('partials.news overview partial')
                @endforeach
                <p>{{ $newsPosts->links() }}</p>
            </div>
        </div>
    </div>
</div>

@endsection