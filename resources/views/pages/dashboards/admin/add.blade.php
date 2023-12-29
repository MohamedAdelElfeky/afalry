<div class="modal fade" id="kt_modal_add" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered mw-900px">
        <div class="modal-content">
            <div class="modal-header pb-0 border-0">
                <h5 class="modal-title"> {{ __('lang.create_new_product') }} </h5>

                <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal"><i
                        class="ki-duotone ki-cross fs-1">
                        <span class="path1"></span>
                        <span class="path2"></span>
                    </i>
                </div>

            </div>
            <form id="createForm" action="{{ route('products.store') }}" method="post">
                <div class="modal-body">
                    @csrf
                    <div class="row g-9 mb-8">
                        <div class="fv-row mb-8">
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="fs-6 fw-semibold mb-2">البريد الإلكتروني</label>
                                    <input type="email" class="form-control form-control-solid"
                                        placeholder="البريد الإلكتروني" name="email" required />
                                </div>
                                <div class="col-md-6">
                                    <label class="fs-6 fw-semibold mb-2">الهاتف</label>
                                    <input type="tel" class="form-control form-control-solid" placeholder="الهاتف"
                                        name="phone" required />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">{{ __('lang.new') }}</button>
                </div>
            </form>

        </div>
    </div>
</div>
