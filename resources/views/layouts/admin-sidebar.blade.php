<ul class="nav nav-tabs navbar-nav bg-gradient-success sidebar sidebar-dark accordion" id="accordionSidebar">

        <li class=" py-2 mx-2 d-flex align-items-center">
            <a class="navbar-brand d-flex mx-auto" href="{{ route('home') }}">
                <img src=" {{asset('images/white-logo.jpeg')}}" class="d-lg-block d-none" id="toggleImage"
                     alt="logo" style="height: 65px; border-radius: 30px; width: 100%;">
            </a>
            <a class="navbar-brand d-flex mx-auto" href="{{ route('home') }}">
                <img src="{{asset('images/white-logo.jpeg')}}" id="toggleImage" class="d-lg-none d-sm-block AB-img"
                    alt="Image" style="height: 65px; border-radius: 30px; width: 100%;">
            </a>
            <div class="text-center d-none d-md-inline position-relative">
                <button class="rounded-circle border-0" id="sidebarToggle">
                    <div class="icons d-none">
                        <i class="fa-solid fa-angle-right"></i>
                    </div>
                </button>

            </div>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item {{ request()->routeIs('home') ? 'active' : '' }}">
            <a class="nav-link"  href="{{route('home')}}" 
                aria-controls="dashboard" aria-selected="false">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>{{ __('messages.Dashboard') }}</span>
            </a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">
        <!-- Nav Item - Tables -->
        <li class="nav-item {{ request()->routeIs('all.tutors') ? 'active' : '' }}">
            <a class="nav-link py-2" href="{{route('all.tutors')}}">
                <i class="fas fa-chalkboard-teacher"></i>
                <span>{{ __('messages.Teacher') }}</span>
            </a>
        </li>
        <hr class="sidebar-divider">
        <li class="nav-item {{ request()->routeIs('all.students') ? 'active' : '' }}">
            <a class="nav-link py-2" href="{{route('all.students')}}">
                <i class="fa-solid fa-user-graduate"></i>
                <span>{{ __('messages.Students') }}</span>
            </a>
        </li>
        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">
        <li class="nav-item {{ request()->routeIs('admin.inquiry') ? 'active' : '' }}">
            <a class="nav-link py-2" href="{{route('admin.inquiry')}}" role="tab">
                <i class="fa fa-question-circle" aria-hidden="true"></i>
                <span>{{ __('messages.Direct inquiry') }}
                </span>
            </a>
        </li>
        <hr class="sidebar-divider d-none d-md-block">
        <li class="nav-item {{ request()->routeIs('blogs.create') ? 'active' : '' }}">
            <a class="nav-link py-2" href="{{route('blogs.create')}}">
                <i class="fa-solid fa-blog" aria-hidden="true"></i>
                <span>{{ __('messages.Blogs') }}
                </span>
            </a>
        </li>
        <hr class="sidebar-divider d-none d-md-block">
        <li class="nav-item {{ request()->routeIs('all.blogs') ? 'active' : '' }}"">
            <a class="nav-link py-2" href="{{route('all.blogs')}}">
                <i class="fa-solid fa-blog" aria-hidden="true"></i>
                <span>{{ __('Blog List') }}
                </span>
            </a>
        </li> 
        <hr class="sidebar-divider d-none d-md-block">
        <li class="nav-item {{ request()->routeIs('admin.notifications') ? 'active' : '' }}"">
            <a class="nav-link py-2" href="{{route('admin.notifications')}}">
                <i class="fas fa-bell fa-fw" aria-hidden="true"></i>
                <span>{{ __('Notifications') }}
                </span>
            </a>
        </li>
    </ul>