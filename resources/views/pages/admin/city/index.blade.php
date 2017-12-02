@extends('layouts.admin.app')

@section('content')
    <!-- Page-Title -->
    @include('layouts.admin.partials._bread', ['data' => empty($bread) ? '' : $bread])

    <div class="row">
        <div class="col-lg-3">
            <a href="{{ url('/home') }}">
                <div class="card-box">
                    <div class="bar-widget">
                        <div class="table-box waves-effect waves-light">
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
            <a href="{{ route('admin.setting.index') }}">
                <div class="card-box">
                    <div class="bar-widget">
                        <div class="table-box waves-effect waves-light">
                            <div class="table-detail">
                                <div class="iconbox bg-inverse">
                                    <i class="icon-layers"></i>
                                </div>
                            </div>

                            <div class="table-detail">
                                <h4 class="m-t-0 m-b-5"><b>Setting</b></h4>
                                <h5 class="text-muted m-b-0 m-t-0">Main Setting</h5>
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
                        <div class="table-box waves-effect waves-light">
                            <div class="table-detail">
                                <div class="iconbox bg-warning">
                                    <i class="icon-layers"></i>
                                </div>
                            </div>

                            <div class="table-detail">
                                <h4 class="m-t-0 m-b-5"><b>Status</b></h4>
                                <h5 class="text-muted m-b-0 m-t-0">Status's List</h5>
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
                        <div class="table-box waves-effect waves-light">
                            <div class="table-detail">
                                <div class="iconbox bg-primary">
                                    <i class="icon-layers"></i>
                                </div>
                            </div>

                            <div class="table-detail">
                                <h4 class="m-t-0 m-b-5"><b>User</b></h4>
                                <h5 class="text-muted m-b-0 m-t-0">Employe</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

    </div>
    <!-- end row Menu-->

    <div class="row">
        <div class="col-sm-12">
            <div class="card-box table-responsive">
                <h4 class="m-t-0 header-title">
                    <b>Available City</b>
                    <a href="{{ route('admin.city.create') }}" class="btn btn-primary waves-effect waves-light pull-right" style="margin-top: -8px;">Add City</a>
                </h4>

                <table id="city-table" class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th width="30">No</th>
                        <th>City</th>
                        <th></th>
                    </tr>
                    </thead>


                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- End row Datatable -->
@endsection

@section('scripts')
    <script type="text/javascript">
        var table = $('#city-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('api.city.data') }}",
            columns: [
                {data: 'id', name: 'id'},
                {data: 'city', name: 'city'},
                {data: 'action', name: 'action', orderable: false, searchable: false}
            ]
        });
    </script>
@endsection
