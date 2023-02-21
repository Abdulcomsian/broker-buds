  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4" style="display: none">
      <!-- Brand Logo -->
      <a href="index3.html" class="brand-link">
          <img src="{{ asset('images/brandLogo.png') }}" alt="AdminLTE Logo"
              class="brand-image img-circle" style="opacity: .8">
          <span class="brand-text font-weight-light">BROKER BUDS</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
          <!-- Sidebar user panel (optional) -->
          <div class="user-panel mt-3 pb-3 mb-3 d-flex">
              <div class="image">
                  <img src="{{ asset('backend/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2"
                      alt="User Image">
              </div>
              <div class="info">
                  <a href="#" class="d-block">{{Auth::user()->name}}</a>
              </div>
          </div>

          <!-- SidebarSearch Form -->
          <div class="form-inline">
              <div class="input-group" data-widget="sidebar-search">
                  <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                      aria-label="Search">
                  <div class="input-group-append">
                      <button class="btn btn-sidebar">
                          <i class="fas fa-search fa-fw"></i>
                      </button>
                  </div>
              </div>
          </div>

          <!-- Sidebar Menu -->
          <nav class="mt-2">
              <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                  data-accordion="false">
                  <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                  <li class="nav-item">
                      <a href="{{ route('admin.dashboard') }}"
                          class="nav-link {{ request()->is('admin/dashboard') ? 'active' : '' }}">
                          <i class="nav-icon fas fa-tachometer-alt"></i>
                          <p>
                              Dashboard
                          </p>
                      </a>
                  </li>
                  @can('view user')
                  <li class="nav-item" style="margin-right: 26px">
                      <a href="#" class="nav-link">
                          <i class="nav-icon fas fa-user-alt"></i>
                          <p>
                              Manage Users
                              <i class="right fas fa-angle-left"></i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="{{ route('users.index') }}"
                                  class="nav-link {{ request()->is('admin/users') ? 'active' : '' }}">
                                  <i class="nav-icon fas fa-user-alt"></i>
                                  <p>
                                      Users
                                  </p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="{{ route('users.create') }}"
                                  class="nav-link {{ request()->is('admin/users/create') ? 'active' : '' }}">
                                  <i class="nav-icon fas fa-user-alt"></i>
                                  <p>
                                      Add User
                                  </p>
                              </a>
                          </li>
                          <!-- <li class="nav-item">
                              <a href="{{ route('user.profile') }}"
                                  class="nav-link {{ request()->is('admin/profile-setting') ? 'active' : '' }}">
                                  <i class="nav-icon fas fa-user-alt"></i>
                                  <p>
                                      Update Profile
                                  </p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="{{ route('roles.index') }}"
                                  class="nav-link {{ request()->is('admin/roles') ? 'active' : '' }}"">
                                    <i class="         nav-icon fas fa-user-tag"></i>
                                  <p>
                                      Roles
                                  </p>
                              </a>
                          </li> -->
                      </ul>
                  </li>
                  @endcan

              
                  @if(!is_null(auth()->user()->sheet->last()) ||  in_array('Admin' , auth()->user()->roles->pluck('name')->toArray()))
                  <a href="{{ route('google.spreadsheet') }}"
                    class="nav-link {{ request()->is('get-gooogle-spreadsheet') ? 'active' : '' }}">
                    <i class="fa fa-solid fa-file mr-2 pl-1"></i>
                    <p>
                       View Sheet
                    </p>
                 </a>
                  @endif

                  {{-- <li class="nav-item">
                      <a href="{{ route('setting.index') }}"
                          class="nav-link {{ request()->is('admin/setting') ? 'active' : '' }}"">
                          <i class=" nav-icon fas fa-cog"></i>
                          <p>
                              Settings
                          </p>
                      </a>
                  </li> --}}
                  <!-- <li class="nav-item">
                      <a href="#" class="nav-link">
                          <i class="nav-icon fas fa-cog"></i>
                          <p>
                              General Settings
                              <i class="right fas fa-angle-left"></i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="{{ route('admin.general.site.identity') }}"
                                  class="nav-link {{ request()->is('admin/users') ? 'active' : '' }}">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>
                                      Site Identity
                                  </p>
                              </a>
                          </li>
                      </ul>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="{{ route('admin.general.site.identity') }}"
                                  class="nav-link {{ request()->is('admin/users') ? 'active' : '' }}">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>
                                      Basic Setting
                                  </p>
                              </a>
                          </li>
                      </ul>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="{{ route('admin.general.smtp.settings') }}"
                                  class="nav-link {{ request()->is('admin/profile-setting') ? 'active' : '' }}">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>
                                      SMTP Settings
                                  </p>
                              </a>
                          </li>
                      </ul>
                  </li> -->
                  <!-- <li class="nav-item">
                    <a href="{{ route('logs.index') }}"
                        class="nav-link {{ request()->is('admin/dashboard') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-exclamation-circle"></i>
                        <p>
                            Logs
                        </p>
                    </a>
                </li> -->
                  <li class="nav-item">
                      <a href="{{ route('logout') }}"
                          onclick="event.preventDefault();document.getElementById('logout-form').submit();"
                          class="nav-link">
                          <i class="nav-icon fas fa-sign-out-alt"></i>
                          <p>
                              Logout
                          </p>
                      </a>
                  </li>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      @csrf
                  </form>
              </ul>
          </nav>
          <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
  </aside>
