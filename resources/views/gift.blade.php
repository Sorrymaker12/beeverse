@extends('template.main')

@section('title', 'Gift')

@section('content')
    <div class="d-flex my-4 mx-4">
        <a class="btn btn-primary" href="/avatar" role="button"
            style="background-color: #89CFF0; border-color: #89CFF0">{{ __('gift.gb') }}</a>
    </div>
    <div class="d-flex justify-content-center my-4">
        <h1>{{ __('gift.ga') }}</h1>
    </div>
    <div class="d-flex justify-content-center my-4">
        <h3>{{ __('gift.yc') }} : {{ $user->coins }}</h3>
    </div>
    <div class="d-flex mx-4 my-4 justify-content-center text-center">
        <div class="card" style="width: 18rem;">
            <img src="{{ asset('/Storage/img/' . $avatar->image) }}" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">{{ $avatar->name }}</h5>
                <p class="card-text">{{ __('gift.p') }} : {{ $avatar->price }} {{ __('gift.yc') }}</p>
                <form action="/gift" method="post" class="my-4">
                    @csrf
                    <select class="form-select my-4" aria-label="Default select example" name="rec_id">
                        @foreach ($rec as $r)
                            @if ($r->id != $user->id)
                                <option value="{{ $r->id }}">{{ $r->name }}</option>
                            @endif
                        @endforeach
                    </select>
                    <input type="hidden" name="avatar_id" value="{{ $avatar->id }}">
                    <button type="submit" class="btn btn-primary"
                        style="background-color: #89CFF0; border-color: #89CFF0">{{ __('gift.g') }}</button>
                </form>
            </div>
        </div>
    </div>
@endsection
