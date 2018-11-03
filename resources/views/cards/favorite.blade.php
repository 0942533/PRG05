@extends ('layouts.app')

@section ('content')
    <h3>Jouw Favorieten</h3>

    @if(count($cards) > 0)
        <table class="table table-striped">
            <tr>
                <th>Titel:</th>
            </tr>

            @foreach($cards as $card)
                <tr>
                    <td>{{ Auth::user()->name }}</td>
                </tr>
            @endforeach
        </table>
    @else
        <h4>Geen Favorieten!</h4>
    @endif
@endsection
