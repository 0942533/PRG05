@extends ('layouts.app')

@section ('content')
    <div class="container text-center" id="container-index">
        <h1>{{$card -> title}}</h1>

        <div class="row">
            @foreach($card->comments as $comment)
                <div class="comment">
                    <p>Name: {{ $comment->name }}</p>
                    <p>Comment: <br/>{{ $comment->comment }}</p>

                    @if(Auth::user()->id == $comment->user_id)
                        <form action="{{ route ('comments.destroy', $comment->id) }}" method="post">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button class="btn btn-danger">Verwijderen</button>
                        </form>
                    @endif

                    @if(Auth::user()->admin == 1)
                        <form action="{{ route ('comments.destroy', $comment->id) }}" method="post">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button class="btn btn-warning">Admin verwijderen</button>
                        </form>
                    @endif
                </div>
            @endforeach
        </div>

        <!-- Add a comment -->
        <div class="row">
            <div id="comment-form">
                <form method="POST" enctype="multipart/form-data" action="{{ route('comments.store',$card->id) }}">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <label for="name">Name:</label>
                            <input type="text" class="form-control" name="name" value="{{ $card->title }}">
                        </div>

                        <div class="col-md-6">
                            <label for="email">Email:</label>
                            <input type="text" class="form-control" name="email">
                        </div>

                        <div class="col-md-6">
                            <label for="comment">Bericht:</label>
                            <textarea class="form-control" name="comment"></textarea>
                        </div>

                        <div class="col-6">
                            <button type="submit" class="btn btn-primary" placeholder="your comment here">Bericht plaatsen</button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection