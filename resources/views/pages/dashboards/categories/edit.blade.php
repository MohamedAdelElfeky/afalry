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
                <form class="editForm" action="{{ route('categories.update', ['category' => $item->id]) }}"
                    method="post">
                    @csrf
                    @method('PUT')
                    <div class="row text-start">
                        <input type="hidden" name="id" value="{{ $item->id }}">
                        <div class="mb-3">
                            <label for="fs-6 fw-semibold mb-2">{{ __('lang.name') }}</label>
                            <input type="text" name="name" class="form-control form-control-solid"
                                value="{{ $item->name }}">
                        </div>
                        <div class="mb-3">
                            <label for="fs-6 fw-semibold mb-2">{{ __('lang.name') }}</label>
                            <textarea name="description" id="description" class="form-control form-control-solid">{{ $item->description }}</textarea>
                        </div>
                        @if ($type == 'child')
                            <div class="mb-3">
                                <label class="fs-6 fw-semibold mb-2" for="product_id">
                                    {{ __('lang.category') }}</label>
                                <select class="form-select form-select-solid form-select-sm"
                                    data-dropdown-parent="#modal_edit{{ $item->id }}" data-control="select2"
                                    data-hide-search="false" data-placeholder="{{ __('lang.select') }}"
                                    name="parent_id">
                                    <option value="">{{ __('lang.select') }}</option>
                                    @foreach ($parentCategories as $category)
                                        <option value="{{ $category->id }}"
                                            {{ $category->id == $item->parent_id ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        @endif
                    </div>
                    <div class="text-end">
                        <button type="submit" class="btn btn-primary">{{ __('lang.save') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
