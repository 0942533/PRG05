@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="alert alert-success" role="alert">
                        <p>You're logged in as USERS</p>
                    </div>

                    <div class="container text-center" id="container-index">
                        <form method="POST" enctype="multipart/form-data">
                            {{ method_field('PUT') }}
                            @csrf

                            <div class="row" id="form-create">
                                <div class="col-6">
                                    <label for="titel">Naam:</label>
                                    <input type="text" name="name" class="form-control">
                                </div>
                                <div class="col-6">
                                    <label for="email">Email:</label>
                                    <input type="email" name="email" class="form-control">
                                </div>
                                <div class="col-6">
                                    <button type="submit" class="btn btn-primary">Opslaan</button>
                                </div>
                            </div>
                        </form>
                    </div><!-- END container -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
