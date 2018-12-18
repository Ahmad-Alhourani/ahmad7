@extends ('backend.layouts.app')

@section ('title', __('labels.backend.helloes.management') . ' | ' . __('labels.backend.helloes.edit'))

@section('breadcrumb-links')
@include('backend.helloes.includes.breadcrumb-links')
@endsection
@section('content')
    {{ html()->modelForm($hello, 'PATCH', route('admin.hello.update', $hello->id))->acceptsFiles()->class('form-horizontal')->open() }}
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        {{ __('labels.backend.helloes.management') }}
                        <small class="text-muted">{{ __('labels.backend.helloes.edit') }}</small>
                    </h4>
                </div><!--col-->
            </div><!--row-->

            <hr />

            @include('backend.helloes.fields')

        </div><!--card-body-->

        <div class="card-footer">
            <div class="row">
                <div class="col">
                    {{ form_cancel(route('admin.hello.index'), __('buttons.general.cancel')) }}
                </div><!--col-->

                <div class="col text-right">
                    {{ form_submit(__('buttons.general.crud.update')) }}
                </div><!--row-->
            </div><!--row-->
        </div><!--card-footer-->
    </div><!--card-->
  {{ html()->closeModelForm() }}
@endsection