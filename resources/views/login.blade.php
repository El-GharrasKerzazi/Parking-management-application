@extends('layouts.app')

@section('title')
    Parking Management System | Login
@endsection

@section('content')
<div class="container my-5 p-5">
    <div class="row justify-content-center">
        <div class="col-md-6 ">
            <div class="text-center">
                <img src="{{ asset('img/3993591_84522-removebg.png') }}" 
                class="rounded-5 border border-0" width="200" height="150" alt="">
             </div>
            <div class="card">
                 
                <div class="card-header bg-success text-white">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row mb-2">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>

                            <div class="col-md-8">
                                <input id="email" type="email"
                                    class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}" required autocomplete="off" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                        
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-2">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-8">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                                    name="password" required autocomplete="off">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-0  text-center">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-success ">
                                    {{ __('Login') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection