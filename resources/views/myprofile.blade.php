@extends('template.main')

@section('title', 'My Profile')

@section('content')
    <div class="d-flex justify-content-center my-4">
        <h1>{{ __('myprofile.mp') }}</h1>
    </div>
    <div class="d-flex justify-content-center my-4">
        <a class="btn btn-primary" href="/settings" role="button"
            style="background-color: #89CFF0; border-color: #89CFF0">{{ __('myprofile.s') }}</a>
    </div>
    <div class="d-flex mx-4 my-4 justify-content-center">
        <div class="card mx-4" style="width: 32rem;">
            <img src="{{ asset('Storage/img/' . $user->profile_picture) }}" class="img-fluid" alt="...">
            <div class="card-body">
                <p> <strong>{{ __('myprofile.name') }} :</strong> {{ $user->name }}</p>
                <p> <strong>{{ __('myprofile.email') }} :</strong> {{ $user->email }}</p>
                <p> <strong>{{ __('myprofile.mn') }}:</strong> {{ $user->mobile_number }}</p>
                <p> <strong>{{ __('myprofile.linkedin') }} :</strong> {{ $user->linkedin }}</p>
                <p> <strong>{{ __('myprofile.cp') }}: </strong>{{ $user->current_job }} {{ __('myprofile.at') }}
                    {{ $user->current_company }}
                </p>
                <p> <strong>{{ __('myprofile.cfow') }} : </strong>{{ $user->current_fow }}</p>
            </div>
        </div>
        <div class="card mx-4" style="width: 48rem;">
            <div class="card-body">
                <h5>{{ __('myprofile.int') }} : </h5>
                <p>{{ $user->fow_1 }}</p>
                <p>{{ $user->fow_2 }}</p>
                <p>{{ $user->fow_3 }}</p>
                <h5>{{ __('myprofile.avatars') }} : </h5>
                @foreach ($AC as $ac)
                    @if ($ac->user_id == $user->id)
                        @foreach ($avatar as $a)
                            @if ($a->id == $ac->avatar_id)
                                <img src="{{ asset('Storage/img/' . $a->image) }}" class="img-fluid" alt="..."
                                    style="width: 10rem;">
                            @endif
                        @endforeach
                    @endif
                @endforeach
            </div>
        </div>
    </div>
@endsection
