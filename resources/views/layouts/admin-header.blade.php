<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                <div class="button-div">
                    <button id="sidebarToggleTop"
                        class="btn btn-link d-md-none rounded-circle mr-3 bg-success text-white">
                        <i class="fa fa-bars"></i>
                    </button>
                </div>
                <!-- Sidebar Toggle (Topbar) -->

                <!-- Topbar Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Nav Item - User Information -->
                    <li class="nav-item dropdown no-arrow mx-1">

                            <div class="notification-icon">
                                <a href="#" class="nav-link dropdown-toggle" id="alertsDropdown" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-bell fa-fw text-success"></i>
                                    <span class="badge badge-danger badge-counter"
                                        id="notificationCount">{{ auth()->user()->unreadNotifications->count() }}</span>
                                
                                </a>


                            </div>
                            <!-- Dropdown - Alerts -->
                            @include('notifications')
                        </li>
                    <li class="nav-item dropdown no-arrow d-flex align-items-center">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <!-- <span class="mr-2 d-none d-lg-inline text-gray-600 small">@if(auth()->check())
                                    {{ auth()->user()->name}}@endif</span> -->
                            <img class="img-profile rounded-circle" src="{{asset('images/undraw_profile.svg')}}">
                        </a>
                        <!-- Dropdown - User Information -->
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in md"
                            aria-labelledby="userDropdown" style="left: -95px !important; width: 0;">

                            <a class="dropdown-item text-success"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-success"></i>
                                {{ __('messages.Logout') }}
                            </a>
                        </div>

                    </li>

                </ul>

            </nav>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf
            </form>