@extends('layouts.admin')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col">
            <div class="card border-dark">
                <div class="card-header row" style="color: orange">
                <div class= col>All News</div>
                <div class="col-md-3 text-end">
                        <a href="{{route('news.create')}}" class="btn btn-warning">Create news post</a>
                    </div>
                    </div>
                @foreach ($newsPosts as $newspost )
                @include('partials.newsAdminpartial')
                @endforeach
                <p>{{ $newsPosts->links() }}</p>
            </div>
        </div>
    </div>
</div>

@endsection