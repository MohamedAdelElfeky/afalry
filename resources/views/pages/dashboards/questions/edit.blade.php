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
                <form class="editForm" action="{{ route('questions.update', ['question' => $item->id]) }}"
                    method="post">
                    @csrf
                    @method('PUT')
                    <div class="row text-start">
                        <input type="hidden" name="id" value="{{ $item->id }}">
                        <div class="mb-3">
                            <label for="fs-6 fw-semibold mb-2">{{ __('lang.count') }}</label>
                            <input type="number" name="count" class="form-control form-control-solid"
                                value="{{ $item->count }}">
                        </div>
                        <div class="mb-3">
                            <label for="fs-6 fw-semibold mb-2">{{ __('lang.name') }}</label>
                            <textarea name="question" id="description" class="form-control form-control-solid">{{ $item->question }}</textarea>
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
