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
                            Splash Detail
                        </h3>
                    </div>
                    <div class="panel-body">
                        <table class="table table-striped">
                            <tr>
                                <th>Image</th>
                                <td><img class="rounded-square" width="150" height="100" src="{{ url('/') . $splash->image }}" alt=""></td>
                            </tr>
                            <tr>
                                <th>Background Color : {{ $splash->color }}</th>
                                <td style="cursor:pointer;background-color:{{ $splash->color }}"></td>
                            </tr>
                            <tr>
                                <th>Show in splash ?</th>
                                <td>{{ $splash->is_active == 1 ? 'Yes' : 'No' }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End row -->
@endsection