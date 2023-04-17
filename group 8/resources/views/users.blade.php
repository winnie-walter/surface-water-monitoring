@extends('layout.app')
{{-- @section('content') --}}



  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    @if(session()->has('error'))
<div class="alert alert-danger alert-dismissible">
               <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
               <h5><i class="icon fas fa-check"></i> Error!</h5>
               <p color="white">{{ session()->get('error') }}
             </div>
@endif
@if(session()->has('message'))
   <div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-check"></i> Info!</h5>
                  <p color="white">{{ session()->get('message') }}
                </div>
@endif
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"><span class="fa fa-male"></span> Users</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Users</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->

              <div class="card card-primary card-outline">
                {{-- @can('ongeza-muuzaji') --}}
              <div class="card-header">
                <h3 class="card-title"> Users</h3>
                @can('Add User',)
                <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#modal-lgg"> <span class="fa fa-plus"></span> Add user</button>
            @endcan
            </div>
              {{-- @endcan --}}
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>S/no</th>
                    <th>Name</th>
                    <th>Addess</th>
                    <th>phone</th>
                    <th>email</th>
                    <th>gender</th>
                    <th>Status</th>
                    <th>Role</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                @foreach ($user as $user)
                {{-- @if (!empty($user->branch->name)) --}}

                   <tr>
                     <td>{{ $loop->iteration }}</td>
                     <td>{{ $user->first_name }} {{ $user->last_name }}</td>
                     <td>{{ $user->address }}</td>
                     <td>{{ $user->phone}}</td>
                     <td>{{ $user->email }}</td>
                     <td>{{ $user->gender}}</td>
                     @if (($user->status)==1)
                     <td style="color: blue"> ACTIVE  </td>
                     @else
                     <td style="color: red"> BLOCKED  </td>
                     @endif


                     @foreach($user->getRoleNames() as $v)
                     <td>{{ $v }}</td>
                     @endforeach
                     <td>
                        @can('Edit User')
                        <button type="button" class="btn btn-small btn-secondary" data-toggle="modal" data-target="#modal-secondary{{ $user->id }}"><span class="fa fa-edit"></span></button>
                        @endcan
                        @can('Delete User')
                        <button class="btn btn-small btn-danger" data-toggle="modal" data-target="#modal-danger{{ $user->id }}"><span class="fa fa-trash"></span></button>
                        @endcan

                        @if (($user->status)==1)
                        @can('block user')
                        <form method="POST" action="block/{{ $user->id }}">
                            {{ csrf_field() }}

                          <input type="hidden" name="proid" value="{{ $user->id }}">
                          <button type="submit" class="btn btn-small btn-danger"><span class="fa fa-ban"></span></button>
                    </form>
                    @endcan

                        @else
                        @can('unblock user')
                        <form method="POST" action="block/{{ $user->id }}">
                            {{ csrf_field() }}

                          <input type="hidden" name="proid" value="{{ $user->id }}">
                          <button type="submit" class="btn btn-small btn-primary"><span class="fa fa-unlock"></span></button>
                    </form>
                    @endcan
                        @endif

                    </td>
                    <div class="modal fade" id="modal-danger{{ $user->id }}">
                        <div class="modal-dialog">
                          <div class="modal-content bg-danger">
                            <div class="modal-header">
                              <h4 class="modal-title">Delete User</h4>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                          <form method="POST" action="user/delete/{{ $user->id }}">
                                  {{ csrf_field() }}
                                  @method('DELETE')
                                <input type="hidden" name="proid" value="{{ $user->id }}">
                              <p>Are you Sure You want to delete <b>{{ $user->first_name }} {{ $user->last_name }} </b></p>
                            </div>
                            <div class="modal-footer justify-content-between">
                              <button type="button" class="btn btn-outline-light" data-dismiss="modal">close</button>
                              <button type="submit" name="remove" class="btn btn-outline-light">delete</button>

                            </div>
                          </form>


                          </div>
                          <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                      </div>







                      <div class="modal fade" id="modal-secondary{{ $user->id }}">
                          <div class="modal-dialog">
                            <div class="modal-content bg-secondary">
                              <div class="modal-header">
                                <h4 class="modal-title">Edit User</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                            <form method="POST" action="user/edit/{{ $user->id }}">
                                    {{ csrf_field() }}

                                  <input type="hidden" name="proid" value="{{ $user->id }}">
                                <p>Edit User </p>

                                <p>
                                    <div class="row">
                                      <div class="col col-md-6">
                                        <label>First Name</label>
                                        <input type="text" name="first_name" class="form-control" value="{{ $user->first_name }}" required>
                                      </div>
                                      <div class="col col-md-6">
                                        <label>Last Name</label>
                                        <input type="text" name="last_name" class="form-control" value="{{ $user->last_name }}" required>
                                      </div>
                                    </div>
                                    <div class="row">
                                      <div class="col col-md-6">
                                        <label>Address</label>
                                        <input type="text" name="address" class="form-control" value="{{ $user->address }}" required>
                                      </div>
                                      <div class="col col-md-6">
                                        <label>Phone</label>
                                        <input type="text" name="phone" class="form-control" value="{{ $user->phone }}" required>
                                      </div>
                                    </div>
                                    <div class="row">
                                      <div class="col col-md-6">
                                        <label>Email</label>
                                        <input type="email" name="email" class="form-control" value="{{ $user->email }}" required>
                                      </div>
                                      <div class="col col-md-6">
                                        <label>Gender</label>
                                        <select class="form-control" name="gender">
                                            @if ( $user->gender == 'ME')
                                            <option disabled selected>--</option>

                                          <option value="ME" selected>{{ $user->gender}}</option>
                                          <option value="FE">FE</option>
                                          @else
                                          {{-- <option disabled selected>--</option> --}}

                                          <option value="ME">ME</option>
                                          <option value="FE" selected>{{ $user->gender}}</option>
                                          @endif
                                        </select>
                                      </div>
                                    </div>
                                    <div class="row">
                                      <div class="col col-md-6">
                                        <label>Role</label>
                                        <select class="form-control" name="roles">
                                            <option disabled selected value>--</option>

                                            @foreach ($roles as $role)

                                             @if (!empty($user->roles->first()->name) && ($role->name == $user->roles->first()->name))



                                             <option value="{{ $user->roles->first()->name }}" selected>{{ $user->roles->first()->name }}</option>
                                             @else

                                             <option value="{{ $role->id }}">{{ $role->name }}</option>
                                             @endif

                                            @endforeach


                                          </select>
                                      </div>

                                    </div>

                                  </p>
                              </div>
                              <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                                <button type="submit" name="remove" class="btn btn-outline-light">Continue</button>

                              </div>
                            </form>


                            </div>
                            <!-- /.modal-content -->
                          </div>
                          <!-- /.modal-dialog -->
                        </div>
                   </tr>
                   {{-- @endif --}}
                   @endforeach
                  </tbody>

                </table>
              </div>
              <!-- /.card-body -->
            </div>


        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    <form method="post" action="{{ route('user.create') }}">
        @csrf
     <div class="modal fade" id="modal-lgg">
        <div class="modal-dialog modal-lgg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Add User</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p>
                <div class="row">
                  <div class="col col-md-6">
                    <label>Firt Name</label>
                    <input type="text" name="first_name" class="form-control" placeholder="First Name..." required>
                  </div>
                  <div class="col col-md-6">
                    <label>Last Name</label>
                    <input type="text" name="last_name" class="form-control" placeholder="Last Name..." required>
                  </div>
                </div>
                <div class="row">
                  <div class="col col-md-6">
                    <label>Address</label>
                    <input type="text" name="address" class="form-control" placeholder="Address..." required>
                  </div>
                  <div class="col col-md-6">
                    <label>Phone</label>
                    <input type="text" name="phone" class="form-control" placeholder="Phone number..." required>
                  </div>
                </div>
                <div class="row">
                  <div class="col col-md-6">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" placeholder="Email..." required>
                  </div>
                  <div class="col col-md-6">
                    <label>Gender</label>
                    <select class="form-control" name="gender">
                      <option>--</option>
                      <option value="ME">ME</option>
                      <option value="FE">FE</option>
                    </select>
                  </div>
                </div>
                <div class="row">
                  <div class="col col-md-6">
                    <label>Role</label>
                    <select class="form-control" name="roles">
                        <option disabled selected value>--</option>
                        @foreach ($roles as $role)
                        <option value="{{ $role->name }}">{{ $role->name }}</option>
                        @endforeach


                      </select>
                  </div>

                </div>

              </p>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button name="add" class="btn btn-primary">Add</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      </form>
      <!-- /.modal -->
  </div>

<script src="{{ asset('plugins/jquery/jquery.min.js')}}"></script>
<script>
   $(function () {
     $("#example1").DataTable({
       "responsive": true, "lengthChange": false, "autoWidth": false,
       "buttons": ["copy", "csv", "excel", "pdf", "print"]
     }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

   });
 </script>
