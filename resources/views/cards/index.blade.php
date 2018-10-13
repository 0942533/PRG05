<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Lotties') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/jquery-3.3.1.min') }}"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div class="form-group">
    <input type="text" name="search" id="search" class="form-control" placeholder="Search customer data" />
</div>

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
    <tbody>
    @foreach ($cards as $card)
        <tbody>
        <tr>
            <td>{{ $card->id }}</td>
            <td>{{ $card->title }}</td>
            <td>{{ $card->description }}</td>
            <td>{{ $card->price }}</td>
            <td>{{ $card->format }}</td>
            <td>{{ $card->category }}</td>
            <td>{{ $card->cover_image }}</td>
        </tr>
        @endforeach
        </tbody>
</table>

</body>
</html>

<script type="text/javascript">
    $('#search').on('keyup',function() {
        $value = $(this).val();

        $.ajax ({
            url: '{{ url('CardsController.search') }}',
            type: 'get',
            data: {'search':$value},
            success:function(data){
                $('tbody').html(data);
            }
        });
    });
</script>

<script type="text/javascript">

    $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });

</script>



