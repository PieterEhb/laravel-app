@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header" style="color: orange;">Edit news</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('news.update', $news->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row mb-3">
                            <label for="title" class="col-md-4 col-form-label text-md-end">Title:</label>

                            <div class="col-md-6">
                                <input id="title" type="text" style="background-color: lightgray;" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ $news->title }}">

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
                                <textarea name="message" style="background-color: lightgray;" id="message" cols="30" rows="10" class="form-control @error('message') is-invalid @enderror">{{ $news->message}}</textarea>
                                @error('message')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="image" class="col-md-4 col-form-label text-md-end">update image</label>

                            <div class="col-md-6">
                                <input type="file" style="background-color: lightgray;" name="image" class="form-control @error('image') is-invalid @enderror" placeholder="image" id="image" accept="image/*">
                                <img src="/storage/app/public/newsimages/{{ $news->image }}" width="300px" class="mt-2">
                                @error('image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                        <label for="status" class="col-md-4 col-form-label text-md-end">status:</label>

                                <div class="col-md-6">
                                    <select class="form-control" id="status" name="status" required focus>
                                        <option @if ($news->status == 'draft') selected @endif value="draft">draft</option>
                                        <option @if ($news->status =='released') selected @endif value="released">released</option>
                                    </select>
                                </div>
                        </div>

                </div>
                <div class="row mb-3">
                    <div class="col-md-4 col-form-label"></div>
                    <div class="col-md-4">
                        <button type="submit" class="btn btn-warning">edit</button>
                    </div>

                </div>


                </form>

                <form method="POST" action="{{ route('news.destroy', $news->id) }}">
                    @csrf
                    @method('Delete')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
@endsection