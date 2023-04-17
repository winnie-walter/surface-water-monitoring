@extends('layout.app')
@section('content') 

<div class="container-fluid">
        <div class="box-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="float-left">
                                <i class="fas fa-info-circle blue"></i>
                                &nbsp;Temperature Data
                            </h3>
                           
                            <!-- /.Modal -->

                           
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                {!! $dataTable->table(['class' => 'table table-hover table-condensed', 'id' => 'temperature-table'], true) !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {!! $dataTable->scripts() !!}

@endsection