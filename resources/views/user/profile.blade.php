@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if(Session::get('success') && Session::get('success') != null)
            <div style="color:green">{{ Session::get('success') }}</div>
            @php
            Session::put('success', null)
            @endphp
            @endif
            <div class="card bg-dark">
                <div class="card-header" style="color: orange;">Profile {{$user->name}}</div>

                <div class="card-body text-white">

                    <h4 style="color: orange;">{{$user->name}}</h4>
                    <div class="row">
                        <p>username: {{$user->name}}</p>
                    </div>
                    @auth
                    @if($user->id == Auth::user()->id)
                    <div class="row">
                        <p>email: {{$user->email}}</p>
                    </div>
                    <div class="row">
                        <div class="col">
                            <p>password: {{Str::mask(12345, '*',0)}}</p>
                        </div>
                        <div class="col text-end">
                            <a class="btn btn-warning" href="{{route('user.changePassword', Auth::user()->id)}}">Change password</a>
                        </div>
                    </div>
                    @endif
                    @endauth
                    <div class="row"> Birthday: {{$user->userinfo->birthday}}</div>
                    <div class="row">Bio: {{$user->userinfo->bio}}</div>
                    <div class="row">
                        <div><img src="/storage/app/public/avatarImages/{{ $user->userinfo->image }}" alt="" height="180px" width="180px"></div>

                    </div>
                    @auth
                    @if($user->id == Auth::user()->id)
                    <a class="btn btn-warning" href="{{ route('user.edit', Auth::user()->id) }} ">Edit Profile</a>
                    @endif
                    @endauth
                </div>
            </div>
        </div>
    </div>
</div>
@endsection