@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">create question</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('faq.store') }}">
                        @csrf
                        <div class="row mb-3">
                            <label for="question" class="col-md-4 col-form-label text-md-end">Question:</label>

                            <div class="col-md-6">
                                <textarea name="question" id="question" cols="30" rows="10" class="form-control @error('question') is-invalid @enderror">{{ old('question') }}</textarea>
                                @error('question')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="response" class="col-md-4 col-form-label text-md-end">Response:</label>

                            <div class="col-md-6">
                                <textarea name="response" id="response" cols="30" rows="10" class="form-control @error('response') is-invalid @enderror">{{ old('response') }}</textarea>
                                @error('response')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="category" class="col-md-4 col-form-label text-md-end">category:</label>
                            <div class="col-md-6">
                                <select class="form-control @error('category') is-invalid @enderror" id="category" name="category" required focus>
                                    <option value="" disabled selected>Please select category</option>
                                    @foreach($questioncategories as $category)
                                    <option value="{{$category->id}}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                @error('category')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="status" class="col-md-4 col-form-label text-md-end">status:</label>
                            <div class="col-md-6">
                                <select class="form-control @error('status') is-invalid @enderror" id="status" name="status" required focus>
                                    <option value="shown">show</option>
                                    <option value="notShown">do not show</option>
                                </select>
                                @error('status')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4 col-form-label"></div>
                            <div class="col-md-4">
                                <button type="submit" class="btn btn-warning">submit question</button>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endsection