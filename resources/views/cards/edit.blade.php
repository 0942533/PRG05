@extends ('layouts.app')

@section ('content')
    <div class="container" id="container-index">
        <h1>Bestelling aanpassen</h1>
        <hr>
        <p>Pas een bestelling aan.</p>

        {{--<div class="row button-previous">--}}
            {{--<div class="col-6">--}}
                {{--<a href="{{url('/edit', array($cards->id))}}" class="btn btn-success" role="button">< terug naar overzicht bestellingen</a>--}}
            {{--</div>--}}
        {{--</div>--}}

        <form method="POST" action="{{ url('cards/'.$card->id) }}">
            {{ method_field('PUT') }}
            @csrf

            <div class="row" id="form-create">
                <div class="col-6">
                    <label for="titel">Titel:</label>
                    <input type="text" name="title" value="{{ $card->title }}" class="form-control">
                </div>
                <div class="col-6">
                    <label for="omschrijving">Omschrijving:</label>
                    <input type="text" name="description" value="{{ $card->description }}" class="form-control">
                </div>
                <div class="col-6">
                    <label for="prijs">Prijs:</label>
                    <input type="text" name="price" value="{{ $card->price }}" class="form-control">
                </div>
                <div class="col-6">
                    <label for="formaat">Formaat:</label>
                    <input type="text" name="format" value="{{ $card->format }}" class="form-control">
                </div>
                <div class="col-6">
                    <label for="categorie">Categorie:</label>
                    <input type="text" name="category" value="{{ $card->category }}" class="form-control">
                </div>

                <div class="col-6">
                    <label for="InputFile">Afbeelding:</label><br>
                    <input type="file" name="image" value="{{ $card->image }}>
                </div>

                <div class="col-6">
                    <button type="submit" class="btn btn-primary">Opslaan</button>
                </div>
            </div><!-- End row -->

            @include('layouts.errors')

        </form>
    </div><!-- End container -->
@endsection
