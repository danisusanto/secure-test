@extends('layouts.main')

@section('title', 'Register - Secure Test')

@section('content')
    <div class="container login">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-6 col-12">
                <div class="alert alert-danger d-none" role="alert"></div>
                <div class="card login__card">
                    <div class="card-header login__card-title">
                        Register Form
                    </div>
                    <div class="card-body">
                        <form id="register-form">
                            <div class="form-group">
                                <label for="">Username :</label>
                                <input type="text" class="form-control" name="username" value="DNS Progress" required>
                            </div>
                            <div class="form-group">
                                <label for="">Email :</label>
                                <input type="email" class="form-control" name="email" value="danisusanto@niagahoster.co.id" required>
                            </div>
                            <div class="form-group">
                                <label for="">Password :</label>
                                <input type="password" class="form-control" name="password" value="acception" required>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary form-control">REGISTER</button>
                            </div>
                            <span>Already have an account? <a href="{{ url('/auth/login') }}">Login</a></span>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $("#register-form").submit(function(e) {
                e.preventDefault();
                axios.post("{{ url('/auth/register/action') }}", $(this).serialize())
                .then(response => {
                    console.log(response);
                })
                .catch(error => {
                    let message = error.response.data.errors;
                    var html = "<ul>";
                    if(message.username) {
                        html += "<li>"+message.username[0]+"</li>";
                    }
                    if(message.email) {
                        html += "<li>"+message.email[0]+"</li>";
                    }
                    if(message.password) {
                        html += "<li>"+message.password[0]+"</li>";
                    }
                    html += "</ul>";
                    $(".alert-danger").removeClass("d-none");
                    $(".alert-danger").html(html);
                })
            })
        })
    </script>
@endsection

