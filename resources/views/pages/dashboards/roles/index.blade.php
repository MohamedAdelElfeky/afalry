<x-default-layout>
    <div class="row g-5 g-xl-10 mb-5 mb-xl-10">
        <div class="card mb-5 mb-xl-8">
            <div class="card-header border-0 pt-5">
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label fw-bold fs-3 mb-1"> {{ __('lang.roles') }} </span>
                </h3>
                <div class="card-toolbar" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-trigger="hover">
                    <a href="{{ route('roles.create') }}" class="btn btn-sm btn-light btn-active-primary" >
                        <i class="ki-duotone ki-plus fs-2"></i>{{ __('lang.add') }}</a>
                </div>
            </div>
            <div class="card-body py-3">
                <div class="table-responsive text-center">
                    <table class="table table-bordered text-center table-sm" id="dataTable">
                        <thead class="bg-light-primary">
                            <th class="text-center">{{ __('lang.name') }} </th>
                            <th class="text-center">{{ __('lang.actions') }} </th>
                        </thead>
                        <tbody>
                            @foreach ($roles  as $item)
                            <tr>
                                <td>
                                    {{$item->name}}
                                </td>
                                <td>
                                    <a href="{{ route('roles.create', $item->id) }}"
                                        class="btn btn-icon btn-bg-light btn-color-warning btn-sm me-1">
                                        <i class="ki-duotone ki-pencil fs-2">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                        </i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @section('script')
        <script>
            $(document).ready(function() {
                $('#roleForm').submit(function(e) {
                    e.preventDefault();
                    var formData = new FormData(this);
                    $('.error-message').text('');
                    $.ajax({
                        type: 'POST',
                        url: "{{ route('roles.store') }}",
                        data: formData,
                        contentType: false,
                        processData: false,
                        success: function(response) {
                            if (response.success) {
                                Swal.fire({
                                    icon: 'success',
                                    text: response.success,
                                    showConfirmButton: false,
                                    timer: 1500
                                }).then(function() {
                                    // Reload the page
                                    location.reload();
                                });
                            } else if (response.errors) {
                                // Clear previous error messages for fields that are not in the response
                                $('.error-message').not(':empty').text('');
                                // Display validation errors below each field
                                for (var error in response.errors) {
                                    var field = $('[name="' + error + '"]');
                                    field.siblings('.error-message').text(response.errors[error][
                                        0
                                    ]);
                                }
                            } else {
                                $('#invoiceResult').html(
                                    '<div class="alert alert-danger">An error occurred. Please try again.</div>'
                                );
                            }
                        },
                        error: function(xhr, status, error) {
                            $('#invoiceResult').html(
                                '<div class="alert alert-danger">An error occurred. Please try again.</div>'
                            );
                        }
                    });
                });
            });
        </script>
    @endsection

</x-default-layout>
