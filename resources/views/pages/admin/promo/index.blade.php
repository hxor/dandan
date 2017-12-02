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
            <a href="{{ route('admin.partner.index') }}">
                <div class="card-box">
                    <div class="bar-widget">
                        <div class="table-box waves-effect waves-light">
                            <div class="table-detail">
                                <div class="iconbox bg-inverse">
                                    <i class="icon-layers"></i>
                                </div>
                            </div>

                            <div class="table-detail">
                                <h4 class="m-t-0 m-b-5"><b>Partnership</b></h4>
                                <h5 class="text-muted m-b-0 m-t-0">Partnership</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-lg-3">
            <a href="{{ route('admin.splash.index') }}">
                <div class="card-box">
                    <div class="bar-widget">
                        <div class="table-box">
                            <div class="table-detail">
                                <div class="iconbox bg-warning">
                                    <i class="icon-layers"></i>
                                </div>
                            </div>

                            <div class="table-detail">
                                <h4 class="m-t-0 m-b-5"><b>Partner Splash</b></h4>
                                <h5 class="text-muted m-b-0 m-t-0">Splashscreen partnership</h5>
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
                    <b>Promo List</b>
                    <a href="{{ route('admin.promo.create') }}" class="btn btn-primary waves-effect waves-light pull-right" style="margin-top: -8px;">Add Promo</a>
                </h4>

                <table id="partner-table" class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th width="30">No</th>
                        <th>Title</th>
                        <th>Image</th>
                        <th>Is Banner</th>
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
        var table = $('#partner-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('api.promo.data') }}",
            columns: [
                {data: 'id', name: 'id'},
                {data: 'title', name: 'title'},
                {data: 'show_image', name: 'show_image'},
                {data: 'show_banner', name: 'show_banner'},
                {data: 'action', name: 'action', orderable: false, searchable: false}
            ]
        });
    </script>
@endsection
