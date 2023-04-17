<nav class="main-header navbar navbar-expand navbar-white navbar-light text-sm nav-default">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>

    </ul>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <img src="{{ asset('dist/img/avatar.png') }}" style="height: 20px; width: 20px;" alt="user-image"
                    class="img-size-50 mr-3 img-circle">
                <span class="fas fa-caret-down"></span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right" style="left: inherit; right: 0px;">
                <a href="#" class="dropdown-item"  data-toggle="modal" data-target="#modal-default">
                    <div class="media">
                        <div class="media-body">
                            <h3 class="dropdown-item-title" >
                                Change Password
                                <span class="float-right text-sm text-green"><i class="fas fa-star"></i></span>
                            </h3>
                            <p class="text-sm text-muted"><i class="fas fa-key green"></i> Change Password</p>
                        </div>
                    </div>
                </a>



                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item"  data-toggle="modal" data-target="#modal-lg">
                    <div class="media">
                        <div class="media-body">
                            <h3 class="dropdown-item-title" >
                                Credentials
                                <span class="float-right text-sm text-blue"><i class="fas fa-star"></i></span>
                            </h3>
                            <p class="text-sm text-muted"><i class="fas fa-user black"></i> Profile</p>
                        </div>
                    </div>
                </a>
                <div class="dropdown-divider"></div>
                <a href="{{route('logout')}}" class="dropdown-item" role="button">
                    <div class="media">
                        <div class="media-body">
                            <h3 class="dropdown-item-title">
                                Logout
                                <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                            </h3>
                            <p class="text-sm text-muted"><i class="fas fa-power-off red"></i>Logout</p>
                        </div>
                    </div>
                </a>
            </div>


        </li>


        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li>
    </ul>


</nav>


<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Change Password</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="changepassword" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col col-md-12">
                            <label>Old Password</label>
                            <input type="text" name="old" class="form-control" placeholder="Password ya zamani">
                        </div>
                        <div class="col col-md-12">
                            <label><p>New Password</p></label>
                            <input type="text" name="new" class="form-control" placeholder="Password mpya">
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<form action="changeinfo" method="POST">
    @csrf
 <div class="modal fade" id="modal-lg">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Pofile Settings</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>
            <div class="row">
              <div class="col col-md-6">
                <label>First Namae</label>
                <input type="text" name="first_name" class="form-control" value="{{ Auth::user()->first_name }}" required>
              </div>
              <div class="col col-md-6">
                <label>Second Name</label>
                <input type="text" name="last_name" class="form-control" value="{{ Auth::user()->last_name }}" required>
              </div>
            </div>
            <div class="row">
              <div class="col col-md-6">
                <label>Address</label>
                <input type="text" name="address" class="form-control" value="{{ Auth::user()->address }}" required>
              </div>
              <div class="col col-md-6">
                <label>Phone</label>
                <input type="text" name="phone" class="form-control" value="{{ Auth::user()->phone }}" required>
              </div>
            </div>
            <div class="row">
              <div class="col col-md-6">
                <label>Email</label>
                <input type="email" name="email" class="form-control" value="{{ Auth::user()->email }}" required>
              </div>
              <div class="col col-md-6">
                <label>Gender</label>
                <select class="form-control" name="gender">
                  <option>--</option>
                  @if(Auth::user()->gender == "ME")
                  <option value="ME" selected>ME</option>
                  <option value="FE">FE</option>
                  @else
                  <option value="ME">ME</option>
                  <option value="FE" selected>FE</option>
                  @endif
                </select>
              </div>
            </div>
          </p>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Funga</button>
          <button type="submit" class="btn btn-primary">Ongeza</button>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  </form>



