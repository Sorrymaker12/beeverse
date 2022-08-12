@extends('template.auth')

@section('title', 'Payment')

@section('content')
    <div class="d-flex justify-content-center py-5">
        <div class="d-flex flex-column mb-3">
            <div class="d-flex p-2 justify-content-center">
                <h1>Payment</h1>
            </div>
            <div class="p-2" style="width: 800px">
                <form method="POST" action="/payment">
                    @csrf
                    <div class="mb-3">
                        <label for="payment" class="form-label">Registration Price</label>
                        <input type="number" class="form-control" id="payment" name="price" readonly
                            value="{{ $user->registration_price }}">
                    </div>
                    @if (!session('overpay'))
                        <div class="mb-3">
                            <label for="payment" class="form-label">Insert Payment Amount</label>
                            <input type="number" class="form-control" id="payment" name="payment">
                        </div>
                        <input type="hidden" name="user_id" value="{{ $user->id }}">
                        <div class="d-flex justify-content-center" style="">
                            <button type="submit" class="btn btn-primary"
                                style="background-color: #89CFF0; border-color: #89CFF0">Pay</button>
                        </div>
                    @endif
                </form>
            </div>
        </div>
    </div>
    @if (session('overpay'))
        <div class="d-flex justify-content-center">
            <div class="alert alert-danger" role="alert">
                Do you want to convert the excess to coins?
                <div class="d-flex flex-row justify-content-center">
                    <div class="px-4 pt-4">
                        <form method="POST" action="/paymentover">
                            @csrf
                            <input type="hidden" name="user_id" value="{{ $user->id }}">
                            <input type="hidden" name="overpay" value="{{ session('overpay_amount') }}">
                            <div class="d-flex justify-content-center" style="">
                                <button type="submit" class="btn btn-primary"
                                    style="background-color: #89CFF0; border-color: #89CFF0">Yes</button>
                            </div>
                        </form>
                    </div>
                    <div class="px-4 pt-4">
                        <form method="POST" action="/paymentfromover">
                            @csrf
                            <input type="hidden" name="user_id" value="{{ $user->id }}">
                            <div class="d-flex justify-content-center" style="">
                                <button type="submit" class="btn btn-primary"
                                    style="background-color:  #fb6767; border-color:#fb6767">No</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection
