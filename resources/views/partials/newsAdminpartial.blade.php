<div class="card border-warning">
                <div class="row g-0">
                        <div class="col-md-3">
                            <img src="/storage/app/public/newsimages/{{$draft->image}}" style="height: 180px;object-fit:cover" class="img-fluid rounded-start" alt="...">
                        </div>
                        <div class="col-md-9" style="max-height: 180px;" >
                        <div class="card-body p-2" style="height: 180px;">
                        <h3><a class=" nav-item ps-2" style="text-decoration: none; color:orange" href="{{route('news.show', $draft->id) }}">{{ $draft->title}}</a></h3>
                            <p class="ps-3">{{(Strlen($draft->message)>200?Str::limit($draft->message,200):$draft->message)}}</p>
                            <small class="ps-3" style="color:gray">posted by <a href="{{ route('user.profile',$draft->user_id )}}" style="text-decoration: none; color:orange">{{$draft->user->name}}</a> on {{$draft->updated_at->format('d/m/Y')}}</small>
                        </div>

                            <hr class="m-1">

                        </div>
                    </div>
                    </div>