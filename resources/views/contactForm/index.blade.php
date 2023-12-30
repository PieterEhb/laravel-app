@extends('layouts.admin')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
                <div class="card border-dark col">
                    <div class="card-header" style="color: orange"><h3>contact requests</h3></div>
                    @foreach ($contactforms as $contactform )
                    @include('partials.contactFormsAdminpartial')
                    @endforeach
                </div>
            </div>

        </div>
    </div>
</div>
    
@endsection