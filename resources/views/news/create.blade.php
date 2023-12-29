@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card bg-dark">
                <div class="card-header" style="color: orange;">create news</div>

                <div class="card-body text-white">
                    <form method="POST" action="{{ route('news.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <label for="title" class="col-md-4 col-form-label text-md-end">Title:</label>

                            <div class="col-md-6">
                                <input id="title" type="text" style="background-color: lightgray;" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}">

                                @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="message" class="col-md-4 col-form-label text-md-end">message:</label>

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
                            <label for="image" class="col-md-4 col-form-label text-md-end">add image</label>

                            <div class="col-md-6">
                                <input type="file" name="image" style="background-color: lightgray;" class="form-control @error('image') is-invalid @enderror" placeholder="image" id="image" accept="image/*">
                                @error('image')
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