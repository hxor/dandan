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
                            Promo Detail : {{ $promo->title }}
                        </h3>
                    </div>
                    <div class="panel-body">
                        <table class="table table-striped">
                            <tr>
                                <th>Title</th>
                                <td>{{ $promo->title }}</td>
                            </tr>
                            <tr>
                                <th>Image</th>
                                <td><img class="rounded-square" width="150" height="100" src="{{ url('/') . $promo->image }}" alt=""></td>
                            </tr>
                            <tr>
                                <th>Description</th>
                                <td>{{ $promo->desc }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End row -->
@endsection