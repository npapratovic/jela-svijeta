@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('blue_factory.meals.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('blue_factory.qa_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('blue_factory.meals.fields.title')</th>
                            <td field-key='title'>{{ $meal->title }}</td>
                        </tr>
                        <tr>
                            <th>@lang('blue_factory.meals.fields.slug')</th>
                            <td field-key='slug'>{{ $meal->slug }}</td>
                        </tr>
                        <tr>
                            <th>@lang('blue_factory.meals.fields.description')</th>
                            <td field-key='description'>{{ $meal->description }}</td>
                        </tr>
                        <tr>
                            <th>@lang('blue_factory.meals.fields.category')</th>
                            <td field-key='category'>{{ $meal->category->title or '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('blue_factory.meals.fields.tag')</th>
                            <td field-key='tag'>
                                @foreach ($meal->tag as $singleTag)
                                    <span class="label label-info label-many">{{ $singleTag->title }}</span>
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <th>@lang('blue_factory.meals.fields.language')</th>
                            <td field-key='language'>{{ $meal->language->iso_label or '' }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.meals.index') }}" class="btn btn-default">@lang('blue_factory.qa_back_to_list')</a>
        </div>
    </div>
@stop
