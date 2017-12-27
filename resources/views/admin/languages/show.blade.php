@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('blue_factory.languages.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('blue_factory.qa_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('blue_factory.languages.fields.title')</th>
                            <td field-key='title'>{{ $language->title }}</td>
                        </tr>
                        <tr>
                            <th>@lang('blue_factory.languages.fields.slug')</th>
                            <td field-key='slug'>{{ $language->slug }}</td>
                        </tr>
                        <tr>
                            <th>@lang('blue_factory.languages.fields.iso-label')</th>
                            <td field-key='iso_label'>{{ $language->iso_label }}</td>
                        </tr>
                    </table>
                </div>
            </div><!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist">
    
<li role="presentation" class="active"><a href="#category" aria-controls="category" role="tab" data-toggle="tab">Kategorije jela</a></li>
<li role="presentation" class=""><a href="#tags" aria-controls="tags" role="tab" data-toggle="tab">Oznake jela</a></li>
<li role="presentation" class=""><a href="#ingredients" aria-controls="ingredients" role="tab" data-toggle="tab">Sastojci jela</a></li>
<li role="presentation" class=""><a href="#meals" aria-controls="meals" role="tab" data-toggle="tab">Jela svijeta</a></li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
    
<div role="tabpanel" class="tab-pane active" id="category">
<table class="table table-bordered table-striped {{ count($categories) > 0 ? 'datatable' : '' }}">
    <thead>
        <tr>
            <th>@lang('blue_factory.category.fields.title')</th>
                        <th>@lang('blue_factory.category.fields.slug')</th>
                        <th>@lang('blue_factory.category.fields.language')</th>
                        @if( request('show_deleted') == 1 )
                        <th>&nbsp;</th>
                        @else
                        <th>&nbsp;</th>
                        @endif
        </tr>
    </thead>

    <tbody>
        @if (count($categories) > 0)
            @foreach ($categories as $category)
                <tr data-entry-id="{{ $category->id }}">
                    <td field-key='title'>{{ $category->title }}</td>
                                <td field-key='slug'>{{ $category->slug }}</td>
                                <td field-key='language'>{{ $category->language->iso_label or '' }}</td>
                                @if( request('show_deleted') == 1 )
                                <td>
                                    @can('category_delete')
                                                                        {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'POST',
                                        'onsubmit' => "return confirm('".trans("blue_factory.qa_are_you_sure")."');",
                                        'route' => ['admin.categories.restore', $category->id])) !!}
                                    {!! Form::submit(trans('blue_factory.qa_restore'), array('class' => 'btn btn-xs btn-success')) !!}
                                    {!! Form::close() !!}
                                @endcan
                                    @can('category_delete')
                                                                        {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("blue_factory.qa_are_you_sure")."');",
                                        'route' => ['admin.categories.perma_del', $category->id])) !!}
                                    {!! Form::submit(trans('blue_factory.qa_permadel'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                @endcan
                                </td>
                                @else
                                <td>
                                    @can('category_view')
                                    <a href="{{ route('admin.categories.show',[$category->id]) }}" class="btn btn-xs btn-primary">@lang('blue_factory.qa_view')</a>
                                    @endcan
                                    @can('category_edit')
                                    <a href="{{ route('admin.categories.edit',[$category->id]) }}" class="btn btn-xs btn-info">@lang('blue_factory.qa_edit')</a>
                                    @endcan
                                    @can('category_delete')
{!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("blue_factory.qa_are_you_sure")."');",
                                        'route' => ['admin.categories.destroy', $category->id])) !!}
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
<div role="tabpanel" class="tab-pane " id="tags">
<table class="table table-bordered table-striped {{ count($tags) > 0 ? 'datatable' : '' }}">
    <thead>
        <tr>
            <th>@lang('blue_factory.tags.fields.title')</th>
                        <th>@lang('blue_factory.tags.fields.slug')</th>
                        <th>@lang('blue_factory.tags.fields.language')</th>
                        @if( request('show_deleted') == 1 )
                        <th>&nbsp;</th>
                        @else
                        <th>&nbsp;</th>
                        @endif
        </tr>
    </thead>

    <tbody>
        @if (count($tags) > 0)
            @foreach ($tags as $tag)
                <tr data-entry-id="{{ $tag->id }}">
                    <td field-key='title'>{{ $tag->title }}</td>
                                <td field-key='slug'>{{ $tag->slug }}</td>
                                <td field-key='language'>{{ $tag->language->iso_label or '' }}</td>
                                @if( request('show_deleted') == 1 )
                                <td>
                                    @can('tag_delete')
                                                                        {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'POST',
                                        'onsubmit' => "return confirm('".trans("blue_factory.qa_are_you_sure")."');",
                                        'route' => ['admin.tags.restore', $tag->id])) !!}
                                    {!! Form::submit(trans('blue_factory.qa_restore'), array('class' => 'btn btn-xs btn-success')) !!}
                                    {!! Form::close() !!}
                                @endcan
                                    @can('tag_delete')
                                                                        {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("blue_factory.qa_are_you_sure")."');",
                                        'route' => ['admin.tags.perma_del', $tag->id])) !!}
                                    {!! Form::submit(trans('blue_factory.qa_permadel'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                @endcan
                                </td>
                                @else
                                <td>
                                    @can('tag_view')
                                    <a href="{{ route('admin.tags.show',[$tag->id]) }}" class="btn btn-xs btn-primary">@lang('blue_factory.qa_view')</a>
                                    @endcan
                                    @can('tag_edit')
                                    <a href="{{ route('admin.tags.edit',[$tag->id]) }}" class="btn btn-xs btn-info">@lang('blue_factory.qa_edit')</a>
                                    @endcan
                                    @can('tag_delete')
{!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("blue_factory.qa_are_you_sure")."');",
                                        'route' => ['admin.tags.destroy', $tag->id])) !!}
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
<div role="tabpanel" class="tab-pane " id="ingredients">
<table class="table table-bordered table-striped {{ count($ingredients) > 0 ? 'datatable' : '' }}">
    <thead>
        <tr>
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
<div role="tabpanel" class="tab-pane " id="meals">
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

            <a href="{{ route('admin.languages.index') }}" class="btn btn-default">@lang('blue_factory.qa_back_to_list')</a>
        </div>
    </div>
@stop
