@extends("layouts.app")

@section("content")
    <h1 class="text-center">Notes</h1>
    <div class="row justify-content-center">
        <div class="col-md-5">
            @foreach($notes as $note)
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
            @endforeach
        </div>
    </div>
@endsection
