<div class="modal fade" id="modal_edit{{ $item->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered mw-900px">
        <div class="modal-content">
            <div class="modal-header pb-0 border-0 justify-content-end">
                <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal"><i
                        class="ki-duotone ki-cross fs-1">
                        <span class="path1"></span>
                        <span class="path2"></span>
                    </i>
                </div>
            </div>
            <form class="editForm" action="{{ route('products.update', ['product' => $item->id]) }}" method="post">
                <div class="modal-body text-start">
                    @csrf
                    @method('PUT')
                    <div class="row g-9 mb-8">
                        <div class="col-md-4 fv-row">
                            <label class="fs-6 fw-semibold mb-2" for="product_id">
                                {{ __('lang.category') }}</label>
                            <select class="form-select form-select-solid form-select-sm"
                                data-dropdown-parent="#modal_edit{{ $item->id }}" data-control="select2"
                                data-hide-search="false" data-placeholder="{{ __('lang.select') }}" name="category_id">
                                <option value="">{{ __('lang.select') }}</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ $item->category_id == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-4 fv-row">
                            <label for="fs-6 fw-semibold mb-2">{{ __('lang.name') }}</label>
                            <input type="text" name="name" class="form-control form-control-solid"
                                value="{{ $item->name }}">
                        </div>

                        <div class="col-md-4 fv-row">
                            <label for="fs-6 fw-semibold mb-2">{{ __('lang.price') }}</label>
                            <input type="number" name="price" class="form-control form-control-solid"
                                value="{{ $item->price }}">
                        </div>
                        <div class="col-md-4 fv-row">
                            <label for="fs-6 fw-semibold mb-2">{{ __('lang.balance') }}</label>
                            <input type="number" name="balance" class="form-control form-control-solid"
                                value="{{ $item->balance }}">
                        </div>




                        <!-- Add New Images -->
                        <div class="col-md-4 fv-row">
                            <label for="photos">{{ __('lang.photo') }}</label>
                            <input type="file" name="images[]" class="form-control form-control-solid" multiple>
                        </div>

                        <div class="col-md-4 fv-row">
                            <label class="fs-6 fw-semibold mb-2" for="status">
                                {{ __('lang.status') }}
                            </label>
                            <select class="form-select form-select-solid form-select-sm"
                                data-dropdown-parent="#modal_edit{{ $item->id }}" data-control="select2"
                                data-hide-search="false" data-placeholder="{{ __('lang.select') }}" name="status">
                                <option value="">{{ __('lang.select') }}</option>
                                <option value="active" {{ $item->status == 'active' ? 'selected' : '' }}>
                                    {{ __('lang.active') }}
                                </option>
                                <option value="inactive" {{ $item->status == 'inactive' ? 'selected' : '' }}>
                                    {{ __('lang.inactive') }}
                                </option>
                            </select>
                        </div>

                        <div class="col-md-6 fv-row">
                            <label class="fs-6 fw-semibold mb-2" for="product_id">
                                {{ __('lang.plans') }}</label>
                            <select class="form-select form-select-solid form-select-sm"
                                data-dropdown-parent="#modal_edit{{ $item->id }}" data-control="select2"
                                data-hide-search="false" data-placeholder="{{ __('lang.select') }}" name="plans[]"
                                multiple="multiple">
                                <option value="">{{ __('lang.select') }}</option>
                                @foreach ($plans as $plan)
                                    <option value="{{ $plan->id }}"
                                        {{ is_array($item->plans) && in_array($plan->id, $item->plans) ? 'selected' : '' }}>
                                        {{ $plan->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Product Attributes -->
                        <div class="col-md-12 fv-row">
                            <label class="fs-6 fw-semibold mb-2">{{ __('lang.product_attributes') }}</label>
                            <div id="productAttributes_{{ $item->id }}">
                                <table class="table table-bordered text-center">
                                    <thead>
                                        <tr>
                                            <th>{{ __('lang.attribute') }}</th>
                                            <th>{{ __('lang.value') }}</th>
                                            <th>{{ __('lang.actions') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>                                    
                                        @foreach ($item->productAttributes as $attribute)
                                            <tr>
                                                <input type="hidden" name="product_attribute_id[]"
                                                    value="{{ $attribute->id }}">
                                                <td><input type="text" name="product_attribute[]"
                                                        class="form-control form-control-solid py-3"
                                                        value="{{ $attribute->attribute }}">
                                                </td>
                                                <td><input type="text" name="product_value[]"
                                                        class="form-control form-control-solid py-3"
                                                        value="{{ $attribute->value }}">
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-danger remove-button py-3">
                                                        <i class="bi bi-trash fs-2"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td>
                                                <button type="button" class="btn btn-primary form-control"
                                                    id="editFieldButton_{{ $item->id }}" data-edit-code="{{ $item->id }}">
                                                    <i class="ki-duotone ki-plus fs-2"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>

                        <div class="col-md-6 fv-row">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>{{ __('lang.photo') }}</th>
                                        <th>{{ __('lang.delete') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($item->images as $image)
                                        <tr>
                                            <td>
                                                <button type="button" class="btn btn-link" data-bs-toggle="modal"
                                                    data-bs-target="#imageModal{{ $image->id }}">
                                                    <img src="{{ asset($image->url) }}" alt="Existing Image"
                                                        class="w-150px h-75px">
                                                </button>
                                            </td>
                                            <td>
                                                <label class="form-check">
                                                    <input type="checkbox" name="delete_images[]"
                                                        value="{{ $image->id }}" class="form-check-input">
                                                </label>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <div class="mb-3">
                            <label for="fs-6 fw-semibold mb-2">{{ __('lang.description') }}</label>
                            <textarea name="description" id="description" class="form-control form-control-solid"> {{ $item->description }} </textarea>
                        </div>
                    </div>
                    <div class="text-end">
                        <button type="submit" class="btn btn-primary">{{ __('lang.save') }}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
