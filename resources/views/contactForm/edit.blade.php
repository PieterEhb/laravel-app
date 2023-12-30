@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header" style="color: orange;">Respond to</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('contactform.update',$contactform->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="row mb-3">
                            <label for="title" class="col-md-4 col-form-label text-md-end">Contact: </label>
                            <div class="col-md-6">
                                <h4 class="mb-1">name: {{$contactform->name}}</h4>
                                <p class="mb-1">message: {{$contactform->message}}</p>
                                <p class="mb-1">email: {{$contactform->email}}</p>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="message" class="col-md-4 col-form-label text-md-end">response:</label>
                            <div class="col-md-6">
                                <textarea name="response" style="background-color: lightgray;" id="response" cols="30" rows="10" class="form-control @error('response') is-invalid @enderror">{{ old('response') }}</textarea>
                                @error('response')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4"></div>
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-warning">Edit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection