@extends('template.main')

@section('title', 'Buy')

@section('content')
    <div class="d-flex my-4 mx-4">
        <a class="btn btn-primary" href="/avatar" role="button" style="background-color: #89CFF0; border-color: #89CFF0">Go
            Back</a>
    </div>
    <div class="d-flex justify-content-center my-4">
        <h1>Buy Avatar</h1>
    </div>
    <div class="d-flex justify-content-center my-4">
        <h3>Your Coins : {{ $user->coins }}</h3>
    </div>
    <div class="d-flex mx-4 my-4 justify-content-center text-center">
        <div class="card" style="width: 18rem;">
            <img src="{{ asset('/Storage/img/' . $avatar->image) }}" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">{{ $avatar->name }}</h5>
                <p class="card-text">Price : {{ $avatar->price }} Coins</p>
                <form action="/buy" method="post">
                    @csrf
                    <input type="hidden" name="avatar_id" value="{{ $avatar->id }}">
                    <button type="submit" class="btn btn-primary"
                        style="background-color: #89CFF0; border-color: #89CFF0">Buy</button>
                </form>
            </div>
        </div>
    </div>
@endsection
