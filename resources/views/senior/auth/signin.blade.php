<!DOCTYPE html>
<html>
@section('header')
    @include('elementary.auth.partials.header')
@show
<body class="login-page">
    <div class="login-box">
        <div class="logo">
            <a class="col-md-12">Prefect of Discipline</a>
            <small>Student's Violation Monitoring System</small>
        </div>
        <div class="card">
            <div class="body">
                <form id="sign_in" method="POST">
               
                    <div class="msg">Sign in to start your session</div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="ion-person-stalker"></i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="username" placeholder="Username" required autofocus>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="ion-locked"></i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="password" placeholder="Password" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-8 p-t-5">
                            <input type="checkbox" name="rememberme" id="rememberme" class="filled-in chk-col-pink">
                            <label for="rememberme">Remember Me</label>
                        </div>
                        <div class="col-xs-4">
                      
                      
                            <a class="btn btn-block bg-blue waves-effect" href="{{ url('/srhome') }}">SIGN IN</a>
                        </div>
                    </div>
                    <div class="row m-t-15 m-b--20">
                        <div class="col-xs-6">
                            <a style="visibility:hidden;" href="sign-up.html">Register Now!</a>
                        </div>
                        <div class="col-xs-6 align-right">
                            <a href="{{ url('/forgot') }}">Forgot Password ?</a>
                        </div>
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