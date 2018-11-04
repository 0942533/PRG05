@extends ('layouts.app')

@section ('content')
    <div class="container text-center" id="container-index">
        <h3>Jouw Favorieten</h3>

        @if(count($favorite) > 0)
            <table class="table table-striped">
                <tr>
                    <th>Favoriet.id</th>
                    <th>Gebruiker naam</th>
                    <th>Post naam</th>
                    <th>Delete</th>
                </tr>
                @foreach($favorite as $favorites)
                    <tr>
                        <td>{{$favorites->id}}</td>
                        <td>{{$favorites->name}}</td>
                        <td>{{$favorites->title}}</td>

                        <form action="{{ route ('favorites.destroy', $favorites->id) }}" method="post">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button class="btn btn-danger">Verwijderen</button>
                        </form>
                    </tr>
                @endforeach
            </table>
        @else
            <h4>Geen favorieten gevonden</h4>
        @endif
    </div>
@endsection
