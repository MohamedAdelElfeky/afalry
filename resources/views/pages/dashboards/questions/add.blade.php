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
                <form id="createForm" action="{{ route('questions.store') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="mb-3">
                            <label for="fs-6 fw-semibold mb-2">{{ __('lang.count') }}</label>
                            <input type="number" name="count" class="form-control form-control-solid">
                        </div>
                        <div class="mb-3">
                            <label for="fs-6 fw-semibold mb-2">{{ __('lang.name') }}</label>
                            <textarea name="question" id="description" class="form-control form-control-solid"></textarea>
                        </div>

                        <!-- Answer -->
                        <div class="mb-3">
                            <label class="fs-6 fw-semibold mb-2" for="answer">{{ __('lang.answer') }}</label>
                            <div id="answer-container">
                                <!-- Initial input field -->
                                <div class="input-group mb-3">
                                    <input type="text" name="answer[]" class="form-control form-control-solid py-3"
                                        value="">
                                    <div class="input-group-prepend">
                                        <button type="button"
                                            class="btn btn-danger remove-button py-3">{{ __('lang.delete') }}</button>
                                    </div>
                                </div>
                            </div>
                            <button type="button" class="btn btn-primary form-control"
                                id="addInvoiceFieldButton">{{ __('lang.add_field') }}</button>
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
