<div class="modal fade" id="kt_modal_add" tabindex="-1" aria-hidden="true">
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
                <form id="createForm" action="{{ route('payments.store') }}" method="post">
                    @csrf
                    <div class="row">

                        <div class="mb-3">
                            <label for="name" class="fs-6 fw-semibold mb-2">{{ __('lang.name') }}</label>
                            <input type="text" name="name" class="form-control form-control-solid">
                        </div>


                        <div class="col-md-4 fv-row">
                            <label class="fs-6 fw-semibold mb-2" for="status">
                                {{ __('lang.status') }}
                            </label>
                            <select class="form-select form-select-solid form-select-sm"
                                data-dropdown-parent="#kt_modal_add" data-control="select2" data-hide-search="false"
                                data-placeholder="{{ __('lang.select') }}" name="status">
                                <option value="">{{ __('lang.select') }}</option>
                                <option value="active">{{ __('lang.active') }}</option>
                                <option value="inactive">{{ __('lang.inactive') }}</option>
                            </select>
                        </div>
                        <div class="col-md-6 fv-row">
                            <label for="photos">{{ __('lang.photo') }}</label>
                            <input type="file" name="images" class="form-control form-control-solid">
                        </div>
                    </div>
                    <div class="text-end">
                        <button type="submit" class="btn btn-primary">{{ __('lang.new') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
