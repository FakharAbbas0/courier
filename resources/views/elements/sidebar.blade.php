<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element">

                    <?php
                    if (isset(Auth::user()->image)){
                        $image_url = URL::to('uploads/images/admins/'.Auth::user()->image);
                    }else{
                        $image_url = URL::to('img/no-image.png');
                    }
                    ?>

                    <span>
                        <img alt="image" class="img-circle" src="{{ $image_url }}" />
                    </span>

                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <span class="clear">
                            <span class="block m-t-xs"> <strong class="font-bold">{{ Auth()->user()->name }}</strong>
                            </span> <span class="text-muted text-xs block">Shop Manager<b class="caret"></b></span>
                        </span>
                    </a>
                    <ul class="dropdown-menu animated fadeInRight m-t-xs">
                        <li><a href="{{ route('profile') }}"><i class="fa fa-user-circle-o" aria-hidden="true"></i> Profile</a></li>
                        <li><a href="{{ route('changePassword') }}"><i class="fa fa-shield" aria-hidden="true"></i> Change Password</a></li>
                        <li class="divider"></li>
                        <li>
                            <a href="" onclick="event.preventDefault(); document.getElementById('logout-form').submit()";>
                                <i class="fa fa-sign-out"></i> Log out
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
                </div>
                <div class="logo-element">
                    IN+
                </div>
            </li>

            <li class="{{ (currentController() == 'DashboardController')?'active':'' }}">
                <a href="{{ url('/') }}"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboard</span></a>
            </li>

            @role('admin')

                @php
                    $active_adminstration = ((currentController() == 'PermissionController')
                                            OR (currentController() == 'RoleController') )?'active':'';
                @endphp

                <li class="{{ $active_adminstration }}">
                    <a href="index.html"><i class="fa fa-user-secret" aria-hidden="true"></i> <span class="nav-label">Administration</span> <span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li class="{{ (currentController() == 'PermissionController')?'active':'' }}"><a href="{{ route('permissions.index') }}">Manage Permission</a></li>
                        <li class="{{ (currentController() == 'RoleController')?'active':'' }}"><a href="{{ route('roles.index') }}">Manage Role</a></li>
                    </ul>
                </li>


                <li class="{{ (currentController() == 'CustomerController')? 'active':'' }}">
                    <a href="{{ route('customers.index') }}"><i class="fa fa-user-secret" aria-hidden="true"></i> <span class="nav-label">Customer</span> </a>
                </li>

                <li class="{{ (currentController() == 'ParentController')? 'active':'' }}">
                    <a href="{{ route('parents.index') }}"><i class="fa fa-users" aria-hidden="true"></i> <span class="nav-label">Parent</span> </a>
                </li>

                <li class="{{ (currentController() == 'StudentController')? 'active':'' }}">
                    <a href="{{ route('students.index') }}"><i class="fa fa-graduation-cap" aria-hidden="true"></i> <span class="nav-label">Student</span> </a>
                </li>

                <li class="{{ (currentController() == 'CityController')? 'active':'' }}">
                    <a href="{{ route('city.index') }}"><i class="fa fa-th" aria-hidden="true"></i> <span class="nav-label">Cities</span> </a>
                </li>

            @endrole

            @role('customer|student|admin')
                <li class="{{ (currentController() == 'AttendanceController')? 'active':'' }}">
                    <a href="{{ route('attendances.index') }}"><i class="fa fa-address-book-o" aria-hidden="true"></i> <span class="nav-label">Attendance</span> </a>
                </li>
            @endrole


            @role('admin')
                <li class="{{ (currentController() == 'ReportController')? 'active':'' }}">
                    <a href="{{ route('reports.index') }}"><i class="fa fa-child" aria-hidden="true"></i> <span class="nav-label">Report</span> </a>
                </li>
            @endrole
            @php
                $active_settings = ((currentController() == 'CityController') OR (currentController() == 'ZoneController') OR (currentController() == 'ServiceController') )?'active':'';
            @endphp

            <li class="{{ $active_settings }}">
                <a href="index.html"><i class="fa fa-user-secret" aria-hidden="true"></i> <span class="nav-label">Settings</span> <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li class="{{ (currentController() == 'CityController')?'active':'' }}"><a href="{{ route('city.index') }}">Cities</a></li>
                    <li class="{{ (currentController() == 'ZoneController')?'active':'' }}"><a href="{{ route('zones.index') }}">Zones</a></li>
                    <li class="{{ (currentController() == 'ServiceController')?'active':'' }}"><a href="{{ route('services.index') }}">Services</a></li>
                </ul>
            </li>

        </ul>

    </div>
</nav>
