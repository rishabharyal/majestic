@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 col-sm-12 p-5 mt-5">
            <div class="card">
                <div class="card-body bg-light">
                    <div class="mj-model-header">
                        <div class="mj-model-header-logo">
                            <img src="images/logo.png">
                        </div>
                        <span class="mj-modelspan">
                            Connect with majestic cleaning pros for better cleaning services 
                        </span>
                    </div>
                    <div class="mj-model-bdy">
                        <div class="mj-social-login">
                            <a href="#" class="btn mj-model-btn mj-btn-fb ">
                                <span class="mj-model-btn-icon">
                                    <i class="fa fa-facebook"></i>
                                </span>
                                Log in with Facebook
                            </a>
                            <a href="#" class="btn mj-model-btn mj-btn-google">
                                <span class="mj-model-btn-icon">
                                    <i class="fa fa-google"></i>
                                </span>
                                Log in with Google
                            </a>
                        </div>
                        <div class="mj-divder">
                            <div>OR </div>
                        </div>
                        <div class="mj-login-form">
                            @include('forms.login')
                        </div>
                        <div class="mj-model-footer">
                            <div class="mj-pvc-p">
                                <a href="{{ route('password.request') }}" class="mj-fpanchor">Forgot Password?</a>
                                
                            </div>
                            <div class="mj-anchorfooter">
                                <a href="#" data-dismiss="modal" data-toggle="modal" data-target="#signupmodel">I dont have account | Signup</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
