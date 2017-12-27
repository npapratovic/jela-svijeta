@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('blue_factory.category.title')</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['admin.categories.store']]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('blue_factory.qa_create')
        </div>
        
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('title', trans('blue_factory.category.fields.title').'', ['class' => 'control-label']) !!}
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
                    {!! Form::label('slug', trans('blue_factory.category.fields.slug').'', ['class' => 'control-label']) !!}
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
                    {!! Form::label('language_id', trans('blue_factory.category.fields.language').'', ['class' => 'control-label']) !!}
                    {!! Form::select('language_id', $languages, old('language_id'), ['class' => 'form-control select2']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('language_id'))
                        <p class="help-block">
                            {{ $errors->first('language_id') }}
                        </p>
                    @endif
                </div>
            </div>
            
        </div>
    </div>

    {!! Form::submit(trans('blue_factory.qa_save'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

