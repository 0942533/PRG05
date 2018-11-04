@extends('layouts.app')

@section('content')
    <div class="container text-center" id="container-index">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        <h1>Dit is het dashboard</h1>

@endsection
