<!DOCTYPE html>
<html lang="en">
<title>
    @section('title')
        Forgot Password | Prefect of Discipline Students Violation Monitoring System
</title>
    @section('header')
        @include('elementary.auth.partials.header')
    @show
<body class="fp-page">
    <div class="fp-box">
        <div class="logo">
            <a class="col-md-12">Prefect of Discipline <b>SHS Department</b></a>
            <small>Student's Violation Monitoring System</small>
        </div>
        <div class="card">
            <div class="body">
                <form id="forgot_password" method="POST">
                    <div class="msg">
                        Enter your email address that you used to register. We'll send you an email with your username and a
                        link to reset your password.
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="md md-email"></i>
                        </span>
                        <div class="form-line">
                            <input type="email" class="form-control" name="email" placeholder="Email" required autofocus>
                        </div>
                    </div>

                    <a href="{{ url('/resetpass') }}" class="btn btn-block btn-lg bg-blue waves-effect" type="submit">Reset Password</a>

                    <div class="row m-t-20 m-b--5 align-center">
                        <a href="{{ url('/') }}">Sign In!</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @section('scripts')
        @include('elementary.auth.partials.scripts')
    @show
</body>
</html>