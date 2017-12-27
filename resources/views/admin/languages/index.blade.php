@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('blue_factory.languages.title')</h3>
    @can('language_create')
    <p>
        <a href="{{ route('admin.languages.create') }}" class="btn btn-success">@lang('blue_factory.qa_add_new')</a>
        
    </p>
    @endcan

    @can('language_delete')
    <p>
        <ul class="list-inline">
            <li><a href="{{ route('admin.languages.index') }}" style="{{ request('show_deleted') == 1 ? '' : 'font-weight: 700' }}">@lang('blue_factory.qa_all')</a></li> |
            <li><a href="{{ route('admin.languages.index') }}?show_deleted=1" style="{{ request('show_deleted') == 1 ? 'font-weight: 700' : '' }}">@lang('blue_factory.qa_trash')</a></li>
        </ul>
    </p>
    @endcan


    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('blue_factory.qa_list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($languages) > 0 ? 'datatable' : '' }} @can('language_delete') @if ( request('show_deleted') != 1 ) dt-select @endif @endcan">
                <thead>
                    <tr>
                        @can('language_delete')
                            @if ( request('show_deleted') != 1 )<th style="text-align:center;"><input type="checkbox" id="select-all" /></th>@endif
                        @endcan

                        <th>@lang('blue_factory.languages.fields.title')</th>
                        <th>@lang('blue_factory.languages.fields.slug')</th>
                        <th>@lang('blue_factory.languages.fields.iso-label')</th>
                        @if( request('show_deleted') == 1 )
                        <th>&nbsp;</th>
                        @else
                        <th>&nbsp;</th>
                        @endif
                    </tr>
                </thead>
                
                <tbody>
                    @if (count($languages) > 0)
                        @foreach ($languages as $language)
                            <tr data-entry-id="{{ $language->id }}">
                                @can('language_delete')
                                    @if ( request('show_deleted') != 1 )<td></td>@endif
                                @endcan

                                <td field-key='title'>{{ $language->title }}</td>
                                <td field-key='slug'>{{ $language->slug }}</td>
                                <td field-key='iso_label'>{{ $language->iso_label }}</td>
                                @if( request('show_deleted') == 1 )
                                <td>
                                    @can('language_delete')
                                                                        {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'POST',
                                        'onsubmit' => "return confirm('".trans("blue_factory.qa_are_you_sure")."');",
                                        'route' => ['admin.languages.restore', $language->id])) !!}
                                    {!! Form::submit(trans('blue_factory.qa_restore'), array('class' => 'btn btn-xs btn-success')) !!}
                                    {!! Form::close() !!}
                                @endcan
                                    @can('language_delete')
                                                                        {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("blue_factory.qa_are_you_sure")."');",
                                        'route' => ['admin.languages.perma_del', $language->id])) !!}
                                    {!! Form::submit(trans('blue_factory.qa_permadel'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                @endcan
                                </td>
                                @else
                                <td>
                                    @can('language_view')
                                    <a href="{{ route('admin.languages.show',[$language->id]) }}" class="btn btn-xs btn-primary">@lang('blue_factory.qa_view')</a>
                                    @endcan
                                    @can('language_edit')
                                    <a href="{{ route('admin.languages.edit',[$language->id]) }}" class="btn btn-xs btn-info">@lang('blue_factory.qa_edit')</a>
                                    @endcan
                                    @can('language_delete')
{!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("blue_factory.qa_are_you_sure")."');",
                                        'route' => ['admin.languages.destroy', $language->id])) !!}
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
        @can('language_delete')
            @if ( request('show_deleted') != 1 ) window.route_mass_crud_entries_destroy = '{{ route('admin.languages.mass_destroy') }}'; @endif
        @endcan

    </script>
@endsection