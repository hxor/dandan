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
            <a href="{{ route('admin.customer.index') }}">
                <div class="card-box">
                    <div class="bar-widget">
                        <div class="table-box">
                            <div class="table-detail">
                                <div class="iconbox bg-inverse">
                                    <i class="icon-layers"></i>
                                </div>
                            </div>


                            <div class="table-detail">
                                <h4 class="m-t-0 m-b-5"><b>Customer</b></h4>
                                <h5 class="text-muted m-b-0 m-t-0">List Customer</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

    </div>
    <!-- end row Menu-->

    <div class="row">
        <div class="col-lg-6">
            <div class="card-box">
                {{ Carbon\Carbon::now()->format('F Y') }}
                <h4 class="m-t-0 m-b-30 header-title"><b>Chart by Job</b></h4>

                <div id="category-chart"></div>
            </div>
        </div>



        <div class="col-lg-6">
            <div class="card-box">
                {{ Carbon\Carbon::now()->format('F Y') }}
                <h4 class="m-t-0 m-b-30 header-title"><b>Chart by Status</b></h4>

                <div id="status-chart"></div>
            </div>
        </div>
    </div>
    <!-- End row C3-2-->


    <div class="row">
        <div class="col-sm-12">
            <div class="card-box">
                <form action="{{ route('admin.order.reports') }}" method="post">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label>Select Order by Date</label>
                        <div>
                            <div class="input-daterange input-group" id="date-range">
                                <input type="text" class="form-control" name="start">
                                <span class="input-group-addon bg-custom text-white b-0">to</span>
                                <input type="text" class="form-control" name="end">
                            </div>
                        </div>
                    </div>
                    <div class="form-group text-right m-b-0">
                        <button class="btn btn-primary waves-effect waves-light" type="submit">
                            Submit
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
    <!-- End row Datatable -->

    <div class="row">
        <div class="col-sm-12">
            <div class="card-box table-responsive">
                <h4 class="m-t-0 header-title">
                    <b>Default Example</b>
                    <a href="{{ route('admin.order.create') }}" class="btn btn-primary waves-effect waves-light pull-right" style="margin-top: -8px;">Add Order</a>
                </h4>

                <table id="order-table" class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th width="30">No</th>
                        <th>Customer</th>
                        <th>Phone</th>
                        <th>Job</th>
                        <th>Cost</th>
                        <th>Date</th>
                        <th>Status</th>
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
        var table = $('#order-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('api.order.data') }}",
            columns: [
                {data: 'id', name: 'id'},
                {data: 'customer', name: 'customer'},
                {data: 'phone', name: 'phone'},
                {data: 'job', name: 'job'},
                {data: 'order_cost', name: 'order_cost'},
                {data: 'order_date', name: 'order_date'},
                {data: 'status', name: 'status'},
                {data: 'action', name: 'action', orderable: false, searchable: false}
            ]
        });
    </script>

    <script type="text/javascript">
        !function($) {
            "use strict";

            var ChartC3 = function() {};

            ChartC3.prototype.init = function () {
                c3.generate({
                    bindto: '#category-chart',
                    data: {
                        json: {!! json_encode($jobChart->original) !!},
                        keys: {
                            x: 'name', // it's possible to specify 'x' when category axis
                            value: ['total'],
                        },
                        types: {
                            total: 'bar',
                        },
                        colors: {
                            data1: '#dcdcdc',
                        },
                    },
                    axis: {
                        x: {
                            type: 'categorized'
                        }
                    }
                });

                //combined chart 2
                c3.generate({
                    bindto: '#status-chart',
                    data: {
                        json: {!! json_encode($statusChart->original) !!},
                        keys: {
                            x: 'name', // it's possible to specify 'x' when category axis
                            value: ['total'],
                        },
                        types: {
                            total: 'bar',
                        },
                        colors: {
                            data1: '#dcdcdc',
                        },
                    },
                    axis: {
                        x: {
                            type: 'categorized'
                        }
                    }
                });
            },
                $.ChartC3 = new ChartC3, $.ChartC3.Constructor = ChartC3

        }(window.jQuery),

        //initializing
            function($) {
                "use strict";
                $.ChartC3.init()
            }(window.jQuery);

    </script>
@endsection
