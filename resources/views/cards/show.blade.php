@extends ('layouts.app')

@section ('content')
    <div class="container text-center" id="container-index">
        <div class="row">
            <div class="col-md-6">
                <img id="images_show" src="{{url('/storage/cover_images/'.$card->cover_image)}}">
            </div>
            <div class="col-md-4" id="article-text">
                <h2 id="h2-first"><strong>Productinformatie</strong></h2>
                <h2><strong>Prijs:</strong> &#8364;{{$card->price}}</h2>
                <h2><strong>Formaat:</strong> {{$card->format}}</h2>
                <h2><strong>Categorie:</strong> {{$card->category}}</h2>
                <hr>
                <h2><strong>Omschrijving:</strong><br/> {{$card->description}}</h2>
                <hr>

                <h2 id="h2-first"><strong>Kaart kopen?</strong></h2>
                <h2>Kom gezellig langs in onze winkel!</h2><br/>
                <h2><strong>Winkel:</strong> Lotties</h2>
                <h2><strong>Adres:</strong> Voorstraat 306</h2>
                <h2><strong>Postcode:</strong> 3311CW Dordrecht</h2>
                <h2><strong>Tel:</strong> Tel. 078 65 73 643</h2>
            </div>
            <div class="col-md-2">
            </div>
        </div>

        <div class="row">
            <div class="reacties">
                <div class="col-md-12">
                    <h2 id="h2-first"><strong>Reacties</strong></h2>
                </div>

                @if(Auth::check())
                @foreach($card->comments as $comment)
                    <div class="col-md-12">
                        <p>
                            <strong>Datum:</strong> {{ $comment->created_at }}<br/>
                            <strong>Naam:</strong> {{ $comment->name }}<br/>
                            <strong>Reactie:</strong> {{ $comment->comment }}
                        </p>
                        @if(Auth::user()->id == $comment->user_id || Auth::user()->admin ==1)
                            <form action="{{ route ('comments.destroy', $comment->id) }}" method="post">
                                {{ method_field('DELETE') }}
                                {{ csrf_field() }}
                                <button class="btn btn-danger"><i class="fa fa-trash heart"></i></button>
                            </form>
                        @endif
                        <hr>
                    </div>
                @endforeach
                    @endif
            </div><!-- END reactie -->
        </div><!-- END row -->

        <div class="row">
            <div class="reacties">
                <div class="col-md-12">
                    <h2 id="h2-first"><strong>Reactie plaatsen</strong></h2>
                </div>

                <div class="col-md-12">
                    <form method="POST" enctype="multipart/form-data" action="{{ route('comments.store',$card->id) }}">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <label for="name">Naam:</label>
                                <input type="text" class="form-control" name="name">
                            </div>

                            <div class="col-md-12">
                                <label for="comment">Reactie:</label>
                                <textarea class="form-control" name="comment"></textarea>
                            </div>

                            <div class="col-6">
                                <br/><button type="submit" class="btn btn-primary" placeholder="your comment here">Bericht plaatsen</button>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
        @include('layouts.errors')
    </div><!-- END container-->
@endsection