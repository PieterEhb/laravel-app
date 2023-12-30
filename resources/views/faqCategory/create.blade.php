@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">create questioncategory</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('faqcategories.store') }}">
                        @csrf
                        <div class="row mb-3">
                            <label for="question" class="col-md-4 col-form-label text-md-end">Category:</label>

                            <div class="col-md-6">
                                <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" placeholder="{{ old('name') }}">
                                @error('name')
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
                            <label for="category" class="col-md-4 col-form-label text-md-end">Existing categories:</label>
                            <div class="col-md-6">
                                <ul>
                                @foreach($questioncategories as $category)
                                    <li>
                                    
                                    {{ $category->name }}

                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4 col-form-label"></div>
                            <div class="col-md-4">
                                <button type="submit" class="btn btn-warning">create category</button>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endsection