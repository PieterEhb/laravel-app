@extends('layouts.admin')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col">
            <div class="card border-dark">
                <div class="card-header" style="color: orange">All News</div>
                @foreach ($newsPosts as $newspost )
                @include('partials.newsAdminpartial')
                @endforeach
                <p>{{ $newsPosts->links() }}</p>
            </div>
        </div>
    </div>
</div>

@endsection