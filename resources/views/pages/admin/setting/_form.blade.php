<div class="tab-content card-box">
    <div class="tab-pane active" id="settings-v">
        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
            {!! Form::label('name', 'Company Title') !!}
            {!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required']) !!}
            <small class="text-danger">{{ $errors->first('name') }}</small>
        </div>
        <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
            {!! Form::label('address', 'Address') !!}
            {!! Form::textarea('address', null, ['class' => 'form-control', 'required' => 'required']) !!}
            <small class="text-danger">{{ $errors->first('address') }}</small>
        </div>
        <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
            {!! Form::label('phone', 'Phone') !!}
            {!! Form::text('phone', null, ['class' => 'form-control', 'required' => 'required']) !!}
            <small class="text-danger">{{ $errors->first('phone') }}</small>
        </div>
        <div class="form-group{{ $errors->has('logo') ? ' has-error' : '' }}">
            {!! Form::label('logo', 'Logo') !!}
            <div class="input-group">
              {!! Form::text('logo', null, ['id' => 'thumbnail', 'class' => 'form-control', 'readonly' => 'readonly']) !!}
              <span class="input-group-btn">
                <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-default">
                  <i class="fa fa-cloud-upload"></i> Choose
                </a>
              </span>
            </div>
            @if (isset($data) && $data->logo !== '')
            <img src="{{ $data->logo }}" id="holder" style="margin-top:15px;max-height:254px;max-width: 152px;">
            @endif
            <img id="holder" style="margin-top:15px;max-height:254px;max-width: 152px;">
            <small class="text-danger">{{ $errors->first('logo') }}</small>
        </div>

        <div class="form-group{{ $errors->has('aboutus') ? ' has-error' : '' }}">
            {!! Form::label('aboutus', 'About Company') !!}
            {!! Form::textarea('aboutus', null, ['class' => 'form-control', 'required' => 'required']) !!}
            <small class="text-danger">{{ $errors->first('aboutus') }}</small>
        </div>
    </div>
</div>