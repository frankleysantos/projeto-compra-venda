@extends('layouts.app-login')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 div-principal">
            <div class="card">
                <div class="card-body">
                    <div class="logo"> <img src="{{asset('assets/img/logo.png')}}" alt=""> </div>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <div class="col-md form-field d-flex align-items-center">
                                <span class="far fa-user"></span> 
                                <input id="username" type="text" class="@error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus placeholder="Username">
                            </div>
                            @error('username')
                                <strong id="alerta">{{ $message }}</strong>
                            @enderror
                        </div>

                        <div class="form-group row">

                            <div class="col-md form-field d-flex align-items-center">
                                <span class="fas fa-key"></span> 
                                <input id="password" type="password" class="@error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md">
                                <button type="submit" class="btn btn-primary">
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

<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Poppins', sans-serif
    }

    body {
        /* background: #3B1E6A */
        /* background-image: linear-gradient(to right top, #aec9f2, #a5c4ec, #9dbee5, #94b9df, #8cb4d8); */
        background-image: url("assets/img/unidos.jpg");
        padding-right: 700px;
        background-size: cover;
        height: auto;
    }
    input {
        width: 100% !important;
        display: block !important;
        border: none !important;
        outline: none !important;
        background: none !important;
        font-size: 1.2rem !important;
        color: #666 !important;
        padding: 10px 15px 10px 10px !important;
        border-radius: 40px !important;
    }
    button {
        padding: 10px 15px 10px 10px !important;
        border-radius: 25px !important;
    }

    .div-principal {
        max-width: 350px !important;
        min-height: 470px !important;
        margin: 55px auto !important;
        padding: 40px 30px 30px 30px !important;
        background-color: #ecf0f3 !important;
        border-radius: 15px !important;
        /* box-shadow: 13px 13px 20px #cbced1, -13px -13px 20px #fff !important; */
        font-weight: 600 !important;
        font-size: 1.4rem !important;
        letter-spacing: 1.3px !important;
        color: #555 !important;
    }

    .div-principal .form-field input {
        width: 100% !important;
        display: block !important;
        border: none !important;
        outline: none !important;
        background: none !important;
        font-size: 1.2rem !important;
        color: #666 !important;
        padding: 10px 15px 10px 10px !important;
     }

     .div-principal .btn:hover {
        background-color: #039BE5 !important;
    }

    .div-principal a {
        text-decoration: none !important;
        font-size: 0.8rem !important;
        color: #03A9F4 !important;
    }

    .div-principal a:hover {
        color: #039BE5 !important;
    }

    input:focus{
        outline: none !important;
    }
    .div-principal .form-field {
        padding-left: 10px !important;
        margin-bottom: 20px !important;
        border-radius: 20px !important;
        box-shadow: inset 8px 8px 8px #cbced1, inset -8px -8px 8px #fff !important
    }

    .div-principal .form-field .fas {
        color: #555 !important
    }

    .div-principal .btn {
        box-shadow: none !important;
        width: 100% !important;
        height: 40px !important;
        background-color: #03A9F4 !important;
        color: #fff !important;
        border-radius: 25px !important;
        box-shadow: 3px 3px 3px #b1b1b1, -3px -3px 3px #fff !important;
        letter-spacing: 1.3px !important;
    }

    .logo {
        width: 80px !important;
        margin: auto !important;
        padding-bottom: 20px !important;
    }

    .logo img {
        width: 100% !important;
        height: 80px !important;
        object-fit: cover !important;
        border-radius: 50% !important;
        box-shadow: 0px 0px 3px #5f5f5f, 0px 0px 0px 5px #ecf0f3, 8px 8px 15px #a7aaa7, -8px -8px 15px #fff !important
    }
    #alerta {
        color: #F10909;
        font-size: 10pt;
        padding: 5px;
        text-align: justify;
        font-family: Arial, Helvetica, sans-serif;
    }

    @media (min-height: 768px) { 
        .div-principal {
            max-width: 550px !important;
            min-height: 700px !important;
            margin: 80px auto !important;
        }
        .card-body {
            height: 600px;
        }

        .form-group {
            padding-bottom: 40px !important;
        }

        .logo {
            padding-bottom: 40px !important;
        }
        .logo img {
            width: 140% !important;
            height: 120px !important;
        }
     }
</style>
@endsection
