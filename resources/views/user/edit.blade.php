@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card bg-dark">
                <div class="card-header" style="color: orange;">Edit profile</div>

                <div class="card-body text-white">
                    <form method="POST" action="{{ route('user.update') }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row mb-3">
                            <label for="birthday" class="col-md-4 col-form-label text-md-end">Birthday</label>

                            <div class="col-md-6">
                                <input id="birthday" style="background-color: lightgray;" type="date" class="form-control @error('birthday') is-invalid @enderror" name="birthday" value="{{ $user->userinfo->birthday }}">

                                @error('birthday')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="bio"  class="col-md-4 col-form-label text-md-end">Bio</label>

                            <div class="col-md-6">
                                <textarea name="bio" id="bio" style="background-color: lightgray;" cols="30" rows="10"  class="form-control @error('bio') is-invalid @enderror">{{ $user->userinfo->bio }}</textarea>
                                @error('bio')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="avatar"  class="col-md-4 col-form-label text-md-end">upload avatar</label>

                            <div class="col-md-6">
                            <input type="file" name="avatar" class="form-control @error('avatar') is-invalid @enderror" style="background-color: lightgray;" placeholder="avatar" id="avatar" accept="image/*">
                                @error('avatar')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                            <button class="btn btn-warning" type="submit">Edit</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
