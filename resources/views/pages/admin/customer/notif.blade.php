@extends('layouts.admin.app')

@section('content')
    <!-- Page-Title -->
    @include('layouts.admin.partials._bread', ['data' => empty($bread) ? '' : $bread])

    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="card-box">
                {!! Form::open(['method' => 'POST', 'route' => 'admin.customer.sendnotif', 'class' => 'form-horizontal']) !!}
                    <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                        {!! Form::label('title', 'Title Info') !!}
                        {!! Form::text('title', null, ['class' => 'form-control', 'id' => 'title', 'required' => 'required', 'autofocus']) !!}
                        <small class="text-danger">{{ $errors->first('title') }}</small>
                    </div>

                    <div class="form-group{{ $errors->has('body') ? ' has-error' : '' }}">
                        {!! Form::label('body', 'Body Info') !!}
                        {!! Form::textarea('body', null, ['class' => 'form-control', 'id' => 'body', 'required' => 'required']) !!}
                        <small class="text-danger">{{ $errors->first('body') }}</small>
                    </div>

                    <div class="form-group text-right m-b-0">
                        <a href="{{ empty($bread['0']) ? '#' : $bread['0']  }}" class="btn btn-white waves-effect waves-light m-l-5">
                            Cancel
                        </a>
                        <button class="btn btn-primary waves-effect waves-light" type="submit">
                            Submit
                        </button>
                    </div>

                {!! Form::close() !!}
            </div>
        </div>
    </div>
    <!-- end row -->
@endsection