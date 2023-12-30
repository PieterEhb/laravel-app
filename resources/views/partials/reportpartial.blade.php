<div class="card border-warning m-1">
    <div class="row g-0">
            <div class="card-body p-2">
                <div class="col">
                    <h4 style="color: orange"><a href="">{{ $comment->news->title}}</a></h4>
                    <p class=" mb-1">Comment: {{ $comment->message}}</p>
                    <small class=" mb-1">Qty Reports: {{ $comment->report->count()}}</small>
                </div>
                <div class="col text-end">
                    <form action="{{route('comment.delete', $comment->id) }}" method="POST">
                        @csrf
                        <button class="ps-2 btn btn-danger" type="submit">Delete</button>
                    </form>
                </div>
        </div>
    </div>
</div>