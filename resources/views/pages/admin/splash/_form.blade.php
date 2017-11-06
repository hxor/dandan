<div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
    {!! Form::label('image', 'Image') !!}
    <div class="input-group">
        {!! Form::text('image', null, ['id' => 'thumbnail', 'class' => 'form-control', 'readonly' => 'readonly']) !!}
        <span class="input-group-btn">
        <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-default">
          <i class="fa fa-cloud-upload"></i> Choose
        </a>
      </span>
    </div>
    @if (isset($splash) && $splash->image !== '')
        <img src="{{ url('/') }}/{{ $splash->image }}" id="holder" style="margin-top:15px;max-height:254px;max-width: 152px;">
    @endif
    <img id="holder" style="margin-top:15px;max-height:254px;max-width: 152px;">
    <small class="text-danger">{{ $errors->first('image') }}</small>
</div>

<div class="form-group{{ $errors->has('color') ? ' has-error' : '' }}">
    {!! Form::label('color', 'BG Color') !!}
    <div data-color-format="rgb" class="colorpicker-default input-group">
    {!! Form::text('color', null, ['class' => 'form-control', 'id' => 'title', 'required' => 'required']) !!}
        <span class="input-group-btn add-on">
            <button class="btn btn-white" type="button">
                <i style="background-color: rgb(25,48,124);margin-top: 2px;"></i>
            </button>
        </span>
    <small class="text-danger">{{ $errors->first('color') }}</small>
    </div>
</div>

<div class="form-group{{ $errors->has('is_active') ? ' has-error' : '' }}">
    {!! Form::label('is_active', 'Show in splash ?') !!}
    {!! Form::select('is_active', [ 1 => 'Yes', 2 => 'No' ], null, ['class' => 'form-control', 'required' => 'required']) !!}
    <small class="text-danger">{{ $errors->first('is_active') }}</small>
</div>


<div class="form-group text-right m-b-0">
    <a href="{{ empty($bread['0']) ? '#' : $bread['0']  }}" class="btn btn-white waves-effect waves-light m-l-5">
        Cancel
    </a>
    <button class="btn btn-primary waves-effect waves-light" type="submit">
        Submit
    </button>
</div>
