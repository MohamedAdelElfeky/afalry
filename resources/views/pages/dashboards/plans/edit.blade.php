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
                <form class="editForm" action="{{ route('plans.update', ['plan' => $item->id]) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="row text-start">
                        <input type="hidden" name="id" value="{{ $item->id }}">

                        <div class="mb-3">
                            <label for="name" class="fs-6 fw-semibold mb-2">{{ __('lang.name') }}</label>
                            <input type="text" name="name" class="form-control form-control-solid"
                                value="{{ $item->name }}">
                        </div>

                        <div class="mb-3">
                            <label for="des" class="fs-6 fw-semibold mb-2">{{ __('lang.description') }}</label>
                            <textarea name="des" class="form-control form-control-solid"> {{ $item->des }}</textarea>
                        </div>

                        {{-- <div class="mb-3">
                            <label for="ranking" class="fs-6 fw-semibold mb-2">{{ __('lang.ranking') }}</label>
                            <input type="number" name="ranking" class="form-control form-control-solid">
                        </div> --}}

                        <div class="mb-3">
                            <label for="days" class="fs-6 fw-semibold mb-2">{{ __('lang.days') }}</label>
                            <input type="number" name="days" class="form-control form-control-solid"
                                value="{{ $item->days }}">
                        </div>

                        <div class="mb-3">
                            <label for="monthly_price"
                                class="fs-6 fw-semibold mb-2">{{ __('lang.monthly_price') }}</label>
                            <input type="text" name="monthly_price" class="form-control form-control-solid"
                                value="{{ $item->monthly_price }}">
                        </div>

                        <div class="mb-3">
                            <label for="yearly_price"
                                class="fs-6 fw-semibold mb-2">{{ __('lang.yearly_price') }}</label>
                            <input type="text" name="yearly_price" class="form-control form-control-solid"
                                value="{{ $item->yearly_price }}">
                        </div>

                        <div class="mb-3">
                            <label for="if_free" class="fs-6 fw-semibold mb-2">{{ __('lang.if_free') }}</label>
                            <input type="checkbox" name="if_free" class="form-check-input"
                                @if ($item->if_free == 1) checked @endif value="{{ $item->if_free }}"
                                onchange="toggleCheckboxValue(this)">

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
