<div class="modal fade" id="modal_edit{{ $item->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog mw-650px">
        <div class="modal-content">
            <div class="modal-header pb-0 border-0 justify-content-end">
                <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal"><i
                        class="ki-duotone ki-cross fs-1">
                        <span class="path1"></span>
                        <span class="path2"></span>
                    </i>
                </div>
            </div>
            <div class="modal-body scroll-y mx-5 mx-xl-18 pt-0 pb-15">
                {{-- <form class="editForm" action="{{ route('users.update', ['user' => $item->id]) }}" --}}
                    {{-- method="post"> --}}
                    @csrf
                    @method('PUT')
                    <div class="row text-start">
                    </div>
                    <div class="text-end">
                        <button type="submit" class="btn btn-primary">{{ __('lang.save') }}</button>
                    </div>
                {{-- </form> --}}
            </div>
        </div>
    </div>
</div>
