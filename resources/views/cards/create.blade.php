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

        <!-- Als je een file submit, moet je standaard een enc type attribute aan je formulier toevoegen. -->
        <form method="POST" enctype="multipart/form-data" action="{{url('cards')}}">
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
                    <select>
                        <option value="verjaardag">Verjaardag</option>
                        <option value="felicitatie">Felicitatie</option>
                        <option value="uitnodiging">Uitnodiging</option>
                    </select>
                </div>

                <div class="col-6">
                    <!-- Als je een file submit, moet je standaard een enc type attribute aan je formulier toevoegen. -->
                    <label for="InputFile">Afbeelding:</label></br>
                    <input type="file" name="cover_image">
                </div>

                <div class="col-6">
                    <button type="submit" class="btn btn-primary">Opslaan</button>
                </div>
            </div><!-- End row -->

            @include('layouts.errors')

        </form>
    </div><!-- End container -->
@endsection
