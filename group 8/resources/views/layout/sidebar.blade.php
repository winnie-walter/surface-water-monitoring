<a href="#" class="brand-link byserSidebar">
    <img src="{{ asset('dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
        style="opacity: .8">

    <span class="brand-text font-weight-light">Water Monitoring</span>

</a>
<div class="sidebar byserSidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 d-flex mb-4">


            <div class="image">
                <img src="{{ asset('dist/img/avatar3.png') }}"
                    class="img-circle elevation-2" alt="User Image">
            </div>

        <div class="info">
            <a href="#" class="d-block">
               <p>{{ Auth::user()->first_name}} {{ Auth::user()->last_name}}</p>
            </a>
    </div><br><br>
    </div>
    <div class="user-panel mt-3 d-flex mb-4">


    <div class="d-block" style="color: white">
        @foreach(Auth::user()->getRoleNames() as $v)
    {{ $v }}
    @endforeach
</div>
</div>


    <!-- Sidebar Menu -->
    <nav>
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->

             <li class="nav-item">
                <a href="{{ route('graphs') }}"  class="nav-link active">
                    <i class="far fa-circle nav-icon"></i>
                    <p>
                        Dashboard

                    </p>
                </a>
            </li>

              
    <li class="nav-item">
        <a href="#" class="nav-link">
            <i class="nav-icon fas fa-copy"></i>
            <p>
            user management
            <i class="fas fa-angle-left right"></i>
            
            </p>
        </a>
            <ul class="nav nav-treeview">
            @can('View User')


                <li class="nav-item">
                    <a href="{{ route('users') }}"  class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>
                            User

                        </p>
                    </a>
                </li>
                @endcan
                @can('View Roles')


                <li class="nav-item">
                    <a href="{{ route('role') }}"  class="nav-link ">
                        <i class="far fa-circle nav-icon"></i>
                        <p>
                            Roles

                        </p>
                    </a>
                </li>
                @endcan
           </ul>

        </li>

        
            <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                water monitoring data
                <i class="fas fa-angle-left right"></i>
                
              </p>
            </a>
            <ul class="nav nav-treeview">
            @can('View temperature Data')
            <li class="nav-item">
            <a href="{{ route('temperature') }}" class="nav-link ">
                <i class="far fa-circle nav-icon"></i>
                    <p>Temperature</p>
            </a>
            </li>
            @endcan
            @can('View Water level Data')


            <li class="nav-item">
                <a href="{{ route('humidity') }}" class="nav-link ">

                    <i class="far fa-circle nav-icon"></i>
                    <p>Waterlevel</p>
                </a>
            </li>
            @endcan
            @can('View flowrate Data')
            <li class="nav-item">
                <a href="{{ route('wind') }}" class="nav-link ">

                    <i class="far fa-circle nav-icon"></i>
                    <p>FlowRate</p>
                </a>
            </li>
            @endcan
        </ul>

        </li>

         
           
        <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Report
                <i class="fas fa-angle-left right"></i>
                
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
              <a href="{{ route('reporttemp') }}" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Temperature report</p>
                </a>
              </li>
              <li class="nav-item">
              <a href="{{ route('reportflow') }}" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Flow-rate report</p>
                </a>
              </li>
              <li class="nav-item">
              <a href="{{ route('waterlevel') }}" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Waterlevel report</p>
                </a>
              </li>
            </ul>

        </li>

        </ul>
        
        
    </nav>
    <!-- /.sidebar-menu -->
</div>
