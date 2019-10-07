@extends('layouts.main')

@section('title', 'Login - Secure Test')

@section('content')
    <div class="container login">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-6 col-12">
                <div class="card login__card">
                    <div class="card-header login__card-title">
                        Login Form
                    </div>
                    <div class="card-body">
                        <form action="" id="login-form">
                            <div class="form-group">
                                <label for="">Email :</label>
                                <input type="email" class="form-control" name="" required>
                            </div>
                            <div class="form-group">
                                <label for="">Password :</label>
                                <input type="password" class="form-control" name="" required>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary form-control">LOGIN</button>
                            </div>
                            <span>Don't have an account? <a href="{{ url('/auth/register') }}">Register</a></span>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection