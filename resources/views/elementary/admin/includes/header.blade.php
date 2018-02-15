<div class="topbar">
    <div class="topbar-left">
        <div class="text-center">
            <a href="{{url('/elementary/students/')}}" class="logo"><i class="md md-assignment-ind"></i> <span>P.O.D. </span></a>
        </div>
    </div>
    <div class="navbar navbar-default" role="navigation">
        <div class="container">
            <div class="">
                <div class="pull-left">
                    <button type="button" class="button-menu-mobile open-left">
                        <i class="fa fa-bars"></i>
                    </button>
                    <span class="clearfix"></span>
                </div>
                <form class="navbar-form pull-left" role="search">
                    <button type="submit" class="btn btn-search"><i class="fa fa-search"></i></button>
                </form>
                <ul class="nav navbar-nav navbar-right pull-right">
                    <li class="hidden-xs">
                        <a href="#" id="btn-fullscreen" class="waves-effect waves-light"><i class="md md-crop-free"></i></a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle profile" data-toggle="dropdown" aria-expanded="true">
                            <?php if(empty(Auth::User()->upload)): ?>
                            <img src="{{asset('assets/images/users/cus8.png')}}" class="img-circle" alt="profile-image">
                            <?php else: ?>
                            <img src="{{asset('assets/images/users/')}}<?php echo '/'.Auth::User()->upload;?>"  class="img-circle" alt="profile-image">
                            <?php endif; ?>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="{{url('/elementary/compose')}}"><i class="md md-textsms"></i> Send SMS</a></li>
                            <li><a href="{{url('/elementary/settings')}}"><i class="md md-settings"></i> Settings</a></li>
                            <li><a style="margin-left: 3px;" href="{{ route('logout') }}"><i class="ion-log-out"></i> Sign Out</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
