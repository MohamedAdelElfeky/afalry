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
                        <div class="col-md-4 fv-row">
                            <label class="fs-6 fw-semibold mb-2" for="product_id">
                                {{ __('lang.category') }}</label>
                            <select class="form-select form-select-solid form-select-sm"
                                data-dropdown-parent="#kt_modal_add" data-control="select2" data-hide-search="false"
                                data-placeholder="{{ __('lang.select') }}" name="category_id">
                                <option value="">{{ __('lang.select') }}</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-4 fv-row">
                            <label for="fs-6 fw-semibold mb-2">{{ __('lang.name') }}</label>
                            <input type="text" name="name" class="form-control form-control-solid">
                        </div>

                        <div class="col-md-4 fv-row">
                            <label for="fs-6 fw-semibold mb-2">{{ __('lang.price') }}</label>
                            <input type="number" name="price" class="form-control form-control-solid">
                        </div>
                        <div class="col-md-4 fv-row">
                            <label for="fs-6 fw-semibold mb-2">{{ __('lang.balance') }}</label>
                            <input type="number" name="balance" class="form-control form-control-solid">
                        </div>

                        <div class="col-md-4 fv-row">
                            <label for="photos">{{ __('lang.photo') }}</label>
                            <input type="file" name="images[]" class="form-control form-control-solid" multiple>
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
                            <label class="fs-6 fw-semibold mb-2" for="product_id">
                                {{ __('lang.plans') }}</label>
                            <select class="form-select form-select-solid form-select-sm"
                                data-dropdown-parent="#kt_modal_add" data-control="select2" data-hide-search="false"
                                data-placeholder="{{ __('lang.select') }}" name="plans[]" multiple="multiple">
                                <option value="">{{ __('lang.select') }}</option>
                                @foreach ($plans as $plan)
                                    <option value="{{ $plan->id }}">{{ $plan->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Product Attributes -->
                        <div class="col-md-12 fv-row">
                            <label class="fs-6 fw-semibold mb-2">{{ __('lang.product_attributes') }}</label>
                            <div id="productAttributes">
                                <table class="table table-bordered text-center">
                                    <thead>
                                        <tr>
                                            <th>{{ __('lang.attribute') }}</th>
                                            <th>{{ __('lang.value') }}</th>
                                            <th>{{ __('lang.actions') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><input type="text" name="product_attribute[]"
                                                    class="form-control form-control-solid py-3"></td>
                                            <td><input type="text" name="product_value[]"
                                                    class="form-control form-control-solid py-3"></td>
                                            <td>
                                                <button type="button" class="btn btn-danger remove-button py-3">
                                                    <i class="bi bi-trash fs-2"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td>
                                                <button type="button" class="btn btn-primary form-control"
                                                    id="addFieldButton"><i class="ki-duotone ki-plus fs-2"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="fs-6 fw-semibold mb-2">{{ __('lang.description') }}</label>
                            <textarea name="description" id="description" class="form-control form-control-solid"></textarea>
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
