@extends('template.main')

@section('title', 'Show Off')

@section('content')
    <div class="d-flex justify-content-center my-4">
        <h1>Show off</h1>
    </div>
    <div class="d-flex justify-content-center my-4">
        <h3>Your Avatar :</h3>
    </div>
    <div class="d-flex mx-4 my-4 justify-content-center">
        <div class="row row-cols-1 row-cols-md-2 g-4 mx-5">
            @foreach ($avatar as $a)
                @foreach ($AC as $b)
                    @if ($a->id == $b->avatar_id)
                        <div class="col">
                            <div class="card mx-4 my-4" style="width: 48rem; height: 20rem">
                                <div class="d-flex flex-row mb-3">
                                    <img src="{{ asset('Storage/img/' . $a->image) }}" class="img-fluid" alt="..."
                                        style="height: 20rem; width: 20rem; object-fit: cover; object-position: 100% 0;">
                                    <div class="card-body text-center">
                                        <h3>{{ $a->name }}</h3>
                                        <h4>Price : {{ $a->price }}</h4>
                                        <h4>Owned by : {{ $user->name }}</h4>
                                        <form action="/changepp" method="post" class="my-4">
                                            @csrf
                                            <input type="hidden" name="avatar_id" value="{{ $a->id }}">
                                            <button type="submit" class="btn btn-primary"
                                                style="background-color: #89CFF0; border-color: #89CFF0">Change
                                                Profile Picture</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            @endforeach
        </div>
    </div>
@endsection
