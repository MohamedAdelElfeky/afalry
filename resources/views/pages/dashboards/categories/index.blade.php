<x-default-layout>

    <div class="card mb-5 mb-xl-8">
        <div class="card-header border-0 pt-5">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label fw-bold fs-3 mb-1">
                    @if ($type == 'parent')
                        {{ __('lang.parent_categoies') }}
                    @elseif ($type == 'parent')
                        {{ __('lang.child_categories') }}
                    @endif
                </span>
            </h3>
            <div class="card-toolbar" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-trigger="hover"
                title="{{ __('lang.add_new_category') }}">
                <a class="btn btn-sm btn-light btn-active-primary m-1" data-bs-toggle="modal"
                    data-bs-target="#kt_modal_add">
                    <i class="ki-duotone ki-plus fs-2"></i></a>
            </div>
        </div>
        <div class="card-body py-3">

            {{-- <form action="{{ route('categories.index', ['type' => 'parent']) }}" method="GET" class="mb-4 pt-2">
                <div class="row pt-2">
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label for="name" class="form-label mb-3">{{ __('lang.name') }}</label>
                            <input type="text" name="name" id="name"
                                class="form-control form-control-lg form-control-solid" value="{{ request('name') }}">
                        </div>
                    </div>
                </div>

                <div class="row pt-2 text-center">
                    <div class="col-lg-12">
                        <button type="submit" class="btn btn-primary">{{ __('lang.filter') }}</button>
                    </div>
                </div>
            </form> --}}


            <div class="table-responsive">
                <table class="table table-row-dashed table-sm text-center gs-0 gy-4">
                    <thead>
                        <tr class="fw-bold text-muted">
                            <th class="min-w-25px">#</th>
                            <th class="min-w-150px">{{ __('lang.name') }}</th>
                            <th class="min-w-150px">{{ __('lang.description') }}</th>
                            @if ($type == 'parent')
                                <th class="min-w-150px">{{ __('lang.child_categories') }}</th>
                            @elseif ($type == 'child')
                                <th class="min-w-150px">{{ __('lang.main_category') }}</th>
                            @endif
                            <th class="min-w-150px">{{ __('lang.image') }}</th>
                            <th class="min-w-100px text-end">{{ __('lang.actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->description }}</td>

                                @if ($type == 'parent')
                                    <td>
                                        @if ($item->children->isNotEmpty())
                                            <a class="btn btn-icon btn-bg-light btn-color-primary"
                                                data-bs-toggle="modal"
                                                data-bs-target="#childItemsModal{{ $item->id }}">
                                                {!! getIcon('eye', 'fs-2') !!}
                                            </a>

                                            <!-- Modal -->
                                            <div class="modal fade" id="childItemsModal{{ $item->id }}"
                                                tabindex="-1"
                                                aria-labelledby="childItemsModalLabel{{ $item->id }}"
                                                aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title"
                                                                id="childItemsModalLabel{{ $item->id }}">
                                                                {{ __('lang.child_categories') . ' ' . $item->name }}
                                                            </h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <table
                                                                class="table table-row-dashed table-sm text-center gs-0 gy-4">
                                                                <thead class="fw-bold text-muted">
                                                                    <tr>
                                                                        <th>
                                                                            {{ __('lang.child_categories') }}
                                                                        </th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @foreach ($item->children as $child)
                                                                        <tr>
                                                                            <td>
                                                                                {{ $child->name }}
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
                                @elseif ($type == 'child')
                                    <td>{{ $item->parent ? $item->parent->name : ' ' }}</td>
                                @endif

                                <td>
                                    <div class="d-flex justify-content-center">
                                        <div class="image-container">
                                            @if ($item->images->isNotEmpty())
                                                @foreach ($item->images as $image)
                                                    <a href="{{ asset($image->url ?? 'default.png') }}"
                                                        target="_blank">
                                                        <div class="symbol symbol-75px me-5">
                                                            <img src="{{ asset($image->url ?? 'default.png') }}"
                                                                alt="Photo">
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
                                    <div class="d-flex justify-content-end flexpca-shrink-0">

                                        <a class="btn btn-icon btn-bg-light btn-color-warning btn-sm me-1"
                                            data-bs-toggle="modal" data-bs-target="#modal_edit{{ $item->id }}"
                                            data-edit-id="{{ $item->id }}">
                                            <i class="ki-duotone ki-pencil fs-2">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i>
                                        </a>

                                        @include('pages/dashboards/categories/edit')

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

                            <a href="{{ $categories->previousPageUrl() }}" class="btn btn-outline-secondary">«
                                {{ __('lang.previous') }}</a>

                            @foreach ($categories->getUrlRange(max(1, $categories->currentPage() - 1), min($categories->lastPage(), $categories->currentPage() + 1)) as $page => $url)
                                <a href="{{ $url }}"
                                    class="btn btn-outline-secondary {{ $page == $categories->currentPage() ? 'active' : '' }}">{{ $page }}</a>
                            @endforeach

                            <a href="{{ $categories->nextPageUrl() }}" class="btn btn-outline-secondary">
                                {{ __('lang.next') }} »</a>

                            <div class="text-center">
                                <p class="text-sm text-gray-700 leading-5">
                                    {{ __('lang.showing') }}
                                    <span class="font-medium">{{ $categories->firstItem() }}</span>
                                    {{ __('lang.to') }}
                                    <span class="font-medium">{{ $categories->lastItem() }}</span>
                                    {{ __('lang.of') }}
                                    <span class="font-medium">{{ $categories->total() }}</span>
                                    {{ __('lang.results') }}
                                </p>
                            </div>

                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    @include('pages/dashboards/categories/add')

    @section('script')
        <script>
            document.getElementById('applyFilters').addEventListener('click', function() {
                var nameFilter = document.getElementById('nameFilter').value;
                var descriptionFilter = document.getElementById('descriptionFilter').value;

                // Use AJAX to send filter parameters to the server and update the table
                // You may use a JavaScript framework or library like Axios or jQuery for this
                // Example using Fetch API:
                fetch(`showCategories/parent?name=${nameFilter}&description=${descriptionFilter}`, {
                        method: 'GET',
                    })
                    .then(response => response.json())
                    .then(data => {
                        // Update the table with the filtered data
                        // This may involve replacing the entire table or updating the rows
                    })
                    .catch(error => console.error('Error applying filters:', error));
            });
        </script>



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
                                url: 'categories/' + deleteId,
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
                // Add field button click event
                $("#addFieldButton").click(function() {
                    var newField = '<div class="input-group mb-3">' +
                        '<input type="text" name="name[]" class="form-control form-control-solid">' +
                        '<div class="input-group-prepend">' +
                        '<button type="button" class="btn btn-danger remove-button py-3">{{ __('lang.delete') }}</button>' +
                        '</div>' +
                        '</div>';

                    $("#name").append(newField);
                });
            });
        </script>
    @endsection
</x-default-layout>
