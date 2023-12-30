<div class="card border-warning">
    <div class="row g-0">
        <div class="col-md-9">
            <div class="card-body p-2">
                <h3><a class=" nav-item ps-2" style="text-decoration: none; color:orange" href="{{route('contactform.show', $contactform->id) }}">{{ $contactform->name}}</a></h3>
                <p class="ps-3">{{(Strlen($contactform->message)>200?Str::limit($contactform->message,200):$contactform->message)}}</p>
                <p class="ps-3">Status: {{ $contactform->status}}</p>
                <small class="ps-3" style="color:gray">posted on {{$contactform->updated_at->format('d/m/Y')}}</small>
            </div>
        </div>
    </div>
</div>