@extends('template.main')

@section('title', 'Search Results')

@section('content')
    <div class="d-flex my-4 mx-4">
        <a class="btn btn-primary" href="/" role="button" style="background-color: #89CFF0; border-color: #89CFF0">Go
            Back</a>
    </div>
    <div class="d-flex justify-content-center my-4">
        <h1>Search Results</h1>
    </div>
    <div class="d-flex mx-4 my-4 justify-content-center">
        <div class="row row-cols-1 cols-md-2 g-4 justify-content-center">
            @foreach ($users as $user)
                @if (Auth::check() && Auth::user()->id == $user->id)
                @else
                    <div class="col" style="width: 50rem">
                        <div class="card" style="width: 48rem; height: 22rem">
                            <div class="d-flex flex-row">
                                <a href="/profile/{{ $user->id }}">
                                    <img src="{{ asset('Storage/img/' . $user->profile_picture) }}" class="card-img-top"
                                        alt="..."
                                        style="width: 16rem; height: 21.9rem; object-fit:cover; object-position: 100% 0"></a>
                                <div class="card-body text-center">
                                    <h5 class="card-title">{{ $user->name }}</h5>
                                    <h5 class="card-title">{{ $user->current_job }} at {{ $user->current_company }}</h5>
                                    <h5 class="card-title">{{ $user->current_fow }} Field of Work</h5>
                                    <h5 class="card-title"> Interests : </h5>
                                    <p>{{ $user->fow_1 }}</p>
                                    <p>{{ $user->fow_2 }}</p>
                                    <p>{{ $user->fow_3 }}</p>
                                    <div class="d-flex flex-row mb-3 justify-content-center">
                                        <a class="btn btn-primary mx-2" href="/profile/{{ $user->id }}" role="button"
                                            style="background-color: #89CFF0; border-color: #89CFF0">View Profile</a>
                                        <form method="POST" action="/wish">
                                            @csrf
                                            <input type="hidden" name="user_id" value="{{ $user->id }}">
                                            <button type="submit mx-2" class="btn btn-primary"
                                                style="background-color: #89CFF0; border-color: #89CFF0"><svg
                                                    xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                    fill="currentColor" class="bi bi-hand-thumbs-up-fill"
                                                    viewBox="0 0 20 20">
                                                    <path
                                                        d="M6.956 1.745C7.021.81 7.908.087 8.864.325l.261.066c.463.116.874.456 1.012.965.22.816.533 2.511.062 4.51a9.84 9.84 0 0 1 .443-.051c.713-.065 1.669-.072 2.516.21.518.173.994.681 1.2 1.273.184.532.16 1.162-.234 1.733.058.119.103.242.138.363.077.27.113.567.113.856 0 .289-.036.586-.113.856-.039.135-.09.273-.16.404.169.387.107.819-.003 1.148a3.163 3.163 0 0 1-.488.901c.054.152.076.312.076.465 0 .305-.089.625-.253.912C13.1 15.522 12.437 16 11.5 16H8c-.605 0-1.07-.081-1.466-.218a4.82 4.82 0 0 1-.97-.484l-.048-.03c-.504-.307-.999-.609-2.068-.722C2.682 14.464 2 13.846 2 13V9c0-.85.685-1.432 1.357-1.615.849-.232 1.574-.787 2.132-1.41.56-.627.914-1.28 1.039-1.639.199-.575.356-1.539.428-2.59z" />
                                                </svg></button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>

@endsection
