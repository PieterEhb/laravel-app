<div class="card border-warning  m-1">
    <div class="row">
        <div class="card-body p-2">
            <div class="row ms-2">
                <div class="col-md-2">
                    <img class="" src="/storage/app/public/avatarimages/{{$speedrun->user->userinfo->image}}" width="100" alt="">
                </div>
                <div class="col-md-5">
                    <h3><a class=" nav-item ps-4" style="text-decoration: none; color:orange" href="{{route('speedrun.edit', $speedrun->id) }}">Speedrun: {{ $speedrun->user->name}}</a></h3>
                    <p class="ps-4">{{(Strlen($speedrun->info)>200?Str::limit($speedrun->Info,200):$speedrun->info)}}</p>
                    <p class="ps-4">time: {{$speedrun->time_seconds}}</p>
                    <small class="ps-4" style="color:gray">posted by <a href="{{ route('user.profile',$speedrun->user_id )}}" style="text-decoration: none; color:orange">{{$speedrun->user->name}}</a> on {{$speedrun->updated_at->format('d/m/Y')}}</small>
                </div>
            </div>
        </div>
    </div>
</div>