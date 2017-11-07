<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
    {!! Form::label('password', 'Password') !!}
    <input id="password" type="password" class="form-control" placeholder="Password" name="password">

    @if ($errors->has('password'))
        <span class="help-block">
            <strong>{{ $errors->first('password') }}</strong>
        </span>
    @endif
</div>

<div class="form-group">
    {!! Form::label('password_confirmation', 'Confirm Password') !!}
    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password">
</div>

<div class="form-group text-right m-b-0">
    <a href="{{ empty($bread['0']) ? '#' : $bread['0']  }}" class="btn btn-white waves-effect waves-light m-l-5">
        Cancel
    </a>
    <button class="btn btn-primary waves-effect waves-light" type="submit">
        Submit
    </button>
</div>
