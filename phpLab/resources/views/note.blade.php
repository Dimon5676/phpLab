@extends("layouts.app")

@section("content")
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card">
                <h4 class="card-header">{{ $note->title }}</h4>
                <h5 class="card-body">
                    <p>{{ $note->text }}</p>
                </h5>
                @auth
                    @if(Auth::user()->email == "admin@mail.ru")
                        <div class="card-footer">
                            <a href="{{ route('delete', $note->id) }}" title="delete" class="btn btn-danger">Delete</a>
                        </div>
                    @endif
                @endauth
            </div>
            <br>
            <h3>Comments</h3>
            <hr>
            @if($comments != null)
            @foreach($comments as $comment)
                <div class="card alert-warning">
                    <div class="card-header">
                        <div class="row justify-content-between">
                            <div>
                                {{ $comment->author }}
                            </div>
                            <div>
                                {{ $comment->created_at }}
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        {{ $comment->text }}
                    </div>
                </div>
                <br>
            @endforeach
            @else
                <h3 class="text-center">Nothing here</h3>
            @endif
            @auth
                <h5>Leave a comment</h5>
                <hr>
                <form method="POST" action="{{ route('comment') }}">
                    @csrf
                    <input type="hidden" id="author" name="author" value="{{ Auth::user()->name }}">
                    <input type="hidden" id="note_id" name="note_id" value="{{ $note->id }}">
                    <input maxlength="255" required class="form-control" id="text" name="text" placeholder="Enter your comment here...">
                    <br>
                    <div class="col-md-12">
                        <div class="row justify-content-end">
                            <button class="btn btn-dark" type="submit">Sumbit</button>
                        </div>
                    </div>
                </form>
            @endauth
        </div>
    </div>
@endsection
