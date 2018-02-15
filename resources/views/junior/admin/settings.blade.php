@extends('junior.admin.layouts.dashboard')
@section('title', 'Settings | Prefect of Discipline Students Violation Monitoring System')
@section('content')
<div class="content">
    @if (Session::has('message'))
        <div class="alert {{ Session::get('alert-class', 'alert-info') }} alert-dismissable fade in">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            {{ Session::get('message') }}
        </div>
    @endif
<div class="wraper container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="bg-picture text-center" style="background-image:url('assets/images/big/bg.jpg')">
                <div class="bg-picture-overlay"></div>
                <div class="profile-info-name">
                    <?php if(empty($user->upload)): ?>
                    <img src="{{asset('assets/images/users/cus8.png')}}" class="thumb-lg img-circle img-thumbnail" alt="profile-image">
                    <?php else: ?>
                    <img src="{{asset('assets/images/users/')}}<?php echo '/'.$user->upload;?>" class="thumb-lg img-circle img-thumbnail" alt="profile-image">
                    <?php endif; ?>

                    <h3 class="text-white">{{$user->username}}</h3>
                </div>
            </div>
            <!--/ meta -->
        </div>
    </div>
    <form role="form" method="POST" action="{{ route('junior.updateSettings')}}" enctype="multipart/form-data">
        {{csrf_field()}}
    <div class="row user-tabs">
        <div class="col-sm-9 col-lg-6">
            <ul class="nav nav-tabs tabs">
            <li class="active tab"> 
                <a href="#settings-2" data-toggle="tab" aria-expanded="false" class="active"> 
                    <span class="visible-xs"><i class="fa fa-cog"></i></span> 
                    <span class="hidden-xs">Settings</span> 
                </a> 
            </li> 
            <li class="tab">
                <a href="#home-2" data-toggle="tab" aria-expanded="false"> 
                    <span class="visible-xs"><i class="fa fa-home"></i></span>
                </a> 
            </li> 
        <div class="indicator"></div></ul> 
        </div>
        <div class="hidden-xs col-sm-3 col-lg-6">
            <div class="pull-right">
                <button type="button" class="fileupload btn btn-info waves-effect waves-light">
                    <span><i class="ion-android-camera"></i> Upload a Photo</span>
                    <input type="file" name="upload" id="upload" class="upload">
                </button>         
              </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12"> 
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        <div class="tab-content profile-tab-content"> 
            <div class="tab-pane active" id="settings-2">
                <div class="panel panel-default panel-fill">
                    <div class="panel-heading"> 
                        <h3 class="panel-title">Account Settings</h3> 
                    </div> 
                    <div class="panel-body"> 

                            <div class="form-group">
                                <label for="FullName">Full Name</label>
                                <input type="text" id="FullName" name="username" class="form-control" value="{{ $user->username }}">
                            </div>
                            <div class="form-group">
                                <label for="Email">Email</label>
                                <input type="email" id="Email" name="email" class="form-control" value="{{ $user->email }}">
                            </div>
                            <div class="form-group">
                                <label for="Password">Password</label>
                                <input type="password" name="password" id="Password" class="form-control" placeholder="6 - 15 Characters">
                            </div>
                            <div class="form-group">
                                <label for="RePassword">Confirm Password</label>
                                <input type="password" name="password_confirmation" id="RePassword" class="form-control" placeholder="6 - 15 Characters">
                            </div>
                            <button class="btn btn-success waves-effect waves-light" type="submit"><i class="md md-check"></i> Save Changes</button>


                    </div> 
                </div>
            </div>
        </div>

    </div>
    </div>
    </form>
</div>
</div>
@section('footer')
    @include('junior.student.includes.footer')
@show
@endsection