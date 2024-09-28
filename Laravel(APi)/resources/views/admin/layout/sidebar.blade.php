  <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="{{ url('admin/dashboard') }}" class="brand-link">
          <img src="{{ asset('admin/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
              class="brand-image img-circle elevation-3" style="opacity: .8">
          <span class="brand-text font-weight-light">AdminLTE 3</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
          <!-- Sidebar user panel (optional) -->
          <div class="user-panel mt-3 pb-3 mb-3 d-flex">
              <div class="image">
                  <img src="{{ asset('admin/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
              </div>
              <div class="info">
                  <a href="#" class="d-block">Admin</a>
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

                  <li class="nav-item menu-open">
                      <a href="{{ url('admin/dashboard') }}" class="nav-link">
                          <i class="nav-icon fas fa-tachometer-alt"></i>
                          <p>
                              Dashboard
                          </p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="#" class="nav-link">
                          <i class="fa-solid fa-user-graduate"></i>
                          <p>
                              Students
                              <i class="fas fa-angle-left right"></i>
                              <span class="badge badge-info right">6</span>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="{{ url('student/create') }}" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Add studnet</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="{{ url('student/index') }}" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Show All students</p>
                              </a>
                          </li>
                      </ul>
                  <li class="nav-item">
                      <a href="#" class="nav-link">
                          <i class="fas fa-chalkboard-teacher"></i>
                          <p>
                              Teachers
                              <i class="right fas fa-angle-left"></i>
                              <span class="badge badge-info right">6</span>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="{{ url('teacher/create') }}" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Add Teacher</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="{{ url('teacher') }}" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Show All Teachers</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="{{ url('teacher/courses') }}" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Course</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="{{ url('teacher/grades', '66f746869153139fd80d3593') }}" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Grades</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="{{ url('teacher/grades_teacher') }}" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Grades Teacher</p>
                              </a>
                          </li>
                      </ul>
                  </li>


                  <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
  </aside>
