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
                            Partner Detail : {{ $partner->title }}
                        </h3>
                    </div>
                    <div class="panel-body">
                        <table class="table table-striped">
                            <tr>
                                <th>Title</th>
                                <td>{{ $partner->title }}</td>
                            </tr>
                            <tr>
                                <th>link</th>
                                <td><a href="{{ $partner->link }}">{{ $partner->link }}</a></td>
                            </tr>
                            <tr>
                                <th>Image</th>
                                <td><img class="rounded-square" width="150" height="100" src="{{ url('/') . $partner->image }}" alt=""></td>
                            </tr>
                            <tr>
                                <th>Is show in home ?</th>
                                <td>{{ $partner->is_home == 1 ? 'Yes' : 'No' }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End row -->
@endsection