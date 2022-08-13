@extends('template.main')

@section('title', 'Settings')

@section('content')
    <div class="d-flex my-4 mx-4">
        <a class="btn btn-primary" href="/myprofile" role="button" style="background-color: #89CFF0; border-color: #89CFF0">Go
            Back</a>
    </div>
    <div class="d-flex justify-content-center my-4">
        <h1>Settings</h1>
    </div>
    <div class="d-flex mx-4 my-4 justify-content-center">
        <div class="card text-center" style="width: 18rem;">
            <img src="{{ asset('/Storage/img/' . $user->profile_picture) }}" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Coins : {{ $user->coins }}</h5>
                @if ($user->visible == 'visible')
                    <p class="card-text">Click the button below to be invisble.</p>
                    <p class="card-text">Price : 50 Coins</p>
                    <form action="/invis" method="post">
                        @csrf
                        <input type="hidden" name="user_id" value="{{ $user->id }}">
                        <button type="submit" class="btn btn-primary"
                            style="background-color: #89CFF0; border-color: #89CFF0">Go Invisble</button>
                    </form>
                @else
                    <p class="card-text">Click the button below to be visible.</p>
                    <p class="card-text">Price : 5 Coins</p>
                    <form action="/vis" method="post">
                        @csrf
                        <input type="hidden" name="user_id" value="{{ $user->id }}">
                        <button type="submit" class="btn btn-primary"
                            style="background-color: #89CFF0; border-color: #89CFF0">Go Visible</button>
                    </form>
                @endif
            </div>
        </div>
    </div>
@endsection
