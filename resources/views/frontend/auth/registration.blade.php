@extends('frontend.layouts.master')
@section('title')
    Register | Be-Com
@endsection
@section('main')
    <!-- Start Bradcaump area -->
    <div class="ht__bradcaump__area bg-image--6">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="bradcaump__inner text-center">
                        <h2 class="bradcaump-title">My Account</h2>
                        <nav class="bradcaump-content">
                            <a class="breadcrumb_item" href="{{route('home')}}">Home</a>
                            <span class="brd-separetor">/</span>
                            <span class="breadcrumb_item active">Register</span>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Bradcaump area -->
    <section class="my_account_area pt--80 pb--55 bg--white">
        <div class="container">
            <div class="row justify-content-center">

                <div class="col-md-6">
                    <div class="my__account__wrapper">
                        <h3 class="account__title">Register</h3>
                        <form method="POST" action="{{ route('registration.create') }}" method="post" class="forms-sample"
                              enctype="multipart/form-data">
                            @csrf
                            <div class="account__form">

                                <div class="input__box">
                                    <label>{{ __('Name') }} <span>*</span></label>

                                    <input name="name" id="name" type="text"
                                           class="form-control @error('name') is-invalid @enderror"
                                           value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                </div>
                                <div class="input__box">
                                    <label>{{ __('Email') }} <span>*</span></label>
{{--                                    <input type="email">--}}
                                    <input name="email" id="email" type="email"
                                           class="form-control @error('email') is-invalid @enderror"
                                           value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                </div>
                                <div class="input__box">
                                    <label>{{ __('Password') }} <span>*</span></label>

                                    <input name="password" id="password" type="password"
                                           class="form-control @error('password') is-invalid @enderror"
                                           value="{{ old('password') }}" required autocomplete="password" autofocus>

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                </div>
                                <div class="input__box">
                                    <label>{{ __('Phone Number') }} <span>*</span></label>

                                    <input name="number" id="number" type="text"
                                           class="form-control @error('number') is-invalid @enderror"
                                           value="{{ old('number') }}" required autocomplete="number" autofocus>

                                    @error('number')
                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                </div>

                                <div class="input__box">
                                    <label>{{ __('Image') }}</label>

                                    <input name="image" id="image" type="file"
                                           class="form-control @error('image') is-invalid @enderror"
                                           value="{{ old('image') }}" autocomplete="image" autofocus>

                                    @error('image')
                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                </div>
                                <div class="form__btn">
                                    <button type="submit">Register</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection

@push('js')

@endpush
