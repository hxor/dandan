<div class="form-group{{ $errors->has('job') ? ' has-error' : '' }}">
    {!! Form::label('job', 'Job Title') !!}
    {!! Form::text('job', null, ['class' => 'form-control', 'id' => 'job', 'required' => 'required', 'autofocus']) !!}
    <small class="text-danger">{{ $errors->first('job') }}</small>
</div>

<div class="form-group text-right m-b-0">
    <a href="{{ empty($bread['0']) ? '#' : $bread['0']  }}" class="btn btn-white waves-effect waves-light m-l-5">
        Cancel
    </a>
    <button class="btn btn-primary waves-effect waves-light" type="submit">
        Submit
    </button>
</div>
