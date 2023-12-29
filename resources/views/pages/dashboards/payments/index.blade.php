<x-default-layout>

    <div class="card mb-5 mb-xl-8">
        <div class="card-header border-0 pt-5">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label fw-bold fs-3 mb-1">{{ __('lang.type_payments') }}</span>
            </h3>
            <div class="card-toolbar" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-trigger="hover"
                title="{{ __('lang.add_new_plan') }}">
                <a class="btn btn-sm btn-light btn-active-primary m-1" data-bs-toggle="modal"
                    data-bs-target="#kt_modal_add">
                    <i class="ki-duotone ki-plus fs-2"></i></a>
            </div>
        </div>
        <div class="card-body py-3">
            <div class="table-responsive">
                <table class="table table-row-dashed table-sm text-center gs-0 gy-4">
                    <thead>
                        <tr class="fw-bold text-muted">
                            <th class="min-w-25px">#</th>
                            <th class="min-w-150px">{{ __('lang.name') }}</th>
                            <th class="min-w-150px">{{ __('lang.photo') }}</th>
                            <th class="min-w-70px">{{ __('lang.status') }}</th>
                            <th class="min-w-100px text-end">{{ __('lang.actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($payments as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->name }}</td>
                                <td>
                                    @if ($item->images->isNotEmpty())
                                        @foreach ($item->images as $image)
                                            <a href="{{ asset($image->url) }}"
                                                target="_blank">{{ __('lang.view_image') }}</a> <br>
                                        @endforeach
                                    @else
                                        {{ __('lang.no_images') }}
                                    @endif
                                </td>
                                <td class="text-center">
                                    <!-- Toggle Switch -->
                                    <div class="form-check form-switch">
                                        <input type="checkbox" class="form-check-input status-toggle"
                                            id="toggleStatus{{ $item->status }}" data-product-id="{{ $item->id }}"
                                            {{ $item->status == 'active' ? 'checked' : '' }}>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex justify-content-end flexpca-shrink-0">

                                        <a class="btn btn-icon btn-bg-light btn-color-warning btn-sm me-1"
                                            data-bs-toggle="modal" data-bs-target="#modal_edit{{ $item->id }}"
                                            data-edit-id="{{ $item->id }}">
                                            <i class="ki-duotone ki-pencil fs-2">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i>
                                        </a>

                                        @include('pages/dashboards/payments/edit')

                                        <a data-delete-id="{{ $item->id }}"
                                            class="btn btn-icon btn-bg-light btn-color-danger btn-sm me-1 delete-btn">
                                            <i class="ki-duotone ki-abstract-11 fs-2">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i>
                                        </a>

                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="pagination justify-content-center">
                    <nav role="navigation" aria-label="Pagination Navigation">
                        <div class="flex items-center justify-between">

                            <a href="{{ $payments->previousPageUrl() }}" class="btn btn-outline-secondary">«
                                {{ __('lang.previous') }}</a>

                            @foreach ($payments->getUrlRange(max(1, $payments->currentPage() - 1), min($payments->lastPage(), $payments->currentPage() + 1)) as $page => $url)
                                <a href="{{ $url }}"
                                    class="btn btn-outline-secondary {{ $page == $payments->currentPage() ? 'active' : '' }}">{{ $page }}</a>
                            @endforeach

                            <a href="{{ $payments->nextPageUrl() }}" class="btn btn-outline-secondary">
                                {{ __('lang.next') }} »</a>

                            <div class="text-center">
                                <p class="text-sm text-gray-700 leading-5">
                                    {{ __('lang.showing') }}
                                    <span class="font-medium">{{ $payments->firstItem() }}</span>
                                    {{ __('lang.to') }}
                                    <span class="font-medium">{{ $payments->lastItem() }}</span>
                                    {{ __('lang.of') }}
                                    <span class="font-medium">{{ $payments->total() }}</span>
                                    {{ __('lang.results') }}
                                </p>
                            </div>

                        </div>
                    </nav>
                </div>

            </div>
        </div>
    </div>

    @include('pages/dashboards/payments/add')

    @section('script')
        <script>
            $(document).ready(function() {
                $('input[name="if_free"]').change(function() {
                    this.value = this.checked ? 1 : 0;
                });
            });
            $(document).ready(function() {
                $('#createForm').submit(function(e) {
                    e.preventDefault();
                    $('#createFormButton').prop('disabled', true);
                    var formData = new FormData(this);
                    $.ajax({
                        url: $(this).attr('action'),
                        type: $(this).attr('method'),
                        data: formData,
                        processData: false,
                        contentType: false,
                        success: function(response) {
                            $('#kt_modal_add').modal('hide');
                            location.reload();
                        },
                        error: function(xhr) {
                            console.log(xhr.responseText);
                            $('#createFormButton').prop('disabled', false);
                        }
                    });
                });
            });

            $(document).ready(function() {
                $('.editForm').submit(function(e) {
                    e.preventDefault();
                    var formData = new FormData(this);
                    var editId = $(this).find('input[name="id"]').val();
                    $.ajax({
                        url: $(this).attr('action'),
                        type: $(this).attr('method'),
                        data: formData,
                        processData: false,
                        contentType: false,
                        success: function(response) {
                            $('#modal_edit' + editId).modal('hide');
                            location.reload();
                        },
                        error: function(xhr) {
                            console.log(xhr.responseText);
                        }
                    });
                });
            });

            $(document).ready(function() {
                $('.delete-btn').click(function() {
                    var deleteId = $(this).data('delete-id');
                    var csrfToken = $('meta[name="csrf-token"]').attr('content');
                    Swal.fire({
                        icon: 'question',
                        title: '{{ __('lang.confirmation') }}',
                        text: '{{ __('lang.are_you_sure_you_want_to_delete') }}',
                        showCancelButton: true,
                        confirmButtonText: '{{ __('lang.yes') }}',
                        cancelButtonText: '{{ __('lang.no') }}'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $.ajax({
                                url: 'payments/' + deleteId,
                                type: 'DELETE',
                                headers: {
                                    'X-CSRF-TOKEN': csrfToken
                                },
                                success: function(response) {
                                    Swal.fire({
                                        icon: 'success',
                                        title: '{{ __('lang.deleted') }}',
                                        text: '{{ __('lang.deleted_successfully') }}',
                                        showConfirmButton: false,
                                        timer: 1500
                                    }).then(function() {
                                        location.reload();
                                    });
                                },
                                error: function(xhr) {
                                    Swal.fire({
                                        title: '{{ __('lang.error') }}',
                                        text: '{{ __('lang.an_error_occurred_while_deleting') }}',
                                        icon: 'error'
                                    });
                                }
                            });
                        }
                    });
                });
            });

            $(document).ready(function() {
                // Attach a click event listener to the toggle switch
                $('.status-toggle').on('change', function() {
                    const planId = $(this).data('plan-id');
                    const isChecked = $(this).prop('checked');
                    const isFree = isChecked ? '1' : '0';

                    // Send an AJAX request to update the status
                    $.ajax({
                        url: '{{ route('update.plan.free') }}',
                        method: 'POST',
                        data: {
                            plan_id: planId,
                            is_free: isFree,
                            _token: '{{ csrf_token() }}',
                        },
                        success: function(response) {
                            console.log(response);

                            Swal.fire({
                                title: 'Success!',
                                text: 'Plan updated successfully',
                                icon: 'success',
                            });
                        },
                        error: function(error) {
                            Swal.fire({
                                title: 'Error!',
                                text: 'Failed to update plan',
                                icon: 'error',
                            });
                            console.error(error);
                        },
                    });
                });
            });
        </script>
    @endsection
</x-default-layout>
