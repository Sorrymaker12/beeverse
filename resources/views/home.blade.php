@extends('template.main')

@section('title', 'Home')

@section('content')
    <div class="d-flex justify-content-center my-4">
        <h1>Home</h1>
    </div>
    <div class="d-flex justify-content-center my-4">
        <form method="post" action="/search" class="d-flex" role="search" style="width: 80rem">
            @csrf
            <input class="form-control mx-2" type="text" placeholder="Search By Name" aria-label="Search" name="name">
            <select class="form-select mx-2" aria-label="Default select example" name="gender">
                <option value="either">Both Genders</option>
                <option value="female">Male</option>
                <option value="male">Female</option>
            </select>
            <select class="form-select mx-2" aria-label="Default select example" name="fow">
                <option value="0">Every Field of Work</option>
                @foreach ($FOW as $f)
                    <option value="{{ $f->id }}">{{ $f->name }}</option>
                @endforeach
            </select>
            <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
    </div>
    <div class="d-flex mx-4 my-4 justify-content-center">
        <div class="row row-cols-1 row-cols-md-4 g-4">
            @foreach ($users as $user)
                @if (Auth::check() && Auth::user()->id == $user->id)
                @else
                    <div class="col">
                        <div class="card" style="height: 800px; width: 450px">
                            <a href="/profile/{{ $user->id }}">
                                <img src="{{ asset('Storage/img/' . $user->profile_picture) }}" class="card-img-top"
                                    alt="..."
                                    style="height: 500px; background-size: auto; object-fit: cover; object-position: 100% 0"></a>
                            <div class="card-body text-center">
                                <h5 class="card-title">{{ $user->name }}</h5>
                                <h5 class="card-title">{{ $user->current_job }} at {{ $user->current_company }}</h5>
                                <h5 class="card-title"> Interests : </h5>
                                @foreach ($interest as $i)
                                    @if ($i->user_id == $user->id)
                                        @foreach ($FOW as $f)
                                            @if ($f->id == $i->fow_id)
                                                <p class="card-text">{{ $f->name }}</p>
                                            @endif
                                        @endforeach
                                    @endif
                                @endforeach
                                <div class="d-flex flex-row mb-3 justify-content-center">
                                    <a class="btn btn-primary mx-2" href="/profile/{{ $user->id }}" role="button"
                                        style="background-color: #89CFF0; border-color: #89CFF0">View Profile</a>
                                    <form method="POST" action="/wish">
                                        @csrf
                                        <input type="hidden" name="user_id" value="{{ $user->id }}">
                                        <button type="submit mx-2" class="btn btn-primary"
                                            style="background-color: #89CFF0; border-color: #89CFF0"><svg
                                                xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                fill="currentColor" class="bi bi-hand-thumbs-up-fill" viewBox="0 0 20 20">
                                                <path
                                                    d="M6.956 1.745C7.021.81 7.908.087 8.864.325l.261.066c.463.116.874.456 1.012.965.22.816.533 2.511.062 4.51a9.84 9.84 0 0 1 .443-.051c.713-.065 1.669-.072 2.516.21.518.173.994.681 1.2 1.273.184.532.16 1.162-.234 1.733.058.119.103.242.138.363.077.27.113.567.113.856 0 .289-.036.586-.113.856-.039.135-.09.273-.16.404.169.387.107.819-.003 1.148a3.163 3.163 0 0 1-.488.901c.054.152.076.312.076.465 0 .305-.089.625-.253.912C13.1 15.522 12.437 16 11.5 16H8c-.605 0-1.07-.081-1.466-.218a4.82 4.82 0 0 1-.97-.484l-.048-.03c-.504-.307-.999-.609-2.068-.722C2.682 14.464 2 13.846 2 13V9c0-.85.685-1.432 1.357-1.615.849-.232 1.574-.787 2.132-1.41.56-.627.914-1.28 1.039-1.639.199-.575.356-1.539.428-2.59z" />
                                            </svg></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>

@endsection
