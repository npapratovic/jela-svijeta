@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('blue_factory.ingredients.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('blue_factory.qa_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('blue_factory.ingredients.fields.title')</th>
                            <td field-key='title'>{{ $ingredient->title }}</td>
                        </tr>
                        <tr>
                            <th>@lang('blue_factory.ingredients.fields.slug')</th>
                            <td field-key='slug'>{{ $ingredient->slug }}</td>
                        </tr>
                        <tr>
                            <th>@lang('blue_factory.ingredients.fields.language')</th>
                            <td field-key='language'>{{ $ingredient->language->iso_label or '' }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.ingredients.index') }}" class="btn btn-default">@lang('blue_factory.qa_back_to_list')</a>
        </div>
    </div>
@stop
