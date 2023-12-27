@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit profile</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('comment.update',$comment->id) }}">
                        @csrf
                        <div class="row mb-3">
                            <label for="title" class="col-md-4 col-form-label text-md-end">NewsPost:</label>

                            <div class="col-md-6">
                                <h4>{{$comment->news->title}}</h4>
                                <p>{{$comment->news->message}}</p>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="message" class="col-md-4 col-form-label text-md-end">message:</label>

                            <div class="col-md-6">
                                <textarea name="message" id="message" cols="30" rows="10"  class="form-control @error('message') is-invalid @enderror">{{ $comment->message }}</textarea>
                                @error('message')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                            <button type="submit">Edit</button>
                    </form>

                    <form method="POST" action="{{ route('comment.delete', $comment->id) }}">
                        @csrf
                        <button type="submit" style="color: red" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
