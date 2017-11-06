<div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
    {!! Form::label('title', 'Promo Title') !!}
    {!! Form::text('title', null, ['class' => 'form-control', 'id' => 'title', 'required' => 'required', 'autofocus']) !!}
    <small class="text-danger">{{ $errors->first('title') }}</small>
</div>

<div class="form-group{{ $errors->has('desc') ? ' has-error' : '' }}">
    {!! Form::label('desc', 'Promo Description') !!}
    {!! Form::textarea('desc', null, ['class' => 'form-control', 'id' => 'title', 'required' => 'required']) !!}
    <small class="text-danger">{{ $errors->first('desc') }}</small>
</div>

<div class="form-group{{ $errors->has('is_banner') ? ' has-error' : '' }}">
    {!! Form::label('is_banner', 'Show in banner ?') !!}
    {!! Form::select('is_banner', [ 1 => 'Yes', 2 => 'No' ], null, ['class' => 'form-control', 'required' => 'required']) !!}
    <small class="text-danger">{{ $errors->first('is_banner') }}</small>
</div>

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
    @if (isset($promo) && $promo->image !== '')
        <img src="{{ url('/') }}/{{ $promo->image }}" id="holder" style="margin-top:15px;max-height:254px;max-width: 152px;">
    @endif
    <img id="holder" style="margin-top:15px;max-height:254px;max-width: 152px;">
    <small class="text-danger">{{ $errors->first('image') }}</small>
</div>

<div class="form-group text-right m-b-0">
    <a href="{{ empty($bread['0']) ? '#' : $bread['0']  }}" class="btn btn-white waves-effect waves-light m-l-5">
        Cancel
    </a>
    <button class="btn btn-primary waves-effect waves-light" type="submit">
        Submit
    </button>
</div>
