<x-default-layout>

    <div class="card mb-5 mb-xl-8">
        <div class="card-header border-0 pt-5">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label fw-bold fs-3 mb-1">{{ __('lang.admins') }}</span>
            </h3>
            <div class="card-toolbar" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-trigger="hover">

            </div>
        </div>
        <div class="card-body py-3">
            <div class="table-responsive">
                <table class="table table-row-dashed table-sm text-center gs-0 gy-4">
                    <thead>
                        <tr class="fw-bold text-muted">
                            <th class="min-w-25px">#</th>
                            <th class="min-w-150px">{{ __('lang.user_name') }}</th>
                            <th class="min-w-150px">{{ __('lang.email') }}</th>
                            <th class="min-w-150px">{{ __('lang.nationality') }}</th>
                            <th class="min-w-150px">{{ __('lang.phone') }}</th>
                            <th class="min-w-150px">{{ __('lang.sex') }}</th>
                            <th class="min-w-150px">{{ __('lang.registration_confirmed') }}</th>
                            <th class="min-w-150px">{{ __('lang.photo') }}</th>
                            <th class="min-w-100px text-end">{{ __('lang.actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($admins as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->full_name }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->nationality }}</td>
                                <td>{{ $item->phone }}</td>
                                <td>{{ __('lang.' . $item->sex) }}</td>
                                <td class="text-center">
                                    <!-- Toggle Switch -->
                                    <div class="form-check form-switch">
                                        <input type="checkbox" class="form-check-input status-toggle"
                                            id="toggleStatus{{ $item->registration_confirmed }}"
                                            data-confirmed-id="{{ $item->id }}"
                                            {{ $item->registration_confirmed == '1' ? 'checked' : '' }}>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex justify-content-center">
                                        <div class="image-container">
                                            @if ($item->avatar)
                                                <a href="{{ asset("$avatar->url") }}" target="_blank">
                                                    <div class="symbol symbol-75px me-5">
                                                        <img src="{{ asset("$avatar->url") }}" alt="Photo">
                                                    </div>
                                                </a>
                                            @else
                                                <div class="symbol symbol-75px me-5">
                                                    <img src="{{ asset('default.png') }}" alt="Default Photo">
                                                </div>
                                            @endif
                                        </div>
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

                                        @include('pages/dashboards/admin/edit')

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

                            <a href="{{ $admins->previousPageUrl() }}" class="btn btn-outline-secondary">«
                                {{ __('lang.previous') }}</a>

                            @foreach ($admins->getUrlRange(max(1, $admins->currentPage() - 1), min($admins->lastPage(), $admins->currentPage() + 1)) as $page => $url)
                                <a href="{{ $url }}"
                                    class="btn btn-outline-secondary {{ $page == $admins->currentPage() ? 'active' : '' }}">{{ $page }}</a>
                            @endforeach

                            <a href="{{ $admins->nextPageUrl() }}" class="btn btn-outline-secondary">
                                {{ __('lang.next') }} »</a>


                            <div class="text-center">
                                <p class="text-sm text-gray-700 leading-5">
                                    {{ __('lang.showing') }}
                                    <span class="font-medium">{{ $admins->firstItem() }}</span>
                                    {{ __('lang.to') }}
                                    <span class="font-medium">{{ $admins->lastItem() }}</span>
                                    {{ __('lang.of') }}
                                    <span class="font-medium">{{ $admins->total() }}</span>
                                    {{ __('lang.results') }}
                                </p>
                            </div>

                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>


    @section('script')
        <script>
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
                            // $('#createFormForm')[0].reset();
                            // $('#createFormButton').prop('disabled', false);
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
                                url: 'users/' + deleteId,
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
                    const userId = $(this).data('confirmed-id');
                    const isChecked = $(this).prop('checked');
                    const confirmed = isChecked ? 1 : 0;

                    // Send an AJAX request to update the status
                    $.ajax({
                        url: '{{ route('update.admin.status') }}',
                        method: 'POST',
                        data: {
                            user_id: userId,
                            confirmed: confirmed,
                            _token: '{{ csrf_token() }}',
                        },
                        success: function(response) {
                            console.log(response);

                            Swal.fire({
                                title: 'Success!',
                                text: 'User updated successfully',
                                icon: 'success',
                            });
                        },
                        error: function(error) {
                            Swal.fire({
                                title: 'Error!',
                                text: 'Failed to update User',
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
