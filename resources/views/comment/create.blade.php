@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card bg-dark">
                <div class="card-header" style="color: orange;">add comment</div>

                <div class="card-body text-white">
                    <form method="POST" action="{{ route('addComment',$news->id) }}">
                        @csrf
                        @include('partials.comment news partial')

                        <div class="row mb-3">
                            <label for="message" class="col-md-4 col-form-label text-md-end">comment:</label>

                            <div class="col-md-6">
                                <textarea name="message" style="background-color: lightgray;" id="message" cols="30" rows="10" class="form-control @error('message') is-invalid @enderror">{{ old('message') }}</textarea>
                                @error('message')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4 col-form-label"></div>
                            <div class="col-md-4">
                                <button type="submit" class="btn btn-warning">Create</button>
                            </div>

                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection