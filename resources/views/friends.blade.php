@extends('template.main')

@section('title', 'Friends')

@section('content')
    <div class="d-flex justify-content-center my-4">
        <h1>{{ __('friends.f') }}</h1>
    </div>
    <div class="d-flex mx-4 my-4 justify-content-center">
        <div class="d-flex flex-column mb-3 text-center">
            <h5>{{ __('friends.r') }}</h5>
            @if ($req->isEmpty())
                <p>{{ __('friends.nonereq') }}</p>
            @else
                @foreach ($req as $r)
                    @foreach ($users as $u)
                        @if ($u->id == $r->user1_id)
                            <div class="card mx-4 my-4" style="width: 48rem; height: 20rem">
                                <div class="d-flex flex-row mb-3">
                                    <img src="{{ asset('Storage/img/' . $u->profile_picture) }}" class="img-fluid"
                                        alt="..."
                                        style="height: 20rem; width: 20rem; object-fit: cover; object-position: 100% 0;">
                                    <div class="card-body">
                                        <p> <strong>{{ __('friends.name') }} :</strong> {{ $u->name }}</p>
                                        <p> <strong>{{ __('friends.email') }} :</strong> {{ $u->email }}</p>
                                        <p> <strong>{{ __('friends.mn') }} :</strong> {{ $u->mobile_number }}</p>
                                        <p> <strong>{{ __('friends.linkedin') }} :</strong> {{ $u->linkedin }}</p>
                                        <p> <strong>{{ __('friends.cp') }} : </strong>{{ $u->current_job }}
                                            {{ __('friends.at') }}
                                            {{ $u->current_company }}</p>
                                        <p> <strong>{{ __('friends.cfow') }} : </strong>{{ $u->current_fow }}</p>
                                        </p>
                                        <form action="/accept" method="post">
                                            @csrf
                                            <input type="hidden" name="user_id" value="{{ $u->id }}">
                                            <button type="submit" class="btn btn-primary"
                                                style="background-color: #89CFF0; border-color: #89CFF0">{{ __('friends.acc') }}</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                @endforeach
            @endif
            <h5>{{ __('friends.f') }}</h5>
            @if ($friends->isEmpty())
                <p>{{ __('friends.nonefr') }}</p>
            @else
                @foreach ($friends as $f)
                    @foreach ($users as $u)
                        @if ($u->id == $f->user1_id || $u->id == $f->user2_id)
                            <div class="card mx-4 my-4" style="width: 48rem; height: 20rem">
                                <div class="d-flex flex-row mb-3">
                                    <img src="{{ asset('Storage/img/' . $u->profile_picture) }}" class="img-fluid"
                                        alt="..."
                                        style="height: 20rem; width: 20rem; object-fit: cover; object-position: 100% 0;">
                                    <div class="card-body">
                                        <p> <strong>{{ __('friends.name') }} :</strong> {{ $u->name }}</p>
                                        <p> <strong>{{ __('friends.email') }} :</strong> {{ $u->email }}</p>
                                        <p> <strong>{{ __('friends.mn') }} :</strong> {{ $u->mobile_number }}</p>
                                        <p> <strong>{{ __('friends.linkedin') }} :</strong> {{ $u->linkedin }}</p>
                                        <p> <strong>{{ __('friends.cp') }} : </strong>{{ $u->current_job }}
                                            {{ __('friends.at') }}
                                            {{ $u->current_company }}</p>
                                        <p> <strong>{{ __('friends.cfow') }} : </strong>{{ $u->current_fow }}</p>
                                        <a class="btn btn-primary" href="{{ $f->video_link }}" target="_blank"
                                            role="button"
                                            style="background-color: #89CFF0; border-color: #89CFF0">{{ __('friends.call') }}</a>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                @endforeach
            @endif
            <h5>{{ __('friends.p') }}</h5>
            @if ($pending->isEmpty())
                <p>{{ __('friends.nonep') }}</p>
            @else
                @foreach ($pending as $p)
                    @foreach ($users as $u)
                        @if ($u->id == $p->user2_id)
                            <div class="card mx-4 my-4" style="width: 48rem; height: 20rem">
                                <div class="d-flex flex-row mb-3">
                                    <img src="{{ asset('Storage/img/' . $u->profile_picture) }}" class="img-fluid"
                                        alt="..."
                                        style="height: 20rem;  width: 20rem; object-fit: cover; object-position: 100% 0;">
                                    <div class="card-body">
                                        <p> <strong>{{ __('friends.name') }} :</strong> {{ $u->name }}</p>
                                        <p> <strong>{{ __('friends.email') }} :</strong> {{ $u->email }}</p>
                                        <p> <strong>{{ __('friends.mn') }} :</strong> {{ $u->mobile_number }}</p>
                                        <p> <strong>{{ __('friends.linkedin') }} :</strong> {{ $u->linkedin }}</p>
                                        <p> <strong>{{ __('friends.cp') }} : </strong>{{ $u->current_job }}
                                            {{ __('friends.at') }}
                                            {{ $u->current_company }}</p>
                                        <p> <strong>{{ __('friends.cfow') }} : </strong>{{ $u->current_fow }}</p>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                @endforeach
            @endif
        </div>
    </div>
@endsection
