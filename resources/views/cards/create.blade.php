@extends ('layouts.app')

@section ('content')
    <div class="container" id="container-index">
        <h1>Bestelling toevoegen</h1>
        <hr>
        <p>Voeg een nieuwe bestelling toe aan de tabel.</p>

        <div class="row button-previous">
            <div class="col-6">
                <a href="{{url('/cards')}}" class="btn btn-success" role="button">< terug naar overzicht bestellingen</a>
            </div>
        </div>

        <form method="POST" action="{{url('cards')}}">
            @csrf

            <div class="row" id="form-create">
                <div class="col-6">
                    <label for="titel">Titel:</label>
                    <input type="text" class="form-control" name="title">
                </div>
                <div class="col-6">
                    <label for="omschrijving">Omschrijving:</label>
                    <input type="text" class="form-control" name="description">
                </div>
                <div class="col-6">
                    <label for="prijs">Prijs:</label>
                    <input type="text" class="form-control" name="price">
                </div>
                <div class="col-6">
                    <label for="formaat">Formaat:</label>
                    <input type="text" class="form-control" name="format">
                </div>
                <div class="col-6">
                    <label for="categorie">Categorie:</label>
                    <input type="text" class="form-control" name="category">
                </div>

                <div class="col-6">
                    <label for="InputFile">Afbeelding:</label></br>
                    <input type="file" name="img">
                </div>

                <div class="col-6">
                    <button type="submit" class="btn btn-primary">Opslaan</button>
                </div>
            </div><!-- End row -->

            @include('layouts.errors')

        </form>
    </div><!-- End container -->
@endsection
