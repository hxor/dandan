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
                            Architect Detail : {{ $architect->title }}
                        </h3>
                    </div>
                    <div class="panel-body">
                        <table class="table table-striped">
                            <tr>
                                <th>Title</th>
                                <td>{{ $architect->title }}</td>
                            </tr>
                            <tr>
                                <th>Image</th>
                                <td><img class="rounded-square" width="150" height="100" src="{{ url('/') . $architect->image }}" alt=""></td>
                            </tr>
                            <tr>
                                <th>Description</th>
                                <td>{{ $architect->desc }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End row -->

    {{--  <div class="row">
        <div class="col-sm-12">
            <div class="card-box table-responsive">
                <h4 class="m-t-0 header-title">
                    <b>Architect Images</b>
                    <a href="{{ route('admin.architect.image', $architect->id)  }}" class="btn btn-primary waves-effect waves-light pull-right" style="margin-top: -8px;">Add Images</a>
                </h4>

                <table id="architect-table" class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th width="30">No</th>
                        <th>Image</th>
                        <th></th>
                    </tr>
                    </thead>


                    <tbody>
                        @if(count($archimage) > 0)
                            @foreach($archimage as $row)
                                <tr>
                                    <td>{{ $row->id }}</td>
                                    <td><img class="rounded-square" width="50" height="50" src="{{ url($row->image) }}" alt=""></td>
                                    <td>
                                        <form action="{{ route('admin.architect.delimage', $row->id) }}" method="POST">
                                            {{ csrf_field() }} {{ method_field('DELETE') }}
                                            <button type="submit" class="btn btn-danger waves-effect waves-light btn-sm js-submit-confirm">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- End row Datatable -->  --}}
@endsection

@section('scripts')
    <script type="text/javascript">
        $('#architect-table').DataTable({

        });
    </script>
@endsection