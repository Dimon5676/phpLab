@extends("layouts.app")

@section("content")
    <h1 class="text-center">Notes</h1>
    <div class="row justify-content-center">
        <div class="col-md-5">
            <form method="GET" action="{{ route('search') }}">
                <div style="display: flex; flex-direction:row">
                    <input class="form-control" type="text" name="title">
                    <button type="submit" class="btn btn-info" >Find</button>
                </div>
            </form>
            <br>
            @foreach($notes as $note)
                <div class="card">
                    <h4 class="card-header">{{ $note->title }}</h4>
                    <h5 class="card-body">
                        <p>{{ $note->text }}</p>
                    </h5>
                    <div class="card-footer">
                        <a href="{{ route('note', $note->id) }}" title="note" class="btn btn-info">Show comments</a>
                        @auth
                            @if(Auth::user()->email == "admin@mail.ru")
                                <a href="{{ route('delete', $note->id) }}" title="delete" class="btn btn-danger">Delete</a>
                            @endif
                        @endauth
                    </div>
                </div>
                <br>
            @endforeach
        </div>
    </div>
@endsection
