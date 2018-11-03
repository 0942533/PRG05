@extends('layouts.app')

@section('content')
    <div class="container">
        {{--@if (session('status'))--}}
        {{--<div class="alert alert-success" role="alert">--}}
        {{--{{ session('status') }}--}}
        {{--</div>--}}
        {{--@endif--}}
        {{--<div class="alert alert-success" role="alert">--}}
        {{--<p>You're logged in as ADMINISTRATOR</p>--}}
        {{--</div>--}}

        <div class="row button-previous">
            <div class="col-6">
                <a href="{{url('cards/create')}}" class="btn btn-success" role="button">Bestelling toevoegen</a>
            </div>
        </div>

        <h1>Bestellingen | Lotties</h1>
        <hr>
        <p>Hier kunt u de reserveringen beheren die bij u zijn gedaan.</p>

        <div class="form-group">
            <form action="{{url('search')}}" method="post">
                {{csrf_field()}}
                <input type="text" class="form-controller" id="search" name="search"/>
                <button id="search" name="submit">search</button>
            </form>
        </div>

        <form method="post" action="{{url('search/filter')}}">
            {{csrf_field()}}
            <select name="dropdownfilter">
                <option value="" disabled selected>Kies een categorie:</option>
                <option value="alles">alles</option>
                <option value="verjaardag">verjaardag</option>
                <option value="uitnodiging">uitnodiging</option>
                <option value="beterschap">beterschap</option>
            </select>

            <button class="btn btn-primary sm" name="submit">Zoeken</button>
        </form>

        @if(session('info'))
            <div class="col-6 row" id="info-message">
                {{ session('info') }}
            </div>
        @endif

        @if(count ($cards) >0)
            <table class="table">
                <thead>
                <tr>
                    <th>Nr</th>
                    <th>Titel</th>
                    <th>Beschrijving</th>
                    <th>Prijs</th>
                    <th>Formaat</th>
                    <th>Categorie</th>
                    <th>Afbeelding</th>
                    <th>Actie</th>
                </tr>
                </thead>

                @foreach ($cards as $card)
                    <tbody>
                    <tr>
                        <td>{{ $card->id }}</td>
                        <td>{{ $card->title }}</td>
                        <td>{{ $card->description }}</td>
                        <td>{{ $card->price }}</td>
                        <td>{{ $card->format }}</td>
                        <td>{{ $card->category }}</td>
                        {{--<td>{{ $card->cover_image }}</td>--}}
                        <td>
                            <a href="{{url('cards/'.$card->id.'/edit')}}" class="btn btn-success">Aanpassen</a>
                            <form action="{{ url ('cards/'.$card->id) }}" method="post">
                                {{ method_field('DELETE') }}
                                {{ csrf_field() }}
                                <button class="btn btn-danger">Verwijderen</button>
                            </form>
                        </td>
                    </tr>
                    </tbody>
                @endforeach
            </table>
        @endif
    </div><!-- End container -->
@endsection
