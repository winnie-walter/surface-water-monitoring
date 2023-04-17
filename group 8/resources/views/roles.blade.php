@extends('layout.app')

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
                  <h5><i class="icon fas fa-check"></i> Taarifa!</h5>
                  <p color="white">{{ session()->get('message') }}
                </div>
@endif
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"><span class="fa fa-map-marker"></span> Jukumu</h1>


                </div><!-- /.col -->

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Roles</li>
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
                {{-- @can('ongeza-jukumu') --}}
                <div class="card-header">
                    <h3 class="card-title">Roles</h3>
                    @can( 'Add Roles')
                    <button type="button" class="btn btn-primary float-right" data-toggle="modal"
                        data-target="#modal-defaultt"> <span class="fa fa-plus"></span> Add Role</button>
                        @endcan
                </div>
                {{-- @endcan --}}
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>

                            <tr>
                                <th>S/no</th>
                                <th>Responsibilty</th>
                                <th>Number of Roles</th>
                                <th>Roles</th>
                                <th>Edit</th>
                            </tr>
                        </thead>

                        <tbody>

                            @foreach($role as $r)

                            <tr>
                                <td>{{ $loop->iteration }}
                                <td>{{ $r->name }}</td>
                                <td>{{ $r->getPermissionNames()->count() }} </td>
                                <td>
                                    @foreach( $r->getPermissionNames() as $p)
                                    {{ $p }}<br>
                                    @endforeach
                                </td>


                                <td>
                                    @can('Edit Roles')
                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target="#modal-defaultt{{ $r->id }}"> <span class="fa fa-edit"></span></button>
                                    @endcan
                                    @can('Delete Roles')
                                    <button class="btn btn-small btn-danger" data-toggle="modal"
                                        data-target="#modal-danger{{ $r->id }}"><span class="fa fa-trash"></span></button>
                                        @endcan
                                </td>


    <div class="modal fade" id="modal-danger{{ $r->id }}">
        <div class="modal-dialog">
            <div class="modal-content bg-danger">
                <div class="modal-header">
                    <h4 class="modal-title">Delete Role</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="deleterole/{{$r->id}}">
                        @csrf
                        <input type="hidden" name="proid" value="">
                        <p>This Role will be deleted </p>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-outline-light" data-dismiss="modal">close</button>
                    <button type="submit" name="remove" class="btn btn-outline-light">delete</button>

                </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal-defaultt{{ $r->id }}">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Role</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="editRole/{{ $r->id }}">
                        @csrf
                        <div class="row">
                            <div class="col col-md-12">
                                <label>Name</label>
                                <input type="text" name="name" class="form-control" value="{{ $r->name }}">
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Permissions</label>
                                    <select select class="select2 form-control" multiple="multiple" name="permission[]"
                                        data-placeholder="choose a permision" style="width: 100%;">
                                    @foreach ($permission as $j)
                                    <option value="{{ $j->id }}">{{ $j->name }}</option>

                                        @endforeach

                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</tr>
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
<!-- modal -->

    <!-- ================================================ -->
    <div class="modal fade" id="modal-defaultt">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add Role</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="addrole">
                        @csrf
                        <div class="row">
                            <div class="col col-md-12">
                                <label>Name</label>
                                <input type="text" name="name" class="form-control" placeholder="name">
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Permissions</label>
                                    <select select class="select2 form-control" multiple="multiple" name="permission[]"
                                        data-placeholder="Choose permission" style="width: 100%;">
                                        @foreach ($permission as $p)


                                        <option value="{{ $p->id }}">{{ $p->name }}</option>

                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">close</button>
                            <button type="submit" class="btn btn-primary">Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
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
{{-- @include('layout.footer') --}}
