<x-default-layout>
    <form method="POST" action="{{ route('roles.store') }}" enctype="multipart/form-data">
        @csrf

        <div class="row g-5 g-xl-10 mb-5 mb-xl-10">
            {{-- <div class="col-md-3 ">
            </div> --}}

            <div class="col-md-6">
                <div class="card border border-primary">
                    <div class="card-header">
                        <h5 class="card-title"> {{ __('lang.add') . ' ' . __('lang.roles') }} </h5>
                        <input style="margin-top: 25px;" class="form-check-input input-icheck  my-company-checkbox"
                            type="checkbox" id="select_all_my_company">
                    </div>

                    <div class="card-body">
                        <div class="col-md-8">
                            <label class="fs-6 fw-semibold mb-2"> {{ __('lang.name') }} </label>
                            <input type="text" class="form-control form-control-solid"
                                placeholder="{{ __('lang.name') }}" name="name" required />
                        </div>
                    </div>
                </div>
                <div class="col-md-6 ">
                </div>
            </div>

            <div class="row g-5 g-xl-10 mb-5 mb-xl-10">

                <div class="col-md-3">
                    <div class="card border border-warning">
                        <div class="card-header">
                            <h5 class="card-title"> {{ __('lang.type_payments') }} </h5>
                        </div>
                        <div class="card-body">
                            <div class="row g-5 g-xl-10 mb-5 mb-xl-10">
                                <div class="col-md-6">
                                    <div class="form-check">
                                        <input class="form-check-input input-icheck  my-company-checkbox"
                                            type="checkbox" name="permissions[]" id="add_payment" value="add_payment">
                                        <label class="form-check-label" for="add_payment">
                                            {{ __('lang.add') }}
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-check">
                                        <input class="form-check-input input-icheck  my-company-checkbox"
                                            type="checkbox" name="permissions[]" id="update_payment"
                                            value="update_payment">
                                        <label class="form-check-label" for="update_payment">
                                            {{ __('lang.update') }}
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-check">
                                        <input class="form-check-input input-icheck  my-company-checkbox"
                                            type="checkbox" name="permissions[]" id="delete_payment"
                                            value="delete_payment">
                                        <label class="form-check-label" for="delete_payment">
                                            {{ __('lang.delete') }}
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-check">
                                        <input class="form-check-input input-icheck  my-company-checkbox"
                                            type="checkbox" name="permissions[]" id="show_payment" value="show_payment">
                                        <label class="form-check-label" for="show_payment">
                                            {{ __('lang.show') }}
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card border border-warning">
                        <div class="card-header">
                            <h5 class="card-title"> {{ __('lang.statuses') }} </h5>
                        </div>
                        <div class="card-body">
                            <div class="row g-5 g-xl-10 mb-5 mb-xl-10">
                                <div class="col-md-6">
                                    <div class="form-check">
                                        <input class="form-check-input input-icheck  my-company-checkbox"
                                            type="checkbox" name="permissions[]" id="add_status" value="add_status">
                                        <label class="form-check-label" for="add_status">
                                            {{ __('lang.add') }}
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-check">
                                        <input class="form-check-input input-icheck  my-company-checkbox"
                                            type="checkbox" name="permissions[]" id="update_status"
                                            value="update_status">
                                        <label class="form-check-label" for="update_status">
                                            {{ __('lang.update') }}
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-check">
                                        <input class="form-check-input input-icheck  my-company-checkbox"
                                            type="checkbox" name="permissions[]" id="delete_status"
                                            value="delete_status">
                                        <label class="form-check-label" for="delete_status">
                                            {{ __('lang.delete') }}
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-check">
                                        <input class="form-check-input input-icheck  my-company-checkbox"
                                            type="checkbox" name="permissions[]" id="show_status"
                                            value="show_status">
                                        <label class="form-check-label" for="show_status">
                                            {{ __('lang.show') }}
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card border border-warning">
                        <div class="card-header">
                            <h5 class="card-title"> {{ __('lang.reasons') }} </h5>
                        </div>
                        <div class="card-body">
                            <div class="row g-5 g-xl-10 mb-5 mb-xl-10">
                                <div class="col-md-6">
                                    <div class="form-check">
                                        <input class="form-check-input input-icheck  my-company-checkbox"
                                            type="checkbox" name="permissions[]" id="add_reason" value="add_reason">
                                        <label class="form-check-label" for="add_reason">
                                            {{ __('lang.add') }}
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-check">
                                        <input class="form-check-input input-icheck  my-company-checkbox"
                                            type="checkbox" name="permissions[]" id="update_reason"
                                            value="update_reason">
                                        <label class="form-check-label" for="update_reason">
                                            {{ __('lang.update') }}
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-check">
                                        <input class="form-check-input input-icheck  my-company-checkbox"
                                            type="checkbox" name="permissions[]" id="delete_reason"
                                            value="delete_reason">
                                        <label class="form-check-label" for="delete_reason">
                                            {{ __('lang.delete') }}
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-check">
                                        <input class="form-check-input input-icheck  my-company-checkbox"
                                            type="checkbox" name="permissions[]" id="show_reason"
                                            value="show_reason">
                                        <label class="form-check-label" for="show_reason">
                                            {{ __('lang.show') }}
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card border border-warning">
                        <div class="card-header">
                            <h5 class="card-title"> {{ __('lang.questions') }} </h5>
                        </div>
                        <div class="card-body">
                            <div class="row g-5 g-xl-10 mb-5 mb-xl-10">
                                <div class="col-md-6">
                                    <div class="form-check">
                                        <input class="form-check-input input-icheck  my-company-checkbox"
                                            type="checkbox" name="permissions[]" id="add_question"
                                            value="add_question">
                                        <label class="form-check-label" for="add_question">
                                            {{ __('lang.add') }}
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-check">
                                        <input class="form-check-input input-icheck  my-company-checkbox"
                                            type="checkbox" name="permissions[]" id="update_question"
                                            value="update_question">
                                        <label class="form-check-label" for="update_question">
                                            {{ __('lang.update') }}
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-check">
                                        <input class="form-check-input input-icheck  my-company-checkbox"
                                            type="checkbox" name="permissions[]" id="delete_question"
                                            value="delete_question">
                                        <label class="form-check-label" for="delete_question">
                                            {{ __('lang.delete') }}
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-check">
                                        <input class="form-check-input input-icheck  my-company-checkbox"
                                            type="checkbox" name="permissions[]" id="show_question"
                                            value="show_question">
                                        <label class="form-check-label" for="show_question">
                                            {{ __('lang.show') }}
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card border border-warning">
                        <div class="card-header">
                            <h5 class="card-title"> {{ __('lang.plans') }} </h5>
                        </div>
                        <div class="card-body">
                            <div class="row g-5 g-xl-10 mb-5 mb-xl-10">
                                <div class="col-md-6">
                                    <div class="form-check">
                                        <input class="form-check-input input-icheck  my-company-checkbox"
                                            type="checkbox" name="permissions[]" id="add_plan" value="add_plan">
                                        <label class="form-check-label" for="add_plan">
                                            {{ __('lang.add') }}
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-check">
                                        <input class="form-check-input input-icheck  my-company-checkbox"
                                            type="checkbox" name="permissions[]" id="update_plan"
                                            value="update_plan">
                                        <label class="form-check-label" for="update_plan">
                                            {{ __('lang.update') }}
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-check">
                                        <input class="form-check-input input-icheck  my-company-checkbox"
                                            type="checkbox" name="permissions[]" id="delete_plan"
                                            value="delete_plan">
                                        <label class="form-check-label" for="delete_plan">
                                            {{ __('lang.delete') }}
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-check">
                                        <input class="form-check-input input-icheck  my-company-checkbox"
                                            type="checkbox" name="permissions[]" id="show_plan" value="show_plan">
                                        <label class="form-check-label" for="show_plan">
                                            {{ __('lang.show') }}
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card border border-warning">
                        <div class="card-header">
                            <h5 class="card-title"> {{ __('lang.complaints') }} </h5>
                        </div>
                        <div class="card-body">
                            <div class="row g-5 g-xl-10 mb-5 mb-xl-10">
                                <div class="col-md-6">
                                    <div class="form-check">
                                        <input class="form-check-input input-icheck  my-company-checkbox"
                                            type="checkbox" name="permissions[]" id="add_complaint"
                                            value="add_complaint">
                                        <label class="form-check-label" for="add_complaint">
                                            {{ __('lang.add') }}
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-check">
                                        <input class="form-check-input input-icheck  my-company-checkbox"
                                            type="checkbox" name="permissions[]" id="update_complaint"
                                            value="update_complaint">
                                        <label class="form-check-label" for="update_complaint">
                                            {{ __('lang.update') }}
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-check">
                                        <input class="form-check-input input-icheck  my-company-checkbox"
                                            type="checkbox" name="permissions[]" id="delete_complaint"
                                            value="delete_complaint">
                                        <label class="form-check-label" for="delete_complaint">
                                            {{ __('lang.delete') }}
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-check">
                                        <input class="form-check-input input-icheck  my-company-checkbox"
                                            type="checkbox" name="permissions[]" id="show_complaint"
                                            value="show_complaint">
                                        <label class="form-check-label" for="show_complaint">
                                            {{ __('lang.show') }}
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card border border-warning">
                        <div class="card-header">
                            <h5 class="card-title"> {{ __('lang.users') }} </h5>
                        </div>
                        <div class="card-body">
                            <div class="row g-5 g-xl-10 mb-5 mb-xl-10">
                                <div class="col-md-6">
                                    <div class="form-check">
                                        <input class="form-check-input input-icheck  my-company-checkbox"
                                            type="checkbox" name="permissions[]" id="add_user" value="add_user">
                                        <label class="form-check-label" for="add_user">
                                            {{ __('lang.add') }}
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-check">
                                        <input class="form-check-input input-icheck  my-company-checkbox"
                                            type="checkbox" name="permissions[]" id="update_user"
                                            value="update_user">
                                        <label class="form-check-label" for="update_user">
                                            {{ __('lang.update') }}
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-check">
                                        <input class="form-check-input input-icheck  my-company-checkbox"
                                            type="checkbox" name="permissions[]" id="delete_user"
                                            value="delete_user">
                                        <label class="form-check-label" for="delete_user">
                                            {{ __('lang.delete') }}
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-check">
                                        <input class="form-check-input input-icheck  my-company-checkbox"
                                            type="checkbox" name="permissions[]" id="show_user" value="show_user">
                                        <label class="form-check-label" for="show_user">
                                            {{ __('lang.show') }}
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card border border-warning">
                        <div class="card-header">
                            <h5 class="card-title"> {{ __('lang.roles') }} </h5>
                        </div>
                        <div class="card-body">
                            <div class="row g-5 g-xl-10 mb-5 mb-xl-10">
                                <div class="col-md-6">
                                    <div class="form-check">
                                        <input class="form-check-input input-icheck  my-company-checkbox"
                                            type="checkbox" name="permissions[]" id="add_role" value="add_role">
                                        <label class="form-check-label" for="add_role">
                                            {{ __('lang.add') }}
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-check">
                                        <input class="form-check-input input-icheck  my-company-checkbox"
                                            type="checkbox" name="permissions[]" id="update_role"
                                            value="update_role">
                                        <label class="form-check-label" for="update_role">
                                            {{ __('lang.update') }}
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-check">
                                        <input class="form-check-input input-icheck  my-company-checkbox"
                                            type="checkbox" name="permissions[]" id="delete_role"
                                            value="delete_role">
                                        <label class="form-check-label" for="delete_role">
                                            {{ __('lang.delete') }}
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-check">
                                        <input class="form-check-input input-icheck  my-company-checkbox"
                                            type="checkbox" name="permissions[]" id="show_role" value="show_role">
                                        <label class="form-check-label" for="show_role">
                                            {{ __('lang.show') }}
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card border border-warning">
                        <div class="card-header">
                            <h5 class="card-title"> {{ __('lang.carts') }} </h5>
                        </div>
                        <div class="card-body">
                            <div class="row g-5 g-xl-10 mb-5 mb-xl-10">
                                <div class="col-md-6">
                                    <div class="form-check">
                                        <input class="form-check-input input-icheck  my-company-checkbox"
                                            type="checkbox" name="permissions[]" id="add_cart" value="add_cart">
                                        <label class="form-check-label" for="add_cart">
                                            {{ __('lang.add') }}
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-check">
                                        <input class="form-check-input input-icheck  my-company-checkbox"
                                            type="checkbox" name="permissions[]" id="update_cart"
                                            value="update_cart">
                                        <label class="form-check-label" for="update_cart">
                                            {{ __('lang.update') }}
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-check">
                                        <input class="form-check-input input-icheck  my-company-checkbox"
                                            type="checkbox" name="permissions[]" id="delete_cart"
                                            value="delete_cart">
                                        <label class="form-check-label" for="delete_cart">
                                            {{ __('lang.delete') }}
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-check">
                                        <input class="form-check-input input-icheck  my-company-checkbox"
                                            type="checkbox" name="permissions[]" id="show_cart" value="show_cart">
                                        <label class="form-check-label" for="show_cart">
                                            {{ __('lang.show') }}
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card border border-warning">
                        <div class="card-header">
                            <h5 class="card-title"> {{ __('lang.cities') }} </h5>
                        </div>
                        <div class="card-body">
                            <div class="row g-5 g-xl-10 mb-5 mb-xl-10">
                                <div class="col-md-6">
                                    <div class="form-check">
                                        <input class="form-check-input input-icheck  my-company-checkbox"
                                            type="checkbox" name="permissions[]" id="add_city" value="add_city">
                                        <label class="form-check-label" for="add_city">
                                            {{ __('lang.add') }}
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-check">
                                        <input class="form-check-input input-icheck  my-company-checkbox"
                                            type="checkbox" name="permissions[]" id="update_city"
                                            value="update_city">
                                        <label class="form-check-label" for="update_city">
                                            {{ __('lang.update') }}
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-check">
                                        <input class="form-check-input input-icheck  my-company-checkbox"
                                            type="checkbox" name="permissions[]" id="delete_city"
                                            value="delete_city">
                                        <label class="form-check-label" for="delete_city">
                                            {{ __('lang.delete') }}
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-check">
                                        <input class="form-check-input input-icheck  my-company-checkbox"
                                            type="checkbox" name="permissions[]" id="show_city" value="show_city">
                                        <label class="form-check-label" for="show_city">
                                            {{ __('lang.show') }}
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card border border-warning">
                        <div class="card-header">
                            <h5 class="card-title"> {{ __('lang.dealers') }} </h5>
                        </div>
                        <div class="card-body">
                            <div class="row g-5 g-xl-10 mb-5 mb-xl-10">
                                <div class="col-md-6">
                                    <div class="form-check">
                                        <input class="form-check-input input-icheck  my-company-checkbox"
                                            type="checkbox" name="permissions[]" id="add_dealer" value="add_dealer">
                                        <label class="form-check-label" for="add_dealer">
                                            {{ __('lang.add') }}
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-check">
                                        <input class="form-check-input input-icheck  my-company-checkbox"
                                            type="checkbox" name="permissions[]" id="update_dealer"
                                            value="update_dealer">
                                        <label class="form-check-label" for="update_dealer">
                                            {{ __('lang.update') }}
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-check">
                                        <input class="form-check-input input-icheck  my-company-checkbox"
                                            type="checkbox" name="permissions[]" id="delete_dealer"
                                            value="delete_dealer">
                                        <label class="form-check-label" for="delete_dealer">
                                            {{ __('lang.delete') }}
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-check">
                                        <input class="form-check-input input-icheck  my-company-checkbox"
                                            type="checkbox" name="permissions[]" id="show_dealer"
                                            value="show_dealer">
                                        <label class="form-check-label" for="show_dealer">
                                            {{ __('lang.show') }}
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card border border-warning">
                        <div class="card-header">
                            <h5 class="card-title"> {{ __('lang.offers') }} </h5>
                        </div>
                        <div class="card-body">
                            <div class="row g-5 g-xl-10 mb-5 mb-xl-10">
                                <div class="col-md-6">
                                    <div class="form-check">
                                        <input class="form-check-input input-icheck  my-company-checkbox"
                                            type="checkbox" name="permissions[]" id="add_offers" value="add_offers">
                                        <label class="form-check-label" for="add_offers">
                                            {{ __('lang.add') }}
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-check">
                                        <input class="form-check-input input-icheck  my-company-checkbox"
                                            type="checkbox" name="permissions[]" id="update_offers"
                                            value="update_offers">
                                        <label class="form-check-label" for="update_offers">
                                            {{ __('lang.update') }}
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-check">
                                        <input class="form-check-input input-icheck  my-company-checkbox"
                                            type="checkbox" name="permissions[]" id="delete_offers"
                                            value="delete_offers">
                                        <label class="form-check-label" for="delete_offers">
                                            {{ __('lang.delete') }}
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-check">
                                        <input class="form-check-input input-icheck  my-company-checkbox"
                                            type="checkbox" name="permissions[]" id="show_offers"
                                            value="show_offers">
                                        <label class="form-check-label" for="show_offers">
                                            {{ __('lang.show') }}
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card border border-warning">
                        <div class="card-header">
                            <h5 class="card-title"> {{ __('lang.orders') }} </h5>
                        </div>
                        <div class="card-body">
                            <div class="row g-5 g-xl-10 mb-5 mb-xl-10">
                                <div class="col-md-6">
                                    <div class="form-check">
                                        <input class="form-check-input input-icheck  my-company-checkbox"
                                            type="checkbox" name="permissions[]" id="add_orders" value="add_orders">
                                        <label class="form-check-label" for="add_orders">
                                            {{ __('lang.add') }}
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-check">
                                        <input class="form-check-input input-icheck  my-company-checkbox"
                                            type="checkbox" name="permissions[]" id="update_orders"
                                            value="update_orders">
                                        <label class="form-check-label" for="update_orders">
                                            {{ __('lang.update') }}
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-check">
                                        <input class="form-check-input input-icheck  my-company-checkbox"
                                            type="checkbox" name="permissions[]" id="delete_orders"
                                            value="delete_orders">
                                        <label class="form-check-label" for="delete_orders">
                                            {{ __('lang.delete') }}
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-check">
                                        <input class="form-check-input input-icheck  my-company-checkbox"
                                            type="checkbox" name="permissions[]" id="show_orders"
                                            value="show_orders">
                                        <label class="form-check-label" for="show_orders">
                                            {{ __('lang.show') }}
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>





        </div>
        <div class="row text-center">
            <div class="col-md-12">
                <button type="submit" class="btn btn-primary ">{{ __('lang.add') }}</button>
            </div>
        </div>
    </form>
    @section('script')
        <script>
            $(document).ready(function() {
                // Handle "Select All" checkbox
                $("#select_all_my_company").change(function() {
                    $(".my-company-checkbox").prop('checked', $(this).prop('checked'));
                });

                // Handle individual checkboxes
                $(".my-company-checkbox").change(function() {
                    if (!$(this).prop("checked")) {
                        $("#select_all_my_company").prop("checked", false);
                    }
                });
            });
        </script>
    @endsection

</x-default-layout>
