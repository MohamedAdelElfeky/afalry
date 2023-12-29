<x-default-layout>

    <div class="card mb-5 mb-xl-8">
        <div class="card-header border-0 pt-5">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label fw-bold fs-3 mb-1">{{ __('lang.carts') }}</span>
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
                            <th class="min-w-150px">{{ __('lang.product') }}</th>
                            <th class="min-w-150px">{{ __('lang.count') }}</th>
                            <th class="min-w-150px">{{ __('lang.price') }}</th>
                            <th class="min-w-150px">{{ __('lang.total_amount') }}</th>
                            <th class="min-w-150px">{{ __('lang.created_at') }}</th>
                            <th class="min-w-100px text-end">{{ __('lang.actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($carts as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->user->full_name }}</td>
                                <td>{{ $item->product->name }}</td>
                                <td>{{ $item->quantity }}</td>
                                <td>{{ $item->price }}</td>
                                <td>{{ $item->price * $item->quantity }}</td>
                                <td>{{ $item->formattedCreatedAt() }}</td>

                                <td>
                                    <div class="d-flex justify-content-end flexpca-shrink-0">

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

                            <a href="{{ $carts->previousPageUrl() }}" class="btn btn-outline-secondary">«
                                {{ __('lang.previous') }}</a>

                            @foreach ($carts->getUrlRange(max(1, $carts->currentPage() - 1), min($carts->lastPage(), $carts->currentPage() + 1)) as $page => $url)
                                <a href="{{ $url }}"
                                    class="btn btn-outline-secondary {{ $page == $carts->currentPage() ? 'active' : '' }}">{{ $page }}</a>
                            @endforeach

                            <a href="{{ $carts->nextPageUrl() }}" class="btn btn-outline-secondary">
                                {{ __('lang.next') }} »</a>
                           

                            <div class="text-center">
                                <p class="text-sm text-gray-700 leading-5">
                                    {{ __('lang.showing') }}
                                    <span class="font-medium">{{ $carts->firstItem() }}</span>
                                    {{ __('lang.to') }}
                                    <span class="font-medium">{{ $carts->lastItem() }}</span>
                                    {{ __('lang.of') }}
                                    <span class="font-medium">{{ $carts->total() }}</span>
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
                                url: 'carts/' + deleteId,
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
        </script>
    @endsection
</x-default-layout>
