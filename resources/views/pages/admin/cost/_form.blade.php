<div class="form-group{{ $errors->has('job_id') ? ' has-error' : '' }}">
    {!! Form::label('job_id', 'Job') !!}
    {!! Form::select('job_id', $jobs, null, ['class' => 'form-control', 'required' => 'required']) !!}
    <small class="text-danger">{{ $errors->first('job_id') }}</small>
</div>

<div class="form-group{{ $errors->has('cost_type') ? ' has-error' : '' }}">
    {!! Form::label('cost_type', 'Cost Type') !!}
    {!! Form::text('cost_type', null, ['class' => 'form-control', 'id' => 'cost_type', 'required' => 'required', 'autofocus']) !!}
    <small class="text-danger">{{ $errors->first('cost_type') }}</small>
</div>

<div class="form-group{{ $errors->has('cost') ? ' has-error' : '' }}">
    {!! Form::label('cost', 'Cost') !!}
    {!! Form::number('cost', null, ['class' => 'form-control', 'id' => 'cost', 'required' => 'required']) !!}
    <small class="text-danger">{{ $errors->first('cost') }}</small>
</div>

<div class="form-group text-right m-b-0">
    <a href="{{ empty($bread['0']) ? '#' : $bread['0']  }}" class="btn btn-white waves-effect waves-light m-l-5">
        Cancel
    </a>
    <button class="btn btn-primary waves-effect waves-light" type="submit">
        Submit
    </button>
</div>
