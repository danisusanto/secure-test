@extends('layouts.main')

@section('title', 'Verify - Secure Test')

@section('content')
    <div class="container login">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-6 col-12">
                <div class="alert alert-success d-none" role="alert"></div>
                <div class="card login__card">
                    <div class="card-header login__card-title text-center">  
                        <div class="alert alert-success" role="alert" style="margin-top: 15px">
                            Your account successfully verified 
                            <a href="{{ url('auth/login') }}">LOGIN</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

