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

                        <li>
                            @guest()
                                <a href="javascript:void(0);" onclick="console.log('Je bent een bezoeker')">
                                    <i class="fa fa-heart-o"></i>
                                    {{ $card->favorite_to_users->count() }}
                                </a>
                            @else
                            <a href="javascript:void(0);" onclick="document.getElementById('favorite-form-{{ $card->id }}').submit();">
                                <i class="fa fa-heart-o"></i>
                                {{ $card->favorite_to_users->count() }}
                            </a>
                            <form id="favorite-form-{{ $card->id }}" method="post" action="{{ route('cards.favorite',$card->id) }}" style="display:none;">
                                @csrf
                            </form>
                            @endguest
                        </li>

                        {{--@if(session()->has('message'))--}}
                            {{--<div class="alert alert-success">--}}
                                {{--{{ session()->get('message') }}--}}
                            {{--</div>--}}
                        {{--@endif--}}

                    </article>
                @endforeach
            </div>
        </div>
    @else
        <p>No card fount</p>
    @endif
@endsection



