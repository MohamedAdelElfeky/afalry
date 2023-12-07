<div class="modal fade" id="kt_modal_add" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered mw-900px">
        <div class="modal-content">
            <div class="modal-header pb-0 border-0 ">
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
                        <div class="col-md-4 fv-row">
                            <label class="fs-6 fw-semibold mb-2" for="product_id">
                                {{ __('lang.product') }}</label>
                            <select class="form-select form-select-solid form-select-sm"
                                data-dropdown-parent="#kt_modal_add" data-control="select2" data-hide-search="false"
                                data-placeholder="{{ __('lang.select') }}" name="category_id">
                                <option value="">{{ __('lang.select') }}</option>
                                @foreach ($products as $product)
                                    <option value="{{ $product->id }}">{{ $product->name }}</option>
                                @endforeach
                            </select>
                            <span class="error-message text-danger"></span>
                        </div>

                        <div class="col-md-4 fv-row">
                            <label for="fs-6 fw-semibold mb-2">{{ __('lang.value_offer') }}</label>
                            <input type="number" name="value" class="form-control form-control-solid">
                        </div>
                        <div class="col-md-4 fv-row">
                            <label class="fs-6 fw-semibold mb-2 mb-2">
                                {{ __('lang.end_date') }}</label>
                            <div class="position-relative d-flex align-items-center">
                                <input type="date" class="form-control form-control-solid datepicker"
                                    placeholder="{{ __('lang.pick_date') }}" name="end_date" />
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
