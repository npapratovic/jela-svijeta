@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('blue_factory.ingredients.title')</h3>
    @can('ingredient_create')
    <p>
        <a href="{{ route('admin.ingredients.create') }}" class="btn btn-success">@lang('blue_factory.qa_add_new')</a>
        
    </p>
    @endcan

    @can('ingredient_delete')
    <p>
        <ul class="list-inline">
            <li><a href="{{ route('admin.ingredients.index') }}" style="{{ request('show_deleted') == 1 ? '' : 'font-weight: 700' }}">@lang('blue_factory.qa_all')</a></li> |
            <li><a href="{{ route('admin.ingredients.index') }}?show_deleted=1" style="{{ request('show_deleted') == 1 ? 'font-weight: 700' : '' }}">@lang('blue_factory.qa_trash')</a></li>
        </ul>
    </p>
    @endcan


    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('blue_factory.qa_list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($ingredients) > 0 ? 'datatable' : '' }} @can('ingredient_delete') @if ( request('show_deleted') != 1 ) dt-select @endif @endcan">
                <thead>
                    <tr>
                        @can('ingredient_delete')
                            @if ( request('show_deleted') != 1 )<th style="text-align:center;"><input type="checkbox" id="select-all" /></th>@endif
                        @endcan

                        <th>@lang('blue_factory.ingredients.fields.title')</th>
                        <th>@lang('blue_factory.ingredients.fields.slug')</th>
                        <th>@lang('blue_factory.ingredients.fields.language')</th>
                        @if( request('show_deleted') == 1 )
                        <th>&nbsp;</th>
                        @else
                        <th>&nbsp;</th>
                        @endif
                    </tr>
                </thead>
                
                <tbody>
                    @if (count($ingredients) > 0)
                        @foreach ($ingredients as $ingredient)
                            <tr data-entry-id="{{ $ingredient->id }}">
                                @can('ingredient_delete')
                                    @if ( request('show_deleted') != 1 )<td></td>@endif
                                @endcan

                                <td field-key='title'>{{ $ingredient->title }}</td>
                                <td field-key='slug'>{{ $ingredient->slug }}</td>
                                <td field-key='language'>{{ $ingredient->language->iso_label or '' }}</td>
                                @if( request('show_deleted') == 1 )
                                <td>
                                    @can('ingredient_delete')
                                                                        {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'POST',
                                        'onsubmit' => "return confirm('".trans("blue_factory.qa_are_you_sure")."');",
                                        'route' => ['admin.ingredients.restore', $ingredient->id])) !!}
                                    {!! Form::submit(trans('blue_factory.qa_restore'), array('class' => 'btn btn-xs btn-success')) !!}
                                    {!! Form::close() !!}
                                @endcan
                                    @can('ingredient_delete')
                                                                        {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("blue_factory.qa_are_you_sure")."');",
                                        'route' => ['admin.ingredients.perma_del', $ingredient->id])) !!}
                                    {!! Form::submit(trans('blue_factory.qa_permadel'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                @endcan
                                </td>
                                @else
                                <td>
                                    @can('ingredient_view')
                                    <a href="{{ route('admin.ingredients.show',[$ingredient->id]) }}" class="btn btn-xs btn-primary">@lang('blue_factory.qa_view')</a>
                                    @endcan
                                    @can('ingredient_edit')
                                    <a href="{{ route('admin.ingredients.edit',[$ingredient->id]) }}" class="btn btn-xs btn-info">@lang('blue_factory.qa_edit')</a>
                                    @endcan
                                    @can('ingredient_delete')
{!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("blue_factory.qa_are_you_sure")."');",
                                        'route' => ['admin.ingredients.destroy', $ingredient->id])) !!}
                                    {!! Form::submit(trans('blue_factory.qa_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>
                                @endif
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="8">@lang('blue_factory.qa_no_entries_in_table')</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('javascript') 
    <script>
        @can('ingredient_delete')
            @if ( request('show_deleted') != 1 ) window.route_mass_crud_entries_destroy = '{{ route('admin.ingredients.mass_destroy') }}'; @endif
        @endcan

    </script>
@endsection