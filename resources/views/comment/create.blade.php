@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit profile</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('addComment',$news->id) }}">
                        @csrf
                        <div class="row mb-3">
                            <label for="title" class="col-md-4 col-form-label text-md-end">NewsPost:</label>

                            <div class="col-md-6">
                                <h4>{{$news->title}}</h4>
                                <p>{{$news->message}}</p>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="message" class="col-md-4 col-form-label text-md-end">message:</label>

                            <div class="col-md-6">
                                <textarea name="message" id="message" cols="30" rows="10"  class="form-control @error('message') is-invalid @enderror">{{ old('message') }}</textarea>
                                @error('message')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                            <button type="submit">Create</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection