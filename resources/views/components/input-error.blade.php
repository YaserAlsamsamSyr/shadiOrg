@props(['messages'])

@if ($messages)
        @foreach ((array) $messages as $message)
            <div class="d-inline-block rounded-pill bg-secondary text-primary py-1 px-3 mb-3"><span style="color:red">{{ $message }}</span></div>
            <br>
        @endforeach
@endif
