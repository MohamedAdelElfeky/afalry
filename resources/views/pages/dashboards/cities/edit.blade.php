<div class="modal fade" id="modal_cities{{ $item->id }}" tabindex="-1" aria-hidden="true">
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
                <form class="editCitiesForm">
                    @csrf
                    <div class="row text-start">
                        <div class="mb-3">
                            <label for="fs-6 fw-semibold mb-2">{{ __('lang.name') }}</label>
                            <input type="text" name="name" class="form-control form-control-solid"
                                value="{{ $item->name }}">
                        </div>
                        <div class="mb-3">
                            <label for="fs-6 fw-semibold mb-2">{{ __('lang.deleg_value') }}</label>
                            <input type="number" name="deleg" class="form-control form-control-solid"
                                value="{{ $item->deleg }}">
                        </div>
                        <div class="mb-3">
                            <label for="fs-6 fw-semibold mb-2">{{ __('lang.com_value') }}</label>
                            <input type="number" name="com" class="form-control form-control-solid"
                                value="{{ $item->com }}">
                        </div>
                        <div class="mb-3">
                            <label for="fs-6 fw-semibold mb-2">{{ __('lang.del_value') }}</label>
                            <input type="number" name="del" class="form-control form-control-solid"
                                value="{{ $item->del }}">
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
