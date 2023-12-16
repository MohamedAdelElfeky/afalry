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
                <form class="editForm" action="{{ route('questions.update', ['question' => $item->id]) }}"
                    method="post">
                    @csrf
                    @method('PUT')
                    <div class="row text-start">
                        <input type="hidden" name="id" value="{{ $item->id }}">
                        <div class="mb-3">
                            <label for="fs-6 fw-semibold mb-2">{{ __('lang.count') }}</label>
                            <input type="number" name="count" class="form-control form-control-solid"
                                value="{{ $item->count }}">
                        </div>
                        <div class="mb-3">
                            <label for="fs-6 fw-semibold mb-2">{{ __('lang.name') }}</label>
                            <textarea name="question" id="description" class="form-control form-control-solid">{{ $item->question }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label class="fs-6 fw-semibold mb-2" for="answer">{{ __('lang.answer') }}</label>
                            <div class="answer-container_{{ $item->id }}">
                                @if (!is_null($item->answer))
                                    @foreach ($item->answer as $answer)
                                        <div class="input-group mb-3">
                                            <input type="text" name="answer[]"
                                                class="form-control form-control-solid py-3"
                                                value="{{ $answer }}">
                                            <div class="input-group-prepend">
                                                <button type="button"
                                                    class="btn btn-danger remove-button py-3">{{ __('lang.delete') }}</button>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                            <button type="button"
                                class="btn btn-primary form-control addFieldButton_{{ $item->id }}">{{ __('lang.add_field') }}</button>
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
<script>
    $(document).ready(function() {
        // Add a new input field on button click
        $(".addFieldButton_{{ $item->id }}").click(function() {
            var newField = $(this).closest('.mb-3').find(
                    ".answer-container_{{ $item->id }} .input-group:first")
                .clone();
            newField.find('input').val('');
            $(this).closest('.mb-3').find(".answer-container_{{ $item->id }}").append(newField);
        });

        // Remove a specific input field on button click
        $(".answer-container_{{ $item->id }}").on('click', '.remove-button', function() {
            var inputGroups = $(this).closest('.mb-3').find(
                ".answer-container_{{ $item->id }} .input-group");
            if (inputGroups.length > 1) {
                $(this).closest('.input-group').remove();
            } else {
                alert("You must have at least one answer field.");
            }
        });
    });
</script>
