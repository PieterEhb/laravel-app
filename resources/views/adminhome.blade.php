@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card border-dark  mb-2 row">
                <div class="card-header" style="color: orange">
                    <h3>Admin</h3>
                </div>
                <div class="card-body">
                    <p>Admin pages
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col" id="left">
                    <div class="row mb-2">
                        <div class="col p-0">
                            <div class="card border-dark">
                                <div class="card-header" style="color: orange">
                                    <h3>Drafts</h3>
                                </div>
                                @foreach ($drafts as $newspost )
                                @include('partials.newsAdminpartial')
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col p-0">
                            <div class="card border-dark">
                                <div class="card-header" style="color: orange">
                                    <h3>Released</h3>
                                </div>
                                @foreach ($releasedPosts as $newspost )
                                @include('partials.newsAdminpartial')
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col" id="right">
                    <div class="row mb-2">
                        <div class="col ms-2 p-0">
                            <div class="card border-dark">
                                <div class="card-header" style="color: orange">
                                    <h3>contact requests</h3>
                                </div>
                                @foreach ($contactforms as $contactform )
                                @include('partials.contactFormsAdminpartial')
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection