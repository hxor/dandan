@extends('layouts.admin.app')

@section('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/dropzone/dropzone.min.css') }}">
@stop

@section('content')
    <!-- Page-Title -->
    @include('layouts.admin.partials._bread', ['data' => empty($bread) ? '' : $bread])

    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="card-box">
                {!! Form::open(['method' => 'POST', 'route' => ['admin.architect.upload', $architect->id], 'class' => 'form-horizontal dropzone']) !!}
                {!! Form::hidden('architect_id', $architect->id) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
    <!-- end row -->
@endsection

@section('scripts')
    <script src="{{ asset('assets/plugins/dropzone/dropzone.min.js') }}"></script>
@stop