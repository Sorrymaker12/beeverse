@extends('template.main')

@section('title', 'Profile')

@section('content')
    <div class="d-flex my-4 mx-4">
        <a class="btn btn-primary" href="/" role="button" style="background-color: #89CFF0; border-color: #89CFF0">Go
            Back</a>
    </div>
    <div class="d-flex mx-4 my-4 justify-content-center">
        <div class="card mx-4" style="width: 32rem;">
            <img src="{{ asset('Storage/img/' . $user->profile_picture) }}" class="img-fluid" alt="...">
            <div class="card-body">
                <p> <strong>Name :</strong> {{ $user->name }}</p>
                <p> <strong>Email :</strong> {{ $user->email }}</p>
                <p> <strong>Mobile Number :</strong> {{ $user->mobile_number }}</p>
                <p> <strong>Linkedin :</strong> {{ $user->linkedin }}</p>
                <p> <strong>Current Profession : </strong>{{ $user->current_job }} at {{ $user->current_company }}</p>
                <p> <strong>Current Field of Work : </strong>{{ $user->current_fow }}</p>
            </div>
        </div>
        <div class="card mx-4" style="width: 48rem;">
            <div class="card-body">
                <h5>Interests : </h5>
                <p>{{ $user->fow_1 }}</p>
                <p>{{ $user->fow_2 }}</p>
                <p>{{ $user->fow_3 }}</p>
                <h5>Avatars : </h5>
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
