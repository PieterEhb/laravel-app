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
            <div class="card">
                <div class="card-header">Profile  {{$user->name}}</div>

                <div class="card-body">
                    
                        <h2>User info</h2>
                        <p>username: {{$user->name}}</p>
                        @auth
                        @if($user->id == Auth::user()->id)
                        <p>password: {{Str::mask($user->name, '*',0)}}</p> <a href="{{route('user.changePassword', Auth::user()->id)}}">Change password</a>
                        <p>email: {{$user->email}}</p>
                        @endif
                        @endauth
                        Birthday: {{$user->userinfo->birthday}}
                        <br>
                        Bio: {{$user->userinfo->bio}}
                        <br>
                        @auth
                        @if($user->id == Auth::user()->id)
                        <a href="{{ route('user.edit', Auth::user()->id) }} ">Edit Profile</a>
                        @endif
                        @endauth
                </div>
            </div>
        </div>
    </div>
</div>
@endsection