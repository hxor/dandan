@extends('layouts.admin.app')

@section('content')
    <!-- Page-Title -->
    @include('layouts.admin.partials._bread', ['data' => empty($bread) ? '' : $bread])

    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="card-box">
                {!! Form::open(['method' => 'POST', 'route' => 'admin.order.store', 'class' => 'form-horizontal']) !!}
                @include('pages.admin.order._form')
                {!! Form::close() !!}
            </div>
        </div>
    </div>
    <!-- end row -->
@endsection

@section('scripts')
    <script src="{{ asset('vendor/laravel-filemanager/js/lfm.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#lfm').filemanager('image');
        });
    </script>
@endsection