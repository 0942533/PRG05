@extends ('layouts.app')

@section ('content')
    <h1>Cards</h1>
    @if (count($cards)>0)
        @foreach($cards as $card)
            <div class="well">
                <h3><a href="{{url('cards/'. $card->id)}}">{{$card->title}}</a></h3>
                <small>Written on{{$card->created_at}}</small>
            </div>
        @endforeach
    @else
        <p>No card fount</p>
    @endif
@endsection