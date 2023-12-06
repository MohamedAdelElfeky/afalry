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
                <form class="editForm" action="{{ route('products.update', ['offer' => $item->id]) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="row text-start">
                        <input type="hidden" name="id" value="{{ $item->id }}">

                        <div class="mb-3">
                            <label class="fs-6 fw-semibold mb-2" for="product_id">
                                {{ __('lang.product') }}</label>
                            <select class="form-select form-select-solid form-select-sm"
                                data-dropdown-parent="#modal_edit{{ $item->id }}" data-control="select2"
                                data-hide-search="false" data-placeholder="{{ __('lang.select') }}" name="product_id">
                                <option value="">{{ __('lang.select') }}</option>
                                @foreach ($products as $product)
                                    <option value="{{ $product->id }}"
                                        {{ $product && $product->product_id == $product->product_id ? 'selected' : '' }}>
                                        {{ $product->name }}
                                    </option>
                                @endforeach
                            </select>
                            <span class="error-message text-danger"></span>
                        </div>
                        <div class="mb-3">
                            <label class="fs-6 fw-semibold mb-2">{{ __('lang.type_offer') }}</label>
                            <select class="form-select form-select-solid form-select-sm"
                                data-dropdown-parent="#modal_edit{{ $item->id }}" data-control="select2"
                                data-hide-search="false" data-placeholder="{{ __('lang.select') }}" name="type">
                                <option value="">{{ __('lang.select') }}</option>
                                <option value="value" {{ $item->type === 'value' ? 'selected' : '' }}>
                                    {{ __('lang.value') }}</option>
                                <option value="present" {{ $item->type === 'present' ? 'selected' : '' }}>
                                    {{ __('lang.present') }}</option>
                            </select>
                            <span class="error-message text-danger"></span>
                        </div>
                        <div class="mb-3">
                            <label for="fs-6 fw-semibold mb-2">{{ __('lang.value_offer') }}</label>
                            <input type="number" name="value" class="form-control form-control-solid"
                                value="{{ $item->value }}">
                        </div>
                        <div class="mb-3">
                            <label class="fs-6 fw-semibold mb-2 mb-2">
                                {{ __('lang.end_date') }}</label>
                            <div class="position-relative d-flex align-items-center">
                                <input type="date" class="form-control form-control-solid datepicker"
                                    placeholder="{{ __('lang.pick_date') }}" name="end_date"
                                    value="{{ $item->end_date }}" />
                            </div>
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
