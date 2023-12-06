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
                <form id="createForm" action="{{ route('plans.store') }}" method="post">
                    @csrf
                    <div class="row">

                        <div class="mb-3">
                            <label for="name" class="fs-6 fw-semibold mb-2">{{ __('lang.name') }}</label>
                            <input type="text" name="name" class="form-control form-control-solid">
                        </div>

                        <div class="mb-3">
                            <label for="des" class="fs-6 fw-semibold mb-2">{{ __('lang.description') }}</label>
                            <textarea name="des" class="form-control form-control-solid"></textarea>
                        </div>

                        {{-- <div class="mb-3">
                            <label for="ranking" class="fs-6 fw-semibold mb-2">{{ __('lang.ranking') }}</label>
                            <input type="number" name="ranking" class="form-control form-control-solid">
                        </div> --}}

                        <div class="mb-3">
                            <label for="days" class="fs-6 fw-semibold mb-2">{{ __('lang.days') }}</label>
                            <input type="number" name="days" class="form-control form-control-solid">
                        </div>

                        <div class="mb-3">
                            <label for="monthly_price"
                                class="fs-6 fw-semibold mb-2">{{ __('lang.monthly_price') }}</label>
                            <input type="text" name="monthly_price" class="form-control form-control-solid">
                        </div>

                        <div class="mb-3">
                            <label for="yearly_price"
                                class="fs-6 fw-semibold mb-2">{{ __('lang.yearly_price') }}</label>
                            <input type="text" name="yearly_price" class="form-control form-control-solid">
                        </div>

                        <div class="mb-3">
                            <label for="if_free" class="fs-6 fw-semibold mb-2">{{ __('lang.if_free') }}</label>
                            <input type="checkbox" name="if_free" class="form-check-input" value="0"
                                onchange="toggleCheckboxValue(this)">
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
