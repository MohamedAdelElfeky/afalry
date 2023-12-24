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
                <form class="editForm" action="{{ route('sidebars.update', ['sidebar' => $item->id]) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="row text-start">
                        <input type="hidden" name="id" value="{{ $item->id }}">

                        <div class="mb-3">
                            <label for="fs-6 fw-semibold mb-2">{{ __('lang.title') }}</label>
                            <input type="text" name="title" class="form-control form-control-solid"
                                value="{{ $item->title }}">
                        </div>
                        <div class="mb-3">
                            <label for="fs-6 fw-semibold mb-2">{{ __('lang.description') }}</label>
                            <textarea name="description" id="desc" class="form-control form-control-solid">{{ $item->desc }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="photos">{{ __('lang.photo') }}</label>
                            <input type="file" name="images" class="form-control form-control-solid" multiple>
                        </div>
                    </div>
                    <div class="text-end">
                        <button type="submit" class="btn btn-primary">{{ __('lang.save') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
