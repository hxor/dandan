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
            <a href="{{ route('admin.job.index') }}">
                <div class="card-box">
                    <div class="bar-widget">
                        <div class="table-box">
                            <div class="table-detail">
                                <div class="iconbox bg-inverse">
                                    <i class="icon-layers"></i>
                                </div>
                            </div>


                            <div class="table-detail">
                                <h4 class="m-t-0 m-b-5"><b>Job</b></h4>
                                <h5 class="text-muted m-b-0 m-t-0">Job List</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-lg-3">
            <a href="{{ route('admin.cost.index') }}">
                <div class="card-box">
                    <div class="bar-widget">
                        <div class="table-box">
                            <div class="table-detail">
                                <div class="iconbox bg-warning">
                                    <i class="icon-layers"></i>
                                </div>
                            </div>

                            <div class="table-detail">
                                <h4 class="m-t-0 m-b-5"><b>Cost</b></h4>
                                <h5 class="text-muted m-b-0 m-t-0">Cost</h5>
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
                    <b>Default Example</b>
                    <a href="{{ route('admin.architect.create') }}" class="btn btn-primary waves-effect waves-light pull-right" style="margin-top: -8px;">Add Architect</a>
                </h4>

                <table id="architect-table" class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th width="30">No</th>
                        <th>Title</th>
                        <th>Image</th>
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
        var table = $('#architect-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('api.architect.data') }}",
            columns: [
                {data: 'id', name: 'id'},
                {data: 'title', name: 'title'},
                {data: 'show_image', name: 'show_image'},
                {data: 'action', name: 'action', orderable: false, searchable: false}
            ]
        });
    </script>
@endsection
