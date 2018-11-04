@extends ('layouts.app')

@section ('content')
    <div class="container text-center" id="container-index">
        <h3>Jouw Favorieten</h3>

        @if(count($favorite) > 0)
            @foreach($favorites as $favorite)
                <h1>user id:</h1> {{ $favorite-> user_id }}
            @endforeach
        @endif
    </div>
@endsection
