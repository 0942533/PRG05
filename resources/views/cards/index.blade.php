@extends ('layouts.app')

@section ('content')
    <h1 id="h1-index">De leukste gelegenheidskaarten</h1>

    <form method="post" action="{{url('search/filter')}}">
        {{csrf_field()}}
        <select name="dropdownfilter">
            <option value="" disabled selected>Kies een categorie:</option>
            <option value="verjaardag">verjaardag</option>
            <option value="uitnodiging">uitnodiging</option>
            <option value="beterschap">beterschap</option>
        </select>

        <button class="btn btn-primary sm" name="submit">Zoeken</button>

    </form>

@if (count($cards)>0)
        <div class="container text-center" id="container-index">
            <div class="row">
                @foreach($cards as $card)
                    <article data-cardid="{{ $card->id }}">
                        <div class="col-4">
                            <h5><a href="{{url('cards/'. $card->id)}}">{{$card->title}}</a></h5>
                            {{--<img id="images_index" src="{{url('/storage/cover_images/'.$card->cover_image)}}">--}}
                        </div>
                    </article>
                @endforeach
            </div>
        </div>
    @else
        <p>No card fount</p>
    @endif
@endsection



