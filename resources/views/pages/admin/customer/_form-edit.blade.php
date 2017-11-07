<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
    {!! Form::label('name', 'Customer Name') !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'id' => 'name', 'required' => 'required', 'autofocus']) !!}
    <small class="text-danger">{{ $errors->first('name') }}</small>
</div>

<div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
    {!! Form::label('phone', 'Phone') !!}
    {!! Form::text('phone', null, ['class' => 'form-control', 'id' => 'phone', 'required' => 'required']) !!}
    <small class="text-danger">{{ $errors->first('phone') }}</small>
</div>

<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
    {!! Form::label('email', 'Email') !!}
    {!! Form::email('email', null, ['class' => 'form-control', 'id' => 'email', 'required' => 'required']) !!}
    <small class="text-danger">{{ $errors->first('email') }}</small>
</div>

<div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
    {!! Form::label('address', 'Address') !!}
    {!! Form::textarea('address', null, ['class' => 'form-control', 'id' => 'address', 'required' => 'required']) !!}
    <small class="text-danger">{{ $errors->first('phone') }}</small>
</div>

<div class="form-group text-right m-b-0">
    <a href="{{ empty($bread['0']) ? '#' : $bread['0']  }}" class="btn btn-white waves-effect waves-light m-l-5">
        Cancel
    </a>
    <a href="{{ route('admin.customer.editpass', $customer->id) }}" class="btn btn-warning waves-effect waves-light m-l-5">
        Reset Password
    </a>
    <button class="btn btn-primary waves-effect waves-light" type="submit">
        Submit
    </button>
</div>
