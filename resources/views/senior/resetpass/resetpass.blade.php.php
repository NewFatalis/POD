<!DOCTYPE html>
<html lang="en">
<title>
    @section('title')
        Reset Password | Prefect of Discipline Students Violation Monitoring System
</title>
@section('header')
    @include('senior.auth.partials.header')
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
                    <div class="msg">Reset Password Settings</div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="ion-locked    "></i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="currentpass" placeholder="Current Password" required autofocus>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="md-lock"></i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="newpass" placeholder="New Password" required>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="md-lock"></i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="confirmpass" placeholder="Confirm Password" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-5 pull-right">
                            <a class="btn btn-block bg-blue waves-effect" href="{{ url('/') }}">Save Changes</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @section('scripts')
        @include('senior.auth.partials.scripts')
    @show
</body>
</html>