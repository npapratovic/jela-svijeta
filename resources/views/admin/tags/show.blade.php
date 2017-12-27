@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('blue_factory.tags.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('blue_factory.qa_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('blue_factory.tags.fields.title')</th>
                            <td field-key='title'>{{ $tag->title }}</td>
                        </tr>
                        <tr>
                            <th>@lang('blue_factory.tags.fields.slug')</th>
                            <td field-key='slug'>{{ $tag->slug }}</td>
                        </tr>
                        <tr>
                            <th>@lang('blue_factory.tags.fields.language')</th>
                            <td field-key='language'>{{ $tag->language->iso_label or '' }}</td>
                        </tr>
                    </table>
                </div>
            </div><!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist">
    
<li role="presentation" class="active"><a href="#meals" aria-controls="meals" role="tab" data-toggle="tab">Jela svijeta</a></li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
    
<div role="tabpanel" class="tab-pane active" id="meals">
<table class="table table-bordered table-striped {{ count($meals) > 0 ? 'datatable' : '' }}">
    <thead>
        <tr>
            <th>@lang('blue_factory.meals.fields.title')</th>
                        <th>@lang('blue_factory.meals.fields.slug')</th>
                        <th>@lang('blue_factory.meals.fields.description')</th>
                        <th>@lang('blue_factory.meals.fields.category')</th>
                        <th>@lang('blue_factory.meals.fields.tag')</th>
                        <th>@lang('blue_factory.meals.fields.language')</th>
                        @if( request('show_deleted') == 1 )
                        <th>&nbsp;</th>
                        @else
                        <th>&nbsp;</th>
                        @endif
        </tr>
    </thead>

    <tbody>
        @if (count($meals) > 0)
            @foreach ($meals as $meal)
                <tr data-entry-id="{{ $meal->id }}">
                    <td field-key='title'>{{ $meal->title }}</td>
                                <td field-key='slug'>{{ $meal->slug }}</td>
                                <td field-key='description'>{{ $meal->description }}</td>
                                <td field-key='category'>{{ $meal->category->title or '' }}</td>
                                <td field-key='tag'>
                                    @foreach ($meal->tag as $singleTag)
                                        <span class="label label-info label-many">{{ $singleTag->title }}</span>
                                    @endforeach
                                </td>
                                <td field-key='language'>{{ $meal->language->iso_label or '' }}</td>
                                @if( request('show_deleted') == 1 )
                                <td>
                                    @can('meal_delete')
                                                                        {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'POST',
                                        'onsubmit' => "return confirm('".trans("blue_factory.qa_are_you_sure")."');",
                                        'route' => ['admin.meals.restore', $meal->id])) !!}
                                    {!! Form::submit(trans('blue_factory.qa_restore'), array('class' => 'btn btn-xs btn-success')) !!}
                                    {!! Form::close() !!}
                                @endcan
                                    @can('meal_delete')
                                                                        {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("blue_factory.qa_are_you_sure")."');",
                                        'route' => ['admin.meals.perma_del', $meal->id])) !!}
                                    {!! Form::submit(trans('blue_factory.qa_permadel'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                @endcan
                                </td>
                                @else
                                <td>
                                    @can('meal_view')
                                    <a href="{{ route('admin.meals.show',[$meal->id]) }}" class="btn btn-xs btn-primary">@lang('blue_factory.qa_view')</a>
                                    @endcan
                                    @can('meal_edit')
                                    <a href="{{ route('admin.meals.edit',[$meal->id]) }}" class="btn btn-xs btn-info">@lang('blue_factory.qa_edit')</a>
                                    @endcan
                                    @can('meal_delete')
{!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("blue_factory.qa_are_you_sure")."');",
                                        'route' => ['admin.meals.destroy', $meal->id])) !!}
                                    {!! Form::submit(trans('blue_factory.qa_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>
                                @endif
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="11">@lang('blue_factory.qa_no_entries_in_table')</td>
            </tr>
        @endif
    </tbody>
</table>
</div>
</div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.tags.index') }}" class="btn btn-default">@lang('blue_factory.qa_back_to_list')</a>
        </div>
    </div>
@stop
