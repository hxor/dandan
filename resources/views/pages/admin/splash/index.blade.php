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
            <a href="{{ route('admin.partner.index') }}">
                <div class="card-box">
                    <div class="bar-widget">
                        <div class="table-box waves-effect waves-light">
                            <div class="table-detail">
                                <div class="iconbox bg-purple">
                                    <i class="icon-layers"></i>
                                </div>
                            </div>

                            <div class="table-detail">
                                <h4 class="m-t-0 m-b-5"><b>Partnership</b></h4>
                                <h5 class="text-muted m-b-0 m-t-0">Partner Splash, Promo, Banner</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-lg-3">
            <a href="{{ route('admin.promo.index') }}">
                <div class="card-box">
                    <div class="bar-widget">
                        <div class="table-box">
                            <div class="table-detail">
                                <div class="iconbox bg-warning">
                                    <i class="icon-layers"></i>
                                </div>
                            </div>


                            <div class="table-detail">
                                <h4 class="m-t-0 m-b-5"><b>Promo</b></h4>
                                <h5 class="text-muted m-b-0 m-t-0">Data Promo</h5>
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
                    <a href="{{ route('admin.splash.create') }}" class="btn btn-primary waves-effect waves-light pull-right" style="margin-top: -8px;">Add Splash</a>
                </h4>

                <table id="splash-table" class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th width="30">No</th>
                        <th>Image</th>
                        <th>BG Color</th>
                        <th>Is Show?</th>
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
        var table = $('#splash-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('api.splash.data') }}",
            columns: [
                {data: 'id', name: 'id'},
                {data: 'show_image', name: 'show_image'},
                {data: 'color', name: 'color'},
                {data: 'is_show', name: 'is_show'},
                {data: 'action', name: 'action', orderable: false, searchable: false}
            ]
        });
    </script>
@endsection