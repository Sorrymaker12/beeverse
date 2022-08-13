@extends('template.auth')

@section('title', 'Login')

@section('content')
    <div class="d-flex justify-content-center py-5">
        <div class="d-flex flex-column mb-3">
            <div class="d-flex p-2 justify-content-center">
                <h1>{{ __('login.login') }}</h1>
            </div>
            <div class="p-2" style="width: 800px">
                <form method="POST" action="/login">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">{{ __('login.email') }}</label>
                        <input type="email" class="form-control" id="email" name="email">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">{{ __('login.password') }}</label>
                        <input type="password" class="form-control" id="password" name="password">
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
                    <div class="d-flex justify-content-center" style="">
                        <button type="submit" class="btn btn-primary"
                            style="background-color: #89CFF0; border-color: #89CFF0">{{ __('login.login') }}</button>
                    </div>
                </form>
            </div>
            <div class="py-3"></div>
            <div class="d-flex justify-content-center p-2">
                <p>Don't have an account? <a href="/register">{{ __('login.register') }}</a></p>
            </div>
        </div>
    </div>
@endsection
