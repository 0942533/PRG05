@extends ('layouts.app')

@section ('content')
    <h1 id="h1-index">De leukste gelegenheidskaarten</h1>

@if (count($cards)>0)
        <div class="container text-center" id="container-index">
            <div class="row">
                @foreach($cards as $card)
                    <article data-cardid="{{ $card->id }}">
                        <div class="col-4">
                           <a href="{{ url('cards/'. $card->id) }}">
                                <img id="images_index" src="{{url('/storage/cover_images/'.$card->cover_image)}}">
                           </a>
                        </div>

                            @guest()
                                {{--<a href="javascript:void(0);" onclick="console.log('Je bent een bezoeker')">--}}
                                    <i class="fa fa-heart-o"></i>
                                    {{ $card->favorites()->count() }}
                                {{--</a>--}}
                            @else
                            {{--<a href="javascript:void(0);" onclick="document.getElementById('favorite-form-{{ $card->id }}').submit();">--}}
                                <i class="fa fa-heart-o heart iets" data-id="{{ $card->id }}"></i>
                                <span class="favorites" data-id="{{ $card->id }}">{{ $card->favorites()->count() }}</span>
                            {{--</a>--}}
                            <form id="favorite-form-{{ $card->id }}" method="post" action="{{ route('cards.favorite',$card->id) }}" style="display:none;">
                                @csrf
                            </form>
                            @endguest
                    </article>
                @endforeach
            </div>
        </div>
    @else
        <p>Er zijn geen kaarten gevonden</p>
    @endif
@endsection

@push('scripts')
    <script>
        $(function() {
            $('.heart').click( function () {
                let element = this
                $.ajax({
                    url : 'favorite/add',
                    type: 'POST',
                    data: {
                        "id": $(this).data('id'),
                        "_token": "{{ csrf_token() }}",
                    },
                    success: function(response) {

                        let cardFav = $('.favorites[data-id=' + $(element).data('id') + ']');
                        let count = cardFav.text();
                        let heart = $('.heart[data-id=' + $(element).data('id') + ']');

                        if(response == 1) {
                            cardFav.text(parseInt(count) + 1);
                            $(heart).addClass('red');
                        }
                        else if(response == 0) {
                            cardFav.text(parseInt(count) - 1);
                            $(heart).removeClass('red');
                        }
                        else if(response == 2) {
                            swal({
                                title: 'Error!',
                                text: 'Je moet minimaal 5x inloggen',
                                type: 'error',
                                confirmButtonText: 'Cool'
                            })
                        }
                    }
                })
            });
        });
    </script>
@endpush



