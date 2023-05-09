@extends('layouts.app')

@section('style')

  <style>
    .form-floating{
        position: relative;
    }
    .icon{
        position: absolute;
        top:calc(50%);
        left: 1.25rem;
    }
    .form-floating label, .form-floating .form-control{
        left: .5rem;
        padding-left: 3.5rem;
        
    }

    /*----------------------------------------------------------*/

    * {
  box-sizing: border-box;
}

body {
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  height: 100vh;
  overflow: hidden;
  margin: 0;
}

.background {
  background: url('https://images.pexels.com/photos/7012892/pexels-photo-7012892.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1')
    no-repeat center center/cover;
  position: absolute;
  top: -20px;
  bottom: -20px;
  left: -20px;
  right: -20px;
  z-index: -1;
  filter: blur(20px);
}

  </style>
    
@endsection

@section('title')
    Parking Management System | Login
@endsection

@section('content')
<div class="background" id="background"></div>


<section>
    <div class="container my-5 p-5">
        <div class="row justify-content-center mt-5">
            <div class="col-md-12">
                <div class="card border-0 shadow p-3">
                    <div class="text-center mx-auto" style="font-size: 25px;font-weight:bold; color:rgb(49, 49, 104)">{{ __('Connecté') }}</div>
                    <div class="card-body">
                       
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
    
                            
                                
                                    <div class="mx-auto">
                                        @include('layouts.alert')
                                    </div>
                                
                                    <div class="form-floating">
                                      
                                            <i class="icon fa-solid fa-envelope fa-lg"></i>
                                            <input id="email" type="email" class="form-control 
                                           my-4 pt-4 @error('email') is-invalid @enderror"
                                           class="form-control " placeholder="E-mail Address"
                                           name="email" value="{{ old('email') }}" required autocomplete="off" autofocus>
                                           
                                         <label for="email" class="">{{ __('E-mail') }}</label>
                                       
                                       
                                         
                                          
                                    </div>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                  
                                   </span>
                                  @enderror
                                
                           
    
                     
                                {{-- <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label> --}}
    
                                    <div class="form-floating">
                                        <i class="icon fa-solid fa-lock fa-lg"></i>
                                        <input id="password" type="password" class="form-control  
                                               my-4 pt-4   @error('password') is-invalid @enderror"
                                               placeholder="Password"
                                               name="password" required autocomplete="off">
                                               <label for="email" class="">{{ __('Password') }}</label>
        
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                             
                            
                                <div class="text-center mt-3">
                                    <button type="submit" class="btn btn-dark ">
                                        {{ __('Login') }}
                                    </button>
                                </div>
                           
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
 @section('scripts')
 <script>
    const password = document.getElementById('password')
    const background = document.getElementById('background')
 
    password.addEventListener('input', (e) => {
    const input = e.target.value
    const length = input.length
    const blurValue = 10 - length * 2
    background.style.filter = `blur(${blurValue}px)`
 })
 </script>
 @endsection














{{-- <div class="bg-white rounded p-5  w-25 text-center shadow-md">
    <h1 class="text-bold">Connecté</h1>
    <form method="POST" action="{{ route('login') }}">
      
      @csrf
  
      <div class="mx-auto mt-2">
          @include('layouts.alert')
      </div>
     input Email
      <div class="my-4 text-left">
          <label for="email" class="">Email:</label>
          <input
            type="text"
            class=""
            id="email"
            value="{{ old('email') }}" required autocomplete="off" autofocus
            @error('email') is-invalid @enderror"
            name="email" 
            placeholder="Enter Email"
          />
          Messager erreur
          @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
          @enderror
        </div>
      input Mot de pass
      <label for="email" class="">Password:</label>
        <div class="my-4 text-left">
          
          <input
            type="password"
            class="border  p-2 mt-2 rounded"
            id="password"
            @error('password') is-invalid @enderror"
            required autocomplete="off"
            name="password" value="{{ old('password') }}"
            placeholder="Enter Password"
          />
          Messager erreur
           @error('password')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror
        </div>
      
        <button
          class="bg-black text-white py-2 mt-4  w-25 rounded"
          type="submit">
          {{ __('Login') }}
        </button>
  
    </form>
   
  </div> --}}