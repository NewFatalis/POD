<div class="left side-menu">
        <div class="sidebar-inner slimscrollleft">
            <div class="user-details">
                <div class="pull-left">
                    <?php if(empty(Auth::User()->upload)): ?>
                    <img src="{{asset('assets/images/users/cus8.png')}}" class="thumb-md img-circle" alt="profile-image">
                    <?php else: ?>
                    <img src="{{asset('assets/images/users/')}}<?php echo '/'.Auth::User()->upload;?>" class="thumb-md img-circle" alt="profile-image">
                    <?php endif; ?>
                </div>
                <div class="user-info">
                    <div class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">{{Auth::User()->username}}</a>
                    </div>
                    
                    <p style="color:#fff;" class="text-muted m-0">{{ucfirst(Auth::User()->role)}}</p>
                </div>
            </div>
            <!--- Divider -->
            <div id="sidebar-menu">
                <ul>
                    <li>
                        <a href="{{ url('/srhome') }}" class="waves-effect"><i class="md md-dashboard"></i><span>Dashboard </span></a>
                    </li>
                    <li>
                        <a href="{{ url('/senior/students/') }}" class="waves-effect"><i style="font-size: 20px;" class="ion-ios7-people"></i><span>Student Management</span></a>
                    </li>

                     <li>
                        <a href="{{ url('/senior/offense/') }}" class="waves-effect"><i class="md md-assignment-late"></i><span>Student Offense</span></a>
                    </li>

                    <li>
                        <a href="{{url('/senior/records/')}}" class="waves-effect"><i class="ion-android-book"></i><span>Stud. Offense Records</span></a>
                    </li>

                    <li class="has_sub">
                        <a href="#" class="waves-effect"><i class="md md-perm-data-setting"></i><span>File Maintenance </span><span class="pull-right"><i class="md md-add"></i></span></a>
                        <ul class="list-unstyled">
                            <li><a href="{{url('/senior/violation/')}}"><i class="ion-ios7-paper"></i> Violations</a></li>
                            <li><a href="{{url('/senior/section/')}}"><i class="md md-format-list-numbered"></i> Sections</a></li>
                            <li><a href="{{url('/senior/schoolyear/')}}"><i class="md md-event-available"></i> School Year</a></li>
                            <li><a href="{{url('/senior/adviser')}}"><i class="md md-person-add"></i> Advisers</a></li>
                            <li><a href="{{url('/senior/sanction')}}"><i class="ion-ios7-paper"></i> Sanctions</a></li>
                        </ul>
                    </li>

                    <li class="has_sub">
                        <a href="#" class="waves-effect"><i class="fa fa-file"></i><span>Reports</span><span class="pull-right"><i class="md md-add"></i></span></a>
                        <ul class="list-unstyled">
                            <li><a href="{{url('/srmonthly')}}"><i class="fa fa-calendar"></i> Monthly Reports</a></li>
                            <li><a href="{{url('/sryearly')}}"><i class="fa fa-calendar"></i> Yearly Reports</a></li>

                        </ul>
                    </li>
                    {{-- <li class="has_sub">
                        <a href="#" class="waves-effect"><i class="md md-textsms"></i><span>SMS</span><span class="pull-right"><i class="md md-add"></i></span></a>
                        <ul class="list-unstyled">
                            <li><a href="{{url('/senior/compose/')}}"><i class="fa fa-pencil"></i> Compose Message</a></li>
                            <li><a href="{{url('/senior/contacts/')}}"><i class="md-contacts"></i> Contacts</a></li>
                        </ul>
                    </li> --}}
                    <?php if(Auth::User()->role == 'administrator'): ?>
                    <li>
                        <a href="{{ url('/senior/users/') }}" class="waves-effect"><i class="ion-person-stalker"></i><span>User Management</span></a>
                    </li>
                    <?php endif; ?>

                     <li>
                        <a href="{{url('/senior/settings')}}" class="waves-effect"><i class="md md-settings"></i><span>Settings </span></a>
                    </li>

                     <li>
                        <a style="margin-left:2px;" href="{{url('/logout/')}}" class="waves-effect"><i style="font-size: 18.5px;" class="ion-log-out"></i><span>Sign Out </span></a>
                    </li>

                <div class="clearfix"></div>
            </div>
        <div class="clearfix"></div>
    </div>
</div>