<x-default-layout>
    <style type="text/css">
        .image-container {
            width: 150px;
            /* Adjust the width as needed */
            overflow-x: scroll;
            white-space: nowrap;
        }
    </style>
    <div class="card mb-5 mb-xl-8">
        <div class="card-header border-0 pt-5">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label fw-bold fs-3 mb-1">{{ __('lang.products') }}</span>
            </h3>
            <div class="card-toolbar" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-trigger="hover">
                <form id="createSyncForm" action="{{ route('products.sync.store') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-sm btn-light btn-active-primary m-1">
                        <i class="fas fa-sync"></i>{{ __('lang.create_new_product_sync') }}
                    </button>
                </form>
                <a class="btn btn-sm btn-light btn-active-primary m-1" data-bs-toggle="modal"
                    data-bs-target="#kt_modal_add">
                    <i class="ki-duotone ki-plus fs-2"></i>{{ __('lang.create_new_product') }}</a>
            </div>
        </div>

        <div class="card-body py-3">
        </div>

        <div class="card-body py-3">
            <div class="table-responsive">
                <table class="table table-row-dashed table-sm text-center gs-0 gy-4">
                    <thead>
                        <tr class="fw-bold text-muted">
                            <th class="min-w-25px">#</th>
                            <th class="min-w-150px">{{ __('lang.name') }}</th>
                            <th class="min-w-150px">{{ __('lang.description') }}</th>
                            <th class="min-w-150px">{{ __('lang.price') }}</th>
                            <th class="min-w-150px">{{ __('lang.balance') }}</th>
                            <th class="min-w-150px">{{ __('lang.type_discount') }}</th>
                            <th class="min-w-150px">{{ __('lang.discount') }}</th>
                            <th class="min-w-150px">{{ __('lang.category') }}</th>
                            <th class="min-w-70px">{{ __('lang.status') }}</th>
                            <th class="min-w-150px">{{ __('lang.plans') }}</th>
                            <th class="min-w-150px">{{ __('lang.photo') }}</th>
                            <th class="min-w-150px">{{ __('lang.product_attributes') }}</th>
                            <th class="min-w-100px text-end">{{ __('lang.actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->description }}</td>
                                <td>{{ $item->price }}</td>
                                <td>{{ $item->balance }}</td>
                                <td>
                                    @if ($item->type_discount)
                                        {{ __('lang.' . $item->type_discount) }}
                                    @endif
                                </td>

                                <td>{{ $item->discount }}</td>

                                <td>
                                    @if ($item->category)
                                        <a class="btn btn-icon btn-bg-light btn-color-primary w-md-100px"
                                            href="{{ route('categories.show', ['category' => $item->category->id]) }}">
                                            {{ $item->category->name }}
                                        </a>
                                    @else
                                        <span class="btn btn-icon btn-danger btn-sm me-1">
                                            {!! getIcon('tablet-delete', 'fs-2') !!}
                                        </span>
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
                                    @if (!empty($item->plans))
                                        @foreach ($item->plans as $planId)
                                            @php
                                                $plan = \App\Models\Plan::find($planId);
                                            @endphp

                                            @if ($plan)
                                                <a class="btn btn-icon btn-bg-light btn-color-primary w-md-100px"
                                                    href="{{ route('plans.show', ['plan' => $plan->id]) }}">{{ $plan->name }}</a>
                                                <br>
                                            @else
                                                {{ __('lang.unknown_plan') }} <br>
                                            @endif
                                        @endforeach
                                    @else
                                        <span class="btn btn-icon btn-danger btn-sm me-1">
                                            {!! getIcon('tablet-delete', 'fs-2') !!}
                                        </span>
                                    @endif
                                </td>

                                <td>
                                    <div class="d-flex justify-content-center">
                                        <div class="image-container">
                                            @if ($item->images->isNotEmpty())
                                                @foreach ($item->images as $image)
                                                    <a href="{{ asset("$image->url") }}" target="_blank">
                                                        <div class="symbol symbol-75px me-5">
                                                            <img src="{{ asset("$image->url") }}" alt="Photo">
                                                        </div>
                                                    </a>
                                                @endforeach
                                            @else
                                                <div class="symbol symbol-75px me-5">
                                                    <img src="{{ asset('default.png') }}" alt="Default Photo">
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </td>

                                <td>
                                    @if ($item->productAttributes->isNotEmpty())
                                        <a class="btn btn-icon btn-bg-light btn-color-primary" data-bs-toggle="modal"
                                            data-bs-target="#attributesModal{{ $item->id }}">
                                            {!! getIcon('eye', 'fs-2') !!}
                                        </a>

                                        <!-- Modal -->
                                        <div class="modal fade" id="attributesModal{{ $item->id }}" tabindex="-1"
                                            aria-labelledby="attributesModalLabel{{ $item->id }}"
                                            aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title"
                                                            id="attributesModalLabel{{ $item->id }}">
                                                            {{ __('lang.product_attributes') }}
                                                        </h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">

                                                        <table
                                                            class="table table-row-dashed table-sm text-center gs-0 gy-4">
                                                            <thead class="fw-bold text-muted">
                                                                <tr>
                                                                    <th>
                                                                        {{ __('lang.attribute') }}
                                                                    </th>
                                                                    <th>
                                                                        {{ __('lang.value') }}
                                                                    </th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach ($item->productAttributes as $attribute)
                                                                    <tr>
                                                                        <td>
                                                                            {{ $attribute->attribute }}
                                                                        </td>
                                                                        <td>
                                                                            {{ $attribute->value }}
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">{{ __('lang.close') }}</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                        <span class="btn btn-icon btn-danger btn-sm me-1">
                                            {!! getIcon('tablet-delete', 'fs-2') !!}
                                        </span>
                                    @endif
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

                                        @include('pages/dashboards/products/edit')

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

                            {{-- <a href="{{ $products->url(1) }}" class="btn btn-outline-secondary">First</a> --}}
                            <a href="{{ $products->previousPageUrl() }}" class="btn btn-outline-secondary">«
                                {{ __('lang.previous') }}</a>

                            @foreach ($products->getUrlRange(max(1, $products->currentPage() - 1), min($products->lastPage(), $products->currentPage() + 1)) as $page => $url)
                                <a href="{{ $url }}"
                                    class="btn btn-outline-secondary {{ $page == $products->currentPage() ? 'active' : '' }}">{{ $page }}</a>
                            @endforeach


                            <a href="{{ $products->nextPageUrl() }}" class="btn btn-outline-secondary">
                                {{ __('lang.next') }} »</a>
                            {{-- <a href="{{ $products->url($products->lastPage()) }}"
                                class="btn btn-outline-secondary">Last</a> --}}

                            <div class="text-center">
                                <p class="text-sm text-gray-700 leading-5">
                                    {{ __('lang.showing') }}
                                    <span class="font-medium">{{ $products->firstItem() }}</span>
                                    {{ __('lang.to') }}
                                    <span class="font-medium">{{ $products->lastItem() }}</span>
                                    {{ __('lang.of') }}
                                    <span class="font-medium">{{ $products->total() }}</span>
                                    {{ __('lang.results') }}
                                </p>
                            </div>

                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    @include('pages/dashboards/products/add')

    @section('script')
        <script>
            $(document).ready(function() {
                $('#createSyncForm').submit(function(e) {
                    e.preventDefault();
                    var formData = new FormData(this);

                    $.ajax({
                        url: $(this).attr('action'),
                        type: 'POST',
                        data: formData,
                        processData: false,
                        contentType: false,
                        success: function(response) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Success',
                                text: response.message,
                                showConfirmButton: false,
                                timer: 1500
                            }).then(function() {
                                location.reload();
                            });
                        },
                        error: function(xhr) {
                            console.log(xhr.responseText);
                            var errorMessage =
                                "An error occurred. Please try again.";

                            if (xhr.responseJSON && xhr.responseJSON.message) {
                                errorMessage = xhr.responseJSON.message;
                            }

                            Swal.fire({
                                title: 'Error',
                                text: xhr.responseJSON.message,
                                icon: 'error'
                            });
                        }
                    });
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
                                url: 'products/' + deleteId,
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
                    const productId = $(this).data('product-id');
                    const isChecked = $(this).prop('checked');
                    const status = isChecked ? 'active' : 'inactive';

                    // Send an AJAX request to update the status
                    $.ajax({
                        url: '{{ route('update.product.status') }}',
                        method: 'POST',
                        data: {
                            product_id: productId,
                            status: status,
                            _token: '{{ csrf_token() }}',
                        },
                        success: function(response) {
                            console.log(response);

                            Swal.fire({
                                title: 'Success!',
                                text: 'Product updated successfully',
                                icon: 'success',
                            });
                        },
                        error: function(error) {
                            Swal.fire({
                                title: 'Error!',
                                text: 'Failed to update Product',
                                icon: 'error',
                            });
                            console.error(error);
                        },
                    });
                });
            });

            //  add Row In add product
            $(document).ready(function() {
                $("#addFieldButton").click(function() {
                    var newRow = $("#productAttributes table tbody tr:last").clone();
                    newRow.find('input').val('');
                    $("#productAttributes table tbody").append(newRow);
                });
                $("#productAttributes").on("click", ".remove-button", function() {
                    var rowCount = $("#productAttributes table tbody tr").length;
                    if (rowCount > 1) {
                        $(this).closest("tr").remove();
                    }
                });
            });

            $(document).ready(function() {
                // Add Row
                $('[data-edit-code]').on('click', function() {
                    var editCode = $(this).data('edit-code');
                    var newRow = '<tr>' +
                        '<td><input type="text" name="product_attribute[]" class="form-control form-control-solid py-3"></td>' +
                        '<td><input type="text" name="product_value[]" class="form-control form-control-solid py-3"></td>' +
                        '<td><button type="button" class="btn btn-danger remove-button py-3"><i class="bi bi-trash fs-2"></i></button></td>' +
                        '</tr>';

                    $('#productAttributes_' + editCode + ' tbody').append(newRow);
                });

                // Remove Row
                $(document).on('click', '.remove-button', function() {
                    $(this).closest('tr').remove();
                });
            });
        </script>
    @endsection
</x-default-layout>
