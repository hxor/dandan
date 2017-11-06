@extends('layouts.admin.app')

@section('content')
    <!-- Page-Title -->
    @include('layouts.admin.partials._bread', ['data' => empty($bread) ? '' : $bread])

    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="card-box">
                {!! Form::model($splash, ['route' => ['admin.splash.update', $splash->id], 'method' => 'PUT', 'class' => 'form-horizontal']) !!}
                @include('pages.admin.splash._form')
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