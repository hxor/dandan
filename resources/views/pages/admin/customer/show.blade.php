@extends('layouts.admin.app')

@section('content')
    <!-- Page-Title -->
    @include('layouts.admin.partials._bread', ['data' => empty($bread) ? '' : $bread])

    <div class="row">
        <div class="col-sm-12">
            <div class="card-box">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            Customer Detail : {{ $customer->name }}
                        </h3>
                    </div>
                    <div class="panel-body">
                        <table class="table table-striped">
                            <tr>
                                <th>Name</th>
                                <td>{{ $customer->name }}</td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td>{{ $customer->email }}</td>
                            </tr>
                            <tr>
                                <th>Phone</th>
                                <td>{{ $customer->phone }}</td>
                            </tr>
                            <tr>
                                <th>Address</th>
                                <td>{{ $customer->address }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End row -->
@endsection