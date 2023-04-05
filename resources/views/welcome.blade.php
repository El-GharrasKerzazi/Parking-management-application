@extends('layouts.app')

@section('title')
    Parking Management System
@endsection

@section('content')
<div class="">
    <div class="container my-5 p-5 ">
        <div class="row justify-content-center mt-5">
            <div class="col-md-3">
                <div class="card p-3 mt-5">
                    <img src="{{ asset('img/64419.jpg') }}" alt="">
                   
                    <hr>
                    @guest
                        <a href="{{route('login')}}" class="btn btn-outline-success">Connexion</a>
                    @endguest
                    @auth
                        <div class="d-flex justify-content-center align-items-center">
                            <div class="logout_link">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <div class="form-group mb-0">
                                        <button type="submit" class="btn btn-outline-danger mx-3">
                                            {{ __('Logout') }}
                                        </button>
                                    </div>
                                </form>
                            </div>
                            <div class="home_page_link">
                                <a href="{{url('admin/home')}}" class="btn btn-outline-primary">Home</a>
                            </div>
                        </div>
                    @endauth
                </div>
            </div>
        </div>
    </div>
</div>

@endsection