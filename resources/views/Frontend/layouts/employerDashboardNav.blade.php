<div class="dashboard-wrap bg-light">
    <a class="mobNavigation" data-toggle="collapse" href="#MobNav" role="button" aria-expanded="false" aria-controls="MobNav">
        <i class="fas fa-bars mr-2"></i>Dashboard Navigation
    </a>
         <div class="collapse" id="MobNav">
            <div class="dashboard-nav">
                <div class="dashboard-inner">
                    <ul data-submenu-title="Main Navigation">
                        <li class="{{ request()->is('employer/dashboard') ? 'active' : '' }}"><a href="{{ route('employer.dashboard') }}"><i class="lni lni-dashboard mr-2"></i>Dashboard</a></li>
                        <li class="{{ request()->is('employer/hiring/post') ? 'active' : '' }}"><a href="{{ route('employer.hiring.view') }}"><i class="lni lni-files mr-2"></i>Post New Job</a></li>
                        <li class="{{ request()->is('employer/hirings') ? 'active' : '' }}"><a href="{{ route('employer.hiring.list') }}"><i class="lni lni-add-files mr-2"></i>Manage Jobs</a></li>
                        <li class="{{ request()->is('employer/applicants') ? 'active' : '' }}"><a href="{{ route('manage.applications') }}"><i class="lni lni-briefcase mr-2"></i>Manage Applicants</a></li>
                        {{-- <li class="{{ request()->is('about') ? 'active' : '' }}"><a href="dashboard-shortlisted-resume.html"><i class="lni lni-bookmark mr-2"></i>BookmarkResumes<span class="count-tag bg-warning">4</span></a></li> --}}
                        <li class="{{ request()->is('employer/boost') ? 'active' : '' }}"><a href="{{ route('employer.employee.boost') }}"><i class="lni lni-mastercard mr-2"></i>Boost Jobs</a></li>
                        <li class="{{ request()->is('employer/chat') ? 'active' : '' }}"><a href="{{ route('chat') }}"><i class="lni lni-envelope mr-2"></i>Messages{{--<span class="count-tag">4</span> --}}</a></li> 
                    </ul>
                    <ul data-submenu-title="My Accounts">
                        <li class="{{ request()->is('employer/profile') ? 'active' : '' }}"><a href="{{ route('employer.profile') }}"><i class="lni lni-user mr-2"></i>My Profile </a></li>
                        <li class="{{ request()->is('employer/password/change') ? 'active' : '' }}"><a href="{{ route('employer.password.change') }}"><i class="lni lni-lock-alt mr-2"></i>Change Password</a></li>
                        {{-- <li><a href="javascript:void(0);"><i class="lni lni-trash-can mr-2"></i>Delete Account</a></li> --}}
                        <li><a href="{{ route('employer.logout') }}"><i class="lni lni-power-switch mr-2"></i>Log Out</a></li>
                    </ul>
                </div>					
            </div>
        </div>
        