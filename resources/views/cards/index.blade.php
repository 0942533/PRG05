@extends ('layouts.app')

@section ('content')
    <h1 id="h1-index">De leukste gelegenheidskaarten</h1>

    @if (count($cards)>0)
        <div class="container text-center" id="container-index">
            <div class="row">
                @foreach($cards as $card)
                    <div class="col-4">
                        <h5><a href="{{url('cards/'. $card->id)}}">{{$card->title}}</a></h5>
                        <img id="images_index" src="{{url('/storage/cover_images/'.$card->cover_image)}}">
                    </div>
                @endforeach
            </div>
        </div>
    @else
        <p>No card fount</p>
    @endif
@endsection
