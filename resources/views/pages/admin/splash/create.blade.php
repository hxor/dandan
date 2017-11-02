@extends('layouts.admin.app')

@section('content')
    <!-- Page-Title -->
    @include('layouts.admin.partials._bread', ['data' => empty($bread) ? '' : $bread])

    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="card-box">
                {!! Form::open(['method' => 'POST', 'route' => 'admin.splash.store', 'class' => 'form-horizontal']) !!}
                @include('pages.admin.splash._form')
                {!! Form::close() !!}
            </div>
        </div>
    </div>
    <!-- end row -->
@endsection
