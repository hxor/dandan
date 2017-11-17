@extends('layouts.admin.app')

@section('content')
    <!-- Page-Title -->
    @include('layouts.admin.partials._bread', ['data' => empty($bread) ? '' : $bread])

    <div class="row">
        <div class="col-lg-3">
            <a href="{{ url('/home') }}">
                <div class="card-box">
                    <div class="bar-widget">
                        <div class="table-box">
                            <div class="table-detail">
                                <div class="iconbox bg-purple">
                                    <i class="icon-layers"></i>
                                </div>
                            </div>

                            <div class="table-detail">
                                <h4 class="m-t-0 m-b-5"><b>Dashboard</b></h4>
                                <h5 class="text-muted m-b-0 m-t-0">Admin Panel</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-lg-3">
            <a href="{{ route('admin.status.index') }}">
                <div class="card-box">
                    <div class="bar-widget">
                        <div class="table-box">
                            <div class="table-detail">
                                <div class="iconbox bg-inverse">
                                    <i class="icon-layers"></i>
                                </div>
                            </div>


                            <div class="table-detail">
                                <h4 class="m-t-0 m-b-5"><b>Statuses</b></h4>
                                <h5 class="text-muted m-b-0 m-t-0">List of Status</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-lg-3">
            <a href="{{ route('admin.city.index') }}">
                <div class="card-box">
                    <div class="bar-widget">
                        <div class="table-box">
                            <div class="table-detail">
                                <div class="iconbox bg-warning">
                                    <i class="icon-layers"></i>
                                </div>
                            </div>

                            <div class="table-detail">
                                <h4 class="m-t-0 m-b-5"><b>Cities</b></h4>
                                <h5 class="text-muted m-b-0 m-t-0">Available Cities Location</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-lg-3">
            <a href="{{ route('admin.user.index') }}">
                <div class="card-box">
                    <div class="bar-widget">
                        <div class="table-box">
                            <div class="table-detail">
                                <div class="iconbox bg-purple">
                                    <i class="icon-layers"></i>
                                </div>
                            </div>

                            <div class="table-detail">
                                <h4 class="m-t-0 m-b-5"><b>Users</b></h4>
                                <h5 class="text-muted m-b-0 m-t-0">List of User</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

    </div>
    <!-- end row Menu-->

    {!! Form::model($data, ['route' => 'admin.setting.store', 'method' => 'POST', 'class' => 'form-horizontal']) !!}

    <div class="row">
        <div class="col-md-12">
          {!! Form::submit('Save All', ['class' => 'btn btn-primary pull-right']) !!}
        </div>
    </div>
    <br>
    
    <div class="row">
        <div class="col-md-12">
            <div class="card-box">
                <div class="col-xs-2"> <!-- required for floating -->
              <!-- Nav tabs -->
              <ul class="nav nav-tabs tabs-left sideways">
                <li class="active"><a href="#settings-v" data-toggle="tab">Settings</a></li>
              </ul>
            </div>

            <div class="col-xs-10">
              <!-- Tab panes -->
              @include('pages.admin.setting._form')
            </div>

            <div class="clearfix"></div> 
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
          {!! Form::submit('Save All', ['class' => 'btn btn-primary pull-right']) !!}
        </div>
    </div>
    <!-- end row -->
    {!! Form::close() !!}
    <!-- End row Datatable -->
@endsection

@section('scripts')
    <script src="{{ asset('vendor/laravel-filemanager/js/lfm.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#lfm').filemanager('image');
        });
    </script>
@endsection
