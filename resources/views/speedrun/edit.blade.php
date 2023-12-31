@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header" style="color: orange;">Edit speedrun: {{$speedrun->user->name}}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('speedrun.update',$speedrun->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="row mb-3">
                            <label for="time" class="col-md-4 col-form-label text-md-end">Time(s):</label>
                            <div class="col-md-6">
                                <input id="time" type="number" style="background-color: lightgray;" class="form-control @error('time') is-invalid @enderror" name="time" value="{{ $speedrun->time_seconds }}">
                                @error('time')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="videoTitle" class="col-md-4 col-form-label text-md-end">video title:</label>
                            <div class="col-md-6">
                                <input id="videoTitle" style="background-color: lightgray;" type="text" class="form-control @error('videoTitle') is-invalid @enderror" name="videoTitle" value="{{ $speedrun->videoTitle  }}">
                                @error('videoTitle')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="videoLink" class="col-md-4 col-form-label text-md-end">video link:</label>
                            <div class="col-md-6">
                                <input id="videoLink" style="background-color: lightgray;" type="text" class="form-control @error('videoLink') is-invalid @enderror" name="videoLink" value="{{  $speedrun->videoLink  }}">
                                @error('videoLink')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="gameVersion" class="col-md-4 col-form-label text-md-end">version:</label>
                            <div class="col-md-6">
                                <input id="gameVersion" style="background-color: lightgray;" type="text" class="form-control @error('gameVersion') is-invalid @enderror" name="gameVersion" value="{{ $speedrun->game_version  }}">
                                @error('gameVersion')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="info" class="col-md-4 col-form-label text-md-end">info:</label>
                            <div class="col-md-6">
                                <textarea name="info" style="background-color: lightgray;" id="info" cols="30" rows="10" class="form-control @error('info') is-invalid @enderror">{{ $speedrun->info }}</textarea>
                                @error('info')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="category" class="col-md-4 col-form-label text-md-end">category:</label>
                            <div class="col-md-6">
                                <select class="form-control @error('category') is-invalid @enderror" id="category" name="category" required focus style="background-color: lightgray;">
                                    <option @if ($speedrun->category == 'any%') selected  @endif value="any%">any%</option>
                                    <option @if ($speedrun->category == 'default settings') selected  @endif value="default settings">default settings</option>
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
                                <select class="form-control @error('status') is-invalid @enderror" id="status" name="status" required focus style="background-color: lightgray;">
                                    <option @if ($speedrun->status == 'commited') selected  @endif value="commited">commited</option>
                                    <option @if ($speedrun->status == 'accepted') selected  @endif value="accepted">accepted</option>
                                    <option @if ($speedrun->status == 'rejected') selected  @endif value="rejected">rejected</option>
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
                                <button type="submit" class="btn btn-warning">edit</button>
                            </div>

                        </div>
                    </form>
                    <div class="row mb-3">
                            <label for="status" class="col-md-4 col-form-label text-md-end">Video:</label>
                            <div class="col-md-6">
                                <iframe src="{{$speedrun->videoLink}}" height="400px" width="600px" frameborder="0"></iframe>
                            </div>
                        </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection