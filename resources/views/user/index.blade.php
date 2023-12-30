@extends('layouts.admin')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="color: orange">All users</div>
                <table class="table table-striped p-2">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">admin</th>
                            <th scope="col">Set Role</th>
                            <th scope="col">delete</th>
                        </tr>
                    </thead>
                    @foreach ($users as $user )
                    <tr>
                        <td>{{$user->id}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{($user->is_admin)?'yes':'no'}}</td>
                        <td>
                            @if (Auth::user()->id == $user->id)
                            <small>can't update own role</small>
                            @elseif (!$user->is_admin)
                            <a class="btn btn-warning" onclick="return confirm('Are you sure?')" href="{{route('user.updateRole', $user->id)}}">make admin</a>
                            @else
                            <a class="btn btn-warning" onclick="return confirm('Are you sure?')" href="{{route('user.updateRole', $user->id)}}">unmake admin</a>
                            @endif
                            
                        </td>
                        <td>
                            <form action="{{route('user.destroy',$user->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit"  onclick="return confirm('Are you sure?')" {{($user->is_admin)?'disabled':''}}>Delete</button>
                            </form>
                    </tr>
                @endforeach

                </table>

            </div>
        </div>
    </div>
</div>

@endsection