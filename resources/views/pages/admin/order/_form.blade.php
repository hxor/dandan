<div class="form-group{{ $errors->has('customer_id') ? ' has-error' : '' }}">
    {!! Form::label('customer_id', 'Customer') !!}
    {!! Form::select('customer_id', $customer, null, ['class' => 'form-control', 'required' => 'required']) !!}
    <small class="text-danger">{{ $errors->first('customer_id') }}</small>
</div>

<div class="form-group{{ $errors->has('job_id') ? ' has-error' : '' }}">
    {!! Form::label('job_id', 'Job') !!}
    {!! Form::select('job_id', $job, null, ['class' => 'form-control', 'required' => 'required']) !!}
    <small class="text-danger">{{ $errors->first('job_id') }}</small>
</div>

<div class="form-group{{ $errors->has('locate') ? ' has-error' : '' }}">
    {!! Form::label('locate', 'Location') !!}
    {!! Form::text('locate', null, ['class' => 'form-control', 'id' => 'locate', 'required' => 'required', 'autofocus']) !!}
    <small class="text-danger">{{ $errors->first('locate') }}</small>
</div>

<div class="form-group{{ $errors->has('city') ? ' has-error' : '' }}">
    {!! Form::label('city', 'City') !!}
    {!! Form::select('city', $city, null, ['class' => 'form-control', 'required' => 'required']) !!}
    <small class="text-danger">{{ $errors->first('city') }}</small>
</div>

<div class="form-group{{ $errors->has('date') ? ' has-error' : '' }}">
    {!! Form::label('date', 'Date') !!}
    <div class="">
        <div class="input-group">
            {!! Form::text('date', null, ['class' => 'form-control', 'id' => 'datepicker-autoclose', 'required' => 'required', "placeholder" => "mm/dd/yyyy"]) !!}
            <span class="input-group-addon bg-custom b-0 text-white"><i class="icon-calender"></i></span>
            <small class="text-danger">{{ $errors->first('date') }}</small>
        </div><!-- input-group -->
    </div>
    <small class="text-danger">{{ $errors->first('date') }}</small>
</div>

<div class="form-group{{ $errors->has('cost') ? ' has-error' : '' }}">
    {!! Form::label('cost', 'Cost') !!}
    {!! Form::number('cost', null, ['class' => 'form-control', 'id' => 'cost', 'required' => 'required']) !!}
    <small class="text-danger">{{ $errors->first('cost') }}</small>
</div>

<div class="form-group{{ $errors->has('order_desc') ? ' has-error' : '' }}">
    {!! Form::label('order_desc', 'Order Description') !!}
    {!! Form::textarea('order_desc', null, ['class' => 'form-control', 'id' => 'order_desc', 'required' => 'required']) !!}
    <small class="text-danger">{{ $errors->first('order_desc') }}</small>
</div>

<div class="form-group{{ $errors->has('status_id') ? ' has-error' : '' }}">
    {!! Form::label('status_id', 'Status') !!}
    {!! Form::select('status_id', $status, null, ['class' => 'form-control', 'required' => 'required']) !!}
    <small class="text-danger">{{ $errors->first('status_id') }}</small>
</div>


<div class="form-group text-right m-b-0">
    <a href="{{ empty($bread['0']) ? '#' : $bread['0']  }}" class="btn btn-white waves-effect waves-light m-l-5">
        Cancel
    </a>
    <button class="btn btn-primary waves-effect waves-light" type="submit">
        Submit
    </button>
</div>

