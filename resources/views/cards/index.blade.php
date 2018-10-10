@extends ('layouts.app')

@section ('content')
    <h1 id="h1-index">De leukste gelegenheidskaarten</h1>

    @if (count($cards)>0)
        <div class="container text-center" id="container-index">
            <div class="row">
                @foreach($cards as $card)
                    <div class="col-sm">
                        <h5><a href="{{url('cards/'. $card->id)}}">{{$card->title}}</a></h5>
                    </div>
                @endforeach
            </div>
        </div>
    @else
        <p>No card fount</p>
    @endif
@endsection

