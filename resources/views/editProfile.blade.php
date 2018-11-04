@extends('layouts.app')

@section('content')
    <div class="container text-center" id="container-index">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

            <h1 id="h1-index">Pas hier je gegegevens aan</h1>

        <form method="POST" enctype="multipart/form-data" action="{{ route('editProfile.update',$user->id) }}">
            {{ method_field('PUT') }}
            @csrf
            <div class="row" id="form-create">
                <div class="col-6">
                    <label for="titel">Naam:</label>
                    <input type="text" name="name" value="{{ $user->name }}" class="form-control">
                </div>
                <div class="col-6">
                    <label for="email">Email:</label>
                    <input type="email" name="email" value="{{ $user->email }}" class="form-control">
                </div>
                <div class="col-6">
                    <button type="submit" class="btn btn-primary">Opslaan</button>
                </div>
            </div><!-- End row -->
        </form>
        @include('layouts.errors')

    </div><!-- End container -->

@endsection
