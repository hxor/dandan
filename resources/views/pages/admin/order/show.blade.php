@extends('layouts.admin.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card-box">
                <!-- <div class="panel-heading">
                    <h4>Invoice</h4>
                </div> -->
                <div class="panel-body">
                    <div class="clearfix">
                        <div class="pull-left">
                            <h4 class="text-right"><img src="{{ asset($data->logo) }}" width="92" height="35" alt="velonic"></h4>

                        </div>
                        <div class="pull-right">
                            <h4 class="font-16">Daily Report # <br>
                            </h4>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">

                            <div class="pull-left m-t-30">
                                <address>
                                    <strong>{{ $data->name }}.</strong><br>
                                    {{ $data->address }}<br>
                                    <abbr title="Phone">P:</abbr> {{ $data->phone }}
                                </address>
                            </div>
                            <div class="pull-right m-t-30">
                                <p><strong>Order Date: </strong> {{ $order->created_at->format('l, d M Y') }} </p>
                                <p class="m-t-10">
                                    <strong>Order Status: </strong>
                                    <span class="label label-pink">
                                        {{ $order->status['status'] }}
                                    </span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="m-h-50"></div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table m-t-30">
                                    <thead>
                                    <tr><th>#</th>
                                        <th>Customer</th>
                                        <th>Phone</th>
                                        <th>Job</th>
                                        <th>Locate</th>
                                        <th>Date Work</th>
                                        <th>Cost</th>
                                        <th>Description</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>{{ $order->id }}</td>
                                        <td>{{ $order->customer->name }}</td>
                                        <td>{{ $order->customer->phone }}</td>
                                        <td>{{ $order->job->job }}</td>
                                        <td>{{ $order->locate }}</td>
                                        <td>{{ $order->date->format('l, d M Y') }}</td>
                                        <td>Rp {{ number_format($order->cost) }}</td>
                                        <td>{{ $order->order_desc }}</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="pull-right col-md-3 offset-md-9">
                            <p class="text-right"><b>Total:</b> Rp {{ number_format($order->cost) }}</p>
                        </div>
                    </div>
                    <hr>
                    <div class="hidden-print">
                        <div class="text-right">
                            <a href="javascript:window.print()" class="btn btn-inverse waves-effect waves-light"><i class="fa fa-print"></i></a>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
@endsection