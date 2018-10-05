@extends ('layouts.app')

@section ('content')
<h1>Create</h1>
<hr>
<form method="POST" action="">
@csrf

<div class="form-group">
<label for="titel">Email address</label>
<input type="text" class="form-control" name="title">
</div>
<div class="form-group">
<label for="omschrijving">Omschrijving</label>
<input type="text" class="form-control" name="description">
</div>
<div class="form-group">
<label for="prijs">Prijs</label>
<input type="text" class="form-control" name="price">
</div>
<div class="form-group">
<label for="formaat">Formaat</label>
<input type="text" class="form-control" name="format">
</div>
<div class="form-group">
<label for="categorie">Categorie</label>
<input type="text" class="form-control" name="category">
</div>

<div class="form-group">
<label for="exampleInputFile">File input</label>
<input type="file" id="exampleInputFile">
</div>
<button type="submit" class="btn btn-primary">Opslaan</button>
</form>
@endsection
