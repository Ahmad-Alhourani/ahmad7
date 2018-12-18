@extends ('backend.layouts.app')

@section ('title', __('labels.backend.helloes.management') . ' | ' . __('labels.backend.helloes.view'))

@section('breadcrumb-links')
@include('backend.helloes.includes.breadcrumb-links')
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        {{ __('labels.backend.helloes.management') }}
                        <small class="text-muted">{{ __('labels.backend.helloes.view') }}</small>
                    </h4>
                </div><!--col-->
            </div><!--row-->

            <div class="row mt-4 mb-4">
                <div class="col">
                    @include('backend.helloes.view')
                </div><!--col-->
            </div><!--row-->
        </div><!--card-body-->

        <div class="card-footer">
            <div class="row">
                <div class="col">
                    <small class="float-right text-muted">
                {{--       <strong>{{ __('labels.backend.helloes.content.created_at') }}:</strong> {{ $hello->updated_at->timezone(get_user_timezone()) }} ({{ $hello->created_at->diffForHumans() }}),--}}
                {{--       <strong>{{__('labels.backend.helloes.content.last_updated') }}:</strong> {{ $hello->created_at->timezone(get_user_timezone()) }} ({{$hello->updated_at->diffForHumans() }})--}}
                        @if ($hello->trashed())
                            <strong>{{ __('labels.backend.helloes.content.deleted_at') }}:</strong> $hello->deleted_at->timezone(get_user_timezone())  ($hello->deleted_at->diffForHumans() )
                        @endif
                    </small>
                </div><!--col-->
            </div><!--row-->
        </div><!--card-footer-->
    </div><!--card-->
@endsection