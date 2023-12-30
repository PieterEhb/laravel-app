<div class="card border-warning m-1">
                <div class="row g-0">
                        <div class="col-md-3">
                            <img src="/storage/app/public/newsimages/{{$newspost->image}}" style="height: 180px;object-fit:cover" class="img-fluid rounded-start" alt="...">
                        </div>
                        <div class="col-md-9" style="max-height: 180px;" >
                        <div class="card-body p-2" style="height: 180px;">
                        <h3><a class=" nav-item ps-2" style="text-decoration: none; color:orange" href="{{ route('news.adminShow', $newspost->id) }}">{{ $newspost->title}}</a> Status: {{$newspost->status}}</h3>
                            <p class="ps-3">{{(Strlen($newspost->message)>200?Str::limit($newspost->message,200):$newspost->message)}}</p>
                            <div class="row">
                            <div class="col">
                            <small class="ps-3" style="color:gray">posted by <a href="{{ route('user.profile',$newspost->user_id )}}" style="text-decoration: none; color:orange">{{$newspost->user->name}}</a> on {{$newspost->updated_at->format('d/m/Y')}}</small>
                            </div>
                            <div class="col text-end">
                            <small class="ps-3" style="color:gray">likes: {{$newspost->likes->count()}}, commments: {{$newspost->comment->count()}}</small>
                            </div>
                            </div>
                           
                        </div>

                        </div>
                    </div>
                    </div>