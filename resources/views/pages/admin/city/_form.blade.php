<div class="form-group{{ $errors->has('city') ? ' has-error' : '' }}">
    {!! Form::label('city', 'City Name') !!}
    {!! Form::text('city', null, ['class' => 'form-control', 'id' => 'city', 'required' => 'required', 'autofocus']) !!}
    <small class="text-danger">{{ $errors->first('city') }}</small>
</div>

<div class="form-group text-right m-b-0">
    <a href="{{ empty($bread['0']) ? '#' : $bread['0']  }}" class="btn btn-white waves-effect waves-light m-l-5">
        Cancel
    </a>
    <button class="btn btn-primary waves-effect waves-light" type="submit">
        Submit
    </button>
</div>
