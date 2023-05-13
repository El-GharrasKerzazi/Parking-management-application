@extends('layouts.app')

@section('title')
    Parking Management System
@endsection

@section('content') 
<div class="">
    <div class="container my-5 p-5  ">
       <div class="row justify-content-center">
         <div class="col-md-8">
            <div class="card text-bg-dark shadow-md p-3 mb-5 bg-body-tertiary rounded ">
                <img src="https://images.pexels.com/photos/5126839/pexels-photo-5126839.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" class="card-img"  alt="...">
                <div class="card-img-overlay text-white m-4">
                  <h5 class="card-title text-warning" style="font-size:33px;font-weight:bold" >Parking</h5>
                  {{-- <p class="card-text" style="color: rgb(233, 212, 21); font-weight:bold;font-size:15px">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p> --}}
                  <p class="card-text mt-2">
            
                    @guest
                    <a href="{{route('login')}}" class="btn btn-warning mb-4 mt-3">Connexion</a>
                    @endguest

                    @auth
                    <div class="d-flex m-3">
                        <div class="logout_link">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <div class="form-group mb-0">
                                    <button type="submit" class="btn btn-success mx-3">
                                        {{ __('Logout') }}
                                    </button>
                                </div>
                            </form>
                        </div>
                        <div class="home_page_link">
                            <a href="{{url('admin/home')}}" class="btn btn-primary">Home</a>
                        </div>
                    </div>
                @endauth
                  </p>

                  

                </div>
                
              </div>
         </div>
       </div>
    </div>
</div>


@endsection

{{-- 


     <div class="row justify-content-center mt-5">
            <div class="col-md-3">
                <div class="card p-3 mt-5">
                    <img src="{{ asset('img/3993591_84522-removebg.png') }}" alt="">
                   
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
    
    --}}