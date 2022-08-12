@extends('template.main')

@section('title', 'Profile')

@section('content')
    <div class="d-flex mx-4 my-4 justify-content-center">
        <div class="card mx-4" style="width: 32rem;">
            <img src="{{ asset('Storage/img/' . $user->profile_picture) }}" class="img-fluid" alt="...">
            <div class="card-body">
                <p> <strong>Name :</strong> {{ $user->name }}</p>
                <p> <strong>Email :</strong> {{ $user->email }}</p>
                <p> <strong>Mobile Number :</strong> {{ $user->mobile_number }}</p>
                <p> <strong>Linkedin :</strong> {{ $user->linkedin }}</p>
                <p> <strong>Position : </strong>{{ $user->current_job }} at {{ $user->current_company }}</p>
            </div>
        </div>
        <div class="card mx-4" style="width: 48rem;">
            <div class="card-body">
                <h5>Interests : </h5>
                @foreach ($interest as $i)
                    @if ($i->user_id == $user->id)
                        @foreach ($FOW as $f)
                            @if ($f->id == $i->fow_id)
                                <p class="card-text">{{ $f->name }}</p>
                            @endif
                        @endforeach
                    @endif
                @endforeach
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
