@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('blue_factory.languages.title')</h3>
    
    {!! Form::model($language, ['method' => 'PUT', 'route' => ['admin.languages.update', $language->id]]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('blue_factory.qa_edit')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('title', trans('blue_factory.languages.fields.title').'', ['class' => 'control-label']) !!}
                    {!! Form::text('title', old('title'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('title'))
                        <p class="help-block">
                            {{ $errors->first('title') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('slug', trans('blue_factory.languages.fields.slug').'', ['class' => 'control-label']) !!}
                    {!! Form::text('slug', old('slug'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('slug'))
                        <p class="help-block">
                            {{ $errors->first('slug') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('iso_label', trans('blue_factory.languages.fields.iso-label').'', ['class' => 'control-label']) !!}
                    {!! Form::text('iso_label', old('iso_label'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('iso_label'))
                        <p class="help-block">
                            {{ $errors->first('iso_label') }}
                        </p>
                    @endif
                </div>
            </div>
            
        </div>
    </div>

    {!! Form::submit(trans('blue_factory.qa_update'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

