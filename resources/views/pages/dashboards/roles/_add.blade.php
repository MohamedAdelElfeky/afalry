<div class="modal fade" id="modal_category" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog mw-650px">
        <div class="modal-content">
            <div class="modal-header pb-0 border-0 justify-content-end">
                <button type="button" class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                    X
                </button>
            </div>
            <div class="modal-body scroll-y mx-5 mx-xl-18 pt-0 pb-15">
                <form id="roleForm">
                @csrf

                    <div class="fv-row mb-8">
                        <div class="row">
                            <div class="col-md-12">
                                <label class="fs-6 fw-semibold mb-2"> {{ __('lang.name') }} </label>
                                <input type="text" class="form-control form-control-solid"
                                    placeholder="{{ __('lang.name') }}" name="name" required />
                            </div>
                        </div>
                    </div>
                    <div class="row text-center">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary ">{{ __('lang.save') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
