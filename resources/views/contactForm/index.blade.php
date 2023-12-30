@extends('layouts.admin')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
                <div class="card border-dark col">
                    <div class="card-header" style="color: orange"><h3>New contact requests</h3></div>
                    @foreach ($contactforms->where('status', 'new') as $contactform )
                    @include('partials.contactFormsAdminpartial')
                    @endforeach
                </div>
            </div>
            <div class="col-md-6">
                <div class="card border-dark col">
                    <div class="card-header" style="color: orange"><h3>finished contact requests</h3></div>
                    @foreach ($contactforms->where('status', 'finished') as $contactform )
                    @include('partials.contactFormsAdminpartial')
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
    
@endsection