<a href="#" data-bs-toggle="modal" data-bs-target="#modal-description-{{ $id }}">
    @lang('admin.See More')
</a>
<div class="modal modal-blur fade" id="modal-description-{{ $id }}" tabindex="-1" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ $name }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="@lang('admin.Close')"></button>
            </div>
            <div class="modal-body">
                {!! $description !!}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn me-auto" data-bs-dismiss="modal">@lang('admin.Close')</button>
            </div>
        </div>
    </div>
</div>
