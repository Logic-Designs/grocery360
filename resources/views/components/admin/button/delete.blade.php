<form class="d-sm-inline" action="{{ route($route, $id ) }}" method="post">
    @csrf
    @method('DELETE')
    <a href="#" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modal-delete-{{ $id }}">
        @lang('admin.Delete')
    </a>
    <div class="modal modal-blur fade" id="modal-delete-{{ $id }}" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="modal-title">Are you sure?</div>
                    <div>If you proceed, you will lose all your data.</div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-link link-secondary me-auto" data-bs-dismiss="modal">@lang('admin.Cancel')</button>
                    <button type="submit" class="btn btn-danger" data-bs-dismiss="modal">@lang('admin.Yes, delete')</button>
                </div>
            </div>
        </div>
    </div>
</form>
