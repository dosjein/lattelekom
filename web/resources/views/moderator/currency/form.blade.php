<div class="form-group {{ $errors->has('message') ? 'has-error' : ''}}">
    {!! Form::label('message', 'Message', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('message', null, ['class' => 'form-control']) !!}
        {!! $errors->first('message', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('phone') ? 'has-error' : ''}}">
    {!! Form::label('phone', 'Phone', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('phone', null, ['class' => 'form-control']) !!}
        {!! $errors->first('phone', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('person_id') ? 'has-error' : ''}}">
    {!! Form::label('person_id', 'Person Id', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('person_id', null, ['class' => 'form-control']) !!}
        {!! $errors->first('person_id', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('timesheet_id') ? 'has-error' : ''}}">
    {!! Form::label('timesheet_id', 'Timesheet Id', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('timesheet_id', null, ['class' => 'form-control']) !!}
        {!! $errors->first('timesheet_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div>
