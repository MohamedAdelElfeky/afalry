<x-default-layout>

    <div class="card mb-5 mb-xl-8">
        <div class="card-header border-0 pt-5">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label fw-bold fs-3 mb-1">{{ __('lang.dealers') }}</span>
            </h3>
            <div class="card-toolbar" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-trigger="hover"
                title="Click to add a Family">
                <a href="{{ route('dealers.store') }}" class="btn btn-sm btn-light btn-active-primary">
                    <i class="ki-duotone ki-plus fs-2"></i>{{ __('lang.add_new_dealer') }}</a>
            </div>
        </div>
        <div class="card-body py-3">          
            <div class="table-responsive">
                <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4" id="categoryTable">
                    <thead>
                        <tr class="fw-bold text-muted">
                            <th class="min-w-25px">#</th>
                            <th class="min-w-150px">{{ __('lang.photo') }}</th>
                            <th class="min-w-150px">{{ __('lang.name') }}</th>
                            <th class="min-w-100px text-end">{{ __('lang.actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                      
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @include('pages/dashboards/categories/add')
    @section('script')
        <script>
            $(document).ready(function() {
                $('#createCategoryForm').submit(function(e) {
                    e.preventDefault();
                    $('#createCategoryButton').prop('disabled', true);
                    var formData = new FormData(this);
                    $.ajax({
                        url: $(this).attr('action'),
                        type: $(this).attr('method'),
                        data: formData,
                        processData: false,
                        contentType: false,
                        success: function(response) {
                            $('#kt_modal_categoey').modal('hide');
                            $("#categoryTable").load(location.href + " #categoryTable");
                            location.reload();
                            $('#createCategoryForm')[0].reset();
                            $('#createCategoryButton').prop('disabled', false);
                        },
                        error: function(xhr) {
                            console.log(xhr.responseText);
                            $('#createCategoryButton').prop('disabled', false);
                        }
                    });
                });
            });

            $(document).ready(function() {
                $('.editCategoryForm').submit(function(e) {
                    e.preventDefault();
                    $(this).find('button[type="submit"]').prop('disabled', true);
                    var categoryId = $(this).data('category-id');
                    var formData = new FormData(this);
                    $.ajax({
                        url: 'categories/' + categoryId,
                        type: 'POST',
                        data: formData,
                        processData: false,
                        contentType: false,
                        success: function(response) {
                            console.log(response);
                            $("#categoryTable").load(location.href + " #categoryTable");
                            location.reload();
                            $('#editCategoryModal' + categoryId).modal('hide');
                        },
                        error: function(xhr) {
                            console.log(xhr.responseText);

                            $('.editServiceForm').find('button[type="submit"]').prop('disabled',
                                false);
                        }
                    });
                });
            });

            $(document).ready(function() {
                $('.delete-btn').click(function() {
                    var userId = $(this).data('category-id');
                    var csrfToken = $('meta[name="csrf-token"]').attr('content');

                    Swal.fire({
                        icon: 'question',
                        title: 'Confirmation',
                        text: 'Are you sure you want to delete this Category?',
                        showCancelButton: true,
                        confirmButtonText: 'Yes',
                        cancelButtonText: 'No'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $.ajax({
                                url: 'categories/' + userId,
                                type: 'DELETE',
                                headers: {
                                    'X-CSRF-TOKEN': csrfToken
                                },
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
                                    alert('Error deleting user');
                                }
                            });
                        }
                    });
                });
            });
        </script>
    @endsection
</x-default-layout>
