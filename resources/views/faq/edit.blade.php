@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit question</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('faq.update', $question->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="row mb-3">
                            <label for="question" class="col-md-4 col-form-label text-md-end">Question:</label>
                            <div class="col-md-6">
                                <textarea name="question" id="question" cols="30" rows="10" class="form-control @error('question') is-invalid @enderror">{{ $question->question }}</textarea>
                                @error('question')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="response" class="col-md-4 col-form-label text-md-end">response:</label>
                            <div class="col-md-6">
                                <textarea name="response" id="response" cols="30" rows="10" class="form-control @error('response') is-invalid @enderror">{{ $question->response }}</textarea>
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
                                <select class="form-control" id="category" name="category" required>
                                    <option value="" disabled selected>Please select category</option>
                                    @foreach($questioncategeories as $category)
                                    <option
                                        @if ($category->id == $question->category_id)
                                            selected
                                        @endif
                                    value="{{$category->id}}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="status" class="col-md-4 col-form-label text-md-end">status:</label>
                            <div class="col-md-6">
                                <select class="form-control" id="status" name="status" required focus>
                                    <option @if ($question->status == 'show') selected  @endif  value="shown">show</option>
                                    <option @if ($question->status =='notShown') selected @endif value="notShown">do not show</option>
                                </select>
                            </div>
                        </div>
                        <button type="submit">Save question</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endsection