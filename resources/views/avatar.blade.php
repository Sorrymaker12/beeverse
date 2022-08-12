@extends('template.main')

@section('title', 'Avatar')

@section('content')
    <div class="d-flex justify-content-center my-4">
        <h1>Avatar Shop</h1>
    </div>
    <div class="d-flex justify-content-center my-4">
        <h3>Your Coins : {{ $user->coins }}</h3>
    </div>
    <div class="d-flex justify-content-center my-4">
        <a class="btn btn-primary" href="/topup" role="button" style="background-color: #89CFF0; border-color: #89CFF0">Top
            Up</a>
    </div>
    <div class="d-flex mx-4 my-4 justify-content-center">
        <div class="row row-cols-1 row-cols-md-5 g-4 mx-5">
            @foreach ($avatar as $a)
                <div class="col">
                    <div class="card h-100">
                        <img src="{{ asset('Storage/img/' . $a->image) }}" class="card-img-top" alt="..."
                            style="height: 20rem; width: 20rem; object-fit: cover; object-position: 100% 0;">
                        <div class="card-body text-center">
                            <h5 class="card-title">{{ $a->name }}</h5>
                            <p class="card-text">Price : {{ $a->price }}</p>
                            <div class="d-flex flex-row justify-content-center">
                                <form action="/buy" method="get" class="mx-4">
                                    @csrf
                                    <input type="hidden" name="avatar_id" value="{{ $a->id }}">
                                    <button type="submit" class="btn btn-primary"
                                        style="background-color: #89CFF0; border-color: #89CFF0">Buy</button>
                                </form>
                                <form action="/gift" method="get" class="mx-4">
                                    @csrf
                                    <input type="hidden" name="avatar_id" value="{{ $a->id }}">
                                    <button type="submit" class="btn btn-primary"
                                        style="background-color: #89CFF0; border-color: #89CFF0">Gift</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
