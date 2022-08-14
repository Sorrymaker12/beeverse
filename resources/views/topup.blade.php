@extends('template.main')

@section('title', 'Top Up')

@section('content')
    <div class="d-flex my-4 mx-4">
        <a class="btn btn-primary" href="/avatar" role="button"
            style="background-color: #89CFF0; border-color: #89CFF0">{{ __('topup.gb') }}</a>
    </div>
    <div class="d-flex justify-content-center my-4">
        <h1>{{ __('topup.tu') }}</h1>
    </div>
    <div class="d-flex justify-content-center my-4 text-center">
        <div class="card" style="width: 18rem;">
            <img src="{{ asset('/Storage/img/' . $user->profile_picture) }}" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">{{ __('topup.c') }} : {{ $user->coins }}</h5>
                <p class="card-text">{{ __('topup.cb') }}</p>
                <form action="/topup" method="post">
                    @csrf
                    <input type="hidden" name="user_id" value="{{ $user->id }}">
                    <button type="submit" class="btn btn-primary"
                        style="background-color: #89CFF0; border-color: #89CFF0">{{ __('topup.tu') }}</button>
                </form>
            </div>
        </div>
    </div>
@endsection
