@extends('template.main')

@section('title', 'Friends')

@section('content')
    <div class="d-flex justify-content-center my-4">
        <h1>Friends</h1>
    </div>
    <div class="d-flex mx-4 my-4 justify-content-center">
        <div class="d-flex flex-column mb-3 text-center">
            <h5>Received Friend Request</h5>
            @if ($req->isEmpty())
                <p>There is no friend request</p>
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
                                        <p> <strong>Name :</strong> {{ $u->name }}</p>
                                        <p> <strong>Email :</strong> {{ $u->email }}</p>
                                        <p> <strong>Mobile Number :</strong> {{ $u->mobile_number }}</p>
                                        <p> <strong>Linkedin :</strong> {{ $u->linkedin }}</p>
                                        <p> <strong>Position : </strong>{{ $u->current_job }} at {{ $u->current_company }}
                                        </p>
                                        <form action="/accept" method="post">
                                            @csrf
                                            <input type="hidden" name="user_id" value="{{ $u->id }}">
                                            <button type="submit" class="btn btn-primary"
                                                style="background-color: #89CFF0; border-color: #89CFF0">Accept</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                @endforeach
            @endif
            <h5>Friends</h5>
            @if ($friends->isEmpty())
                <p>You have no friends</p>
            @else
                @foreach ($friends as $f)
                    @foreach ($users as $u)
                        @if (($u->id == $f->user1_id || $u->id == $f->user2_id) && $u->id != Auth::user()->id)
                            <div class="card mx-4 my-4" style="width: 48rem; height: 20rem">
                                <div class="d-flex flex-row mb-3">
                                    <img src="{{ asset('Storage/img/' . $u->profile_picture) }}" class="img-fluid"
                                        alt="..."
                                        style="height: 20rem; width: 20rem; object-fit: cover; object-position: 100% 0;">
                                    <div class="card-body">
                                        <p> <strong>Name :</strong> {{ $u->name }}</p>
                                        <p> <strong>Email :</strong> {{ $u->email }}</p>
                                        <p> <strong>Mobile Number :</strong> {{ $u->mobile_number }}</p>
                                        <p> <strong>Linkedin :</strong> {{ $u->linkedin }}</p>
                                        <p> <strong>Position : </strong>{{ $u->current_job }} at {{ $u->current_company }}
                                        </p>
                                        <a class="btn btn-primary" href="{{ $f->video_link }}" target="_blank"
                                            role="button" style="background-color: #89CFF0; border-color: #89CFF0">Call</a>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                @endforeach
            @endif
            <h5>Pending Friend Request</h5>
            @if ($pending->isEmpty())
                <p>You have no pending friend request</p>
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
                                        <p> <strong>Name :</strong> {{ $u->name }}</p>
                                        <p> <strong>Email :</strong> {{ $u->email }}</p>
                                        <p> <strong>Mobile Number :</strong> {{ $u->mobile_number }}</p>
                                        <p> <strong>Linkedin :</strong> {{ $u->linkedin }}</p>
                                        <p> <strong>Position : </strong>{{ $u->current_job }} at {{ $u->current_company }}
                                        </p>
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
