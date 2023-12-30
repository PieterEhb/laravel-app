<div class="card border-warning m-1">
    <div class="row g-0">
        <div class="col-md-9">
            <div class="card-body p-2">
                @if ($contactform->status == 'finished')
                <form action="{{route('contactform.destroy', $contactform->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="ps-2 btn btn-danger" type="submit">Delete</button>
                </form>
                @else
                <h4><a class=" nav-item ps-2 btn btn-warning" style="text-decoration: none;" href="{{route('contactform.edit', $contactform->id) }}">Respond</a></h4>
                @endif
                <p class="ps-3 mb-1">name: {{ $contactform->name}}</p>
                <p class="ps-3 mb-1">message: {{(Strlen($contactform->message)>200?Str::limit($contactform->message,200):$contactform->message)}}</p>
                @if ($contactform->response != null)
                <p class="ps-3 mb-1">name: {{ $contactform->response}}</p>
                @endif
                <p class="ps-3 mb-1">email: {{ $contactform->email}}</p>
                <p class="ps-3 mb-1">Status: {{ $contactform->status}}</p>
                @if ($contactform->status == 'finished')
                <small class="ps-3" style="color:gray">responded on {{$contactform->updated_at->format('d/m/Y h:n:s')}}</small>
                @else
                <small class="ps-3" style="color:gray">posted on {{$contactform->updated_at->format('d/m/Y h:n:s')}}</small>
                @endif
            </div>
        </div>
    </div>
</div>