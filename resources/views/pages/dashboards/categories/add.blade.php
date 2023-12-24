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
                <form id="createForm" action="{{ route('categories.store') }}" method="post">
                    @csrf
                    <div class="row">
                        <input type="hidden" name="type" value="{{ $type }}">

                        @if ($type == 'parent')
                            <div class="mb-3">
                                <label for="fs-6 fw-semibold mb-2">{{ __('lang.name') }}</label>
                                <input type="text" name="name[]" class="form-control form-control-solid">
                            </div>
                        @endif

                        @if ($type == 'child')
                            <div class="mb-3">
                                <label class="fs-6 fw-semibold mb-2">{{ __('lang.category_name') }}</label>
                                <div id="name">
                                    <div class="input-group mb-3">
                                        <input type="text" name="name[]" class="form-control form-control-solid">
                                        <div class="input-group-prepend">
                                            <button type="button"
                                                class="btn btn-danger remove-button py-3">{{ __('lang.delete') }}</button>
                                        </div>
                                    </div>
                                </div>
                                <button type="button" class="btn btn-primary form-control"
                                    id="addFieldButton">{{ __('lang.add_field') }}</button>
                            </div>
                        @endif

                        <div class="mb-3">
                            <label for="fs-6 fw-semibold mb-2">{{ __('lang.description') }}</label>
                            <textarea name="description" id="description" class="form-control form-control-solid"></textarea>
                        </div>
                        @if ($type == 'child')
                            <div class="mb-3">
                                <label class="fs-6 fw-semibold mb-2">
                                    {{ __('lang.category') }}</label>
                                <select class="form-select form-select-solid form-select-sm"
                                    data-dropdown-parent="#kt_modal_add" data-control="select2" data-hide-search="false"
                                    data-placeholder="{{ __('lang.select') }}" name="parent_id">
                                    <option value="">{{ __('lang.select') }}</option>
                                    @foreach ($parentCategories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        @endif


                        <div class="mb-3">
                            <label for="photos">{{ __('lang.photo') }}</label>
                            <input type="file" name="images" class="form-control form-control-solid" multiple>
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
