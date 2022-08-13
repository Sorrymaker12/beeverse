@extends('template.auth')

@section('title', 'Register')

@section('content')
    <div class="d-flex justify-content-center py-5">
        <div class="d-flex flex-column mb-3">
            <div class="d-flex p-2 justify-content-center">
                <h1>Register</h1>
            </div>
            <div class="p-2" style="width: 800px">
                <form method="POST" action="/register" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label fw-bold">Full Name</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label fw-bold">Email address</label>
                        <input type="email" class="form-control" id="email" name="email">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label  fw-bold">Password</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>
                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label  fw-bold">Confirm Password</label>
                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                    </div>
                    <div class="mb-3">
                        <label for="mobile_number" class="form-label  fw-bold">Mobile Number</label>
                        <input type="number" class="form-control" id="mobile_number" name="mobile_number">
                    </div>
                    <div class="mb-3">
                        <label class="fw-bold">Gender</label>
                        <div class="d-flex flew-row">
                            <div class="form-check px-4">
                                <input class="form-check-input" type="radio" name="gender" id="male" value="male"
                                    checked>
                                <label class="form-check-label" for="male">
                                    Male
                                </label>
                            </div>
                            <div class="form-check px-4">
                                <input class="form-check-input" type="radio" name="gender" id="female" value="female">
                                <label class="form-check-label" for="female">
                                    Female
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="linkedin" class="form-label  fw-bold">LinkedIn Username</label>
                        <input type="text" class="form-control" id="linkedin" name="linkedin">
                    </div>
                    <div class="mb-3">
                        <label for="current_job" class="form-label  fw-bold">Current Job</label>
                        <input type="text" class="form-control" id="current_job" name="current_job">
                    </div>
                    <div class="mb-3">
                        <label for="current_company" class="form-label  fw-bold">Current Company</label>
                        <input type="text" class="form-control" id="current_company" name="current_company">
                    </div>
                    <div class="mb-3">
                        <label class="fw-bold">Current Field Of Work</label>
                        <input type="text" class="form-control" id="current_company" name="current_fow">
                    </div>
                    <div class="mb-3">
                        <label class="fw-bold">Field of Work 1 : </label>
                        <input type="text" class="form-control" id="current_company" name="fow_1">
                    </div>
                    <div class="mb-3">
                        <label class="fw-bold">Field of Work 2 :</label>
                        <input type="text" class="form-control" id="current_company" name="fow_2">
                    </div>
                    <div class="mb-3">
                        <label class="fw-bold">Field of Work 3 :</label>
                        <input type="text" class="form-control" id="current_company" name="fow_3">
                    </div>
                    <div class="mb-3">
                        <label for="profile_picture" class="form-label  fw-bold">Profile Picture</label>
                        <input type="file" class="form-control" id="profile_picture" name="profile_picture">
                    </div>
                    <div class="mb-3">
                        <div class="d-flex flex-column">
                            <label class=" fw-bold"> Registration Price </label>
                            <input type="number" class="form-control" id="registration_price" name="registration_price"
                                value="{{ $price }}" readonly>
                        </div>
                    </div>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary"
                            style="background-color: #89CFF0; border-color: #89CFF0">Register</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
