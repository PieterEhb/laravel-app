@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card bg-dark mb-2">
                <div class="card-header" style="color: orange;">{{$user->name}}</div>

                <div class="card-body text-white">
                    <div class="card mb-2 bg-dark">
                        <div class="card-header" style="color: orange;">
                            <h4>User</h4>
                        </div>
                        <div class="card-body text-white">
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

                                <form method="POST" action="{{ route('user.destroy', $user->id) }}" class="text-end">
                                    @csrf
                                    @method('Delete')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete user</button>
                                </form>
                            </div>
                            @endif
                            @endauth
                        </div>
                    </div>
                    <div class="text-white">
                        <div class="card bg-dark">
                            <div class="card-header" style="color: orange;">
                                <h4>Userinfo</h4>
                            </div>
                            <div class="card-body text-white row">
                                <div class="col">
                                    <div class="row">
                                        <p>Birthday: {{$user->userinfo->birthday}}</p>
                                    </div>
                                    <div class="row">
                                        <p>Bio: {{$user->userinfo->bio}}</p>
                                    </div>
                                </div>
                                <div class="col text-end">
                                    <div><img src="/storage/app/public/avatarImages/{{ $user->userinfo->image }}" alt="" height="180px" width="180px"></div>
                                </div>
                                <div class="row">
                                    <div class="col">
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
                </div>
            </div>
            <div class="card bg-dark mb-2">
                <div class="card-header" style="color: orange;"> accepted Speedruns</div>
                <div class="card-body row">
                    @foreach ($user->speedruns->where('status','=','accepted') as $speedrun )
                    @include('partials.speedrunOverviewPartial')
                    @endforeach
                </div>
            </div>
            <div class="card bg-dark mb-2">
                <div class="card-header" style="color: orange;"> commited Speedruns</div>
                <div class="card-body row">
                    @foreach ($user->speedruns->where('status','=','commited') as $speedrun )
                    @include('partials.speedrunOverviewPartial')
                    @endforeach
                </div>
            </div>
            <div class="card bg-dark">
                <div class="card-header" style="color: orange;"> rejected Speedruns</div>
                <div class="card-body row">
                    @foreach ($user->speedruns->where('status','=','rejected') as $speedrun )
                    @include('partials.speedrunOverviewPartial')
                    @endforeach
                </div>
            </div>

        </div>
    </div>
</div>
@endsection