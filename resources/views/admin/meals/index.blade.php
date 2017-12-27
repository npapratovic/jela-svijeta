@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('blue_factory.meals.title')</h3>
    @can('meal_create')
    <p>
        <a href="{{ route('admin.meals.create') }}" class="btn btn-success">@lang('blue_factory.qa_add_new')</a>
        
    </p>
    @endcan

    @can('meal_delete')
    <p>
        <ul class="list-inline">
            <li><a href="{{ route('admin.meals.index') }}" style="{{ request('show_deleted') == 1 ? '' : 'font-weight: 700' }}">@lang('blue_factory.qa_all')</a></li> |
            <li><a href="{{ route('admin.meals.index') }}?show_deleted=1" style="{{ request('show_deleted') == 1 ? 'font-weight: 700' : '' }}">@lang('blue_factory.qa_trash')</a></li>
        </ul>
    </p>
    @endcan


    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('blue_factory.qa_list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($meals) > 0 ? 'datatable' : '' }} @can('meal_delete') @if ( request('show_deleted') != 1 ) dt-select @endif @endcan">
                <thead>
                    <tr>
                        @can('meal_delete')
                            @if ( request('show_deleted') != 1 )<th style="text-align:center;"><input type="checkbox" id="select-all" /></th>@endif
                        @endcan

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
                                @can('meal_delete')
                                    @if ( request('show_deleted') != 1 )<td></td>@endif
                                @endcan

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
@stop

@section('javascript') 
    <script>
        @can('meal_delete')
            @if ( request('show_deleted') != 1 ) window.route_mass_crud_entries_destroy = '{{ route('admin.meals.mass_destroy') }}'; @endif
        @endcan

    </script>
@endsection