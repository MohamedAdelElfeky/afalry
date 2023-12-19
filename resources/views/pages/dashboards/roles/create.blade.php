<x-default-layout>
    <form method="POST" action="{{ route('roles.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="row g-5 g-xl-10 mb-5 mb-xl-10">
            <div class="card border border-info">
                <div class="card-header">
                    <h5 class="card-title"> {{ __('lang.add') . ' ' . __('lang.roles') }} </h5>
                    <input style="margin-top: 25px;" class="form-check-input input-icheck  my-company-checkbox" type="checkbox"
                        id="select_all_my_company">
                </div>

                <div class="card-body">
                    <div class="col-md-8">
                        <label class="fs-6 fw-semibold mb-2"> {{ __('lang.name') }} </label>
                        <input type="text" class="form-control form-control-solid"
                            placeholder="{{ __('lang.name') }}" name="name" required />
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card border border-info">
                    <div class="card-header">
                        <h5 class="card-title"> {{ __('lang.my_companies') }} </h5>



                    </div>
                    <div class="card-body">
                        <div class="row g-5 g-xl-10 mb-5 mb-xl-10">
                            <div class="col-md-6">
                                <div class="form-check">
                                    <input class="form-check-input input-icheck my-company-checkbox" type="checkbox"
                                        name="permissions[]" id="add_my_company" value="add_my_company">
                                    <label class="form-check-label" for="add_my_company">
                                        {{ __('lang.add') }}
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-6">


                                <div class="form-check">
                                    <input class="form-check-input input-icheck my-company-checkbox" type="checkbox"
                                        name="permissions[]" id="update_my_company" value="update_my_company">
                                    <label class="form-check-label" for="update_my_company">
                                        {{ __('lang.update') }}
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-6">

                                <div class="form-check">
                                    <input class="form-check-input input-icheck my-company-checkbox" type="checkbox"
                                        name="permissions[]" id="delete_my_company" value="delete_my_company">
                                    <label class="form-check-label" for="delete_my_company">
                                        {{ __('lang.delete') }}
                                    </label>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-check">
                                    <input class="form-check-input input-icheck my-company-checkbox" type="checkbox"
                                        name="permissions[]" id="show_my_company" value="show_my_company">
                                    <label class="form-check-label" for="show_my_company">
                                        {{ __('lang.show') }}
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card border border-info">
                    <div class="card-header">
                        <h5 class="card-title"> {{ __('lang.export_companies') }} </h5>
                        {{-- <input style="margin-top: 25px;" class="form-check-input input-icheck  my-company-checkbox" type="checkbox"
                            name="permissions[]" id="select_all_my_company"> --}}
                    </div>
                    <div class="card-body">
                        <div class="row g-5 g-xl-10 mb-5 mb-xl-10">
                            <div class="col-md-6">
                                <div class="form-check">
                                    <input class="form-check-input input-icheck  my-company-checkbox" type="checkbox"
                                        name="permissions[]" id="add_export_company" value="add_export_company">
                                    <label class="form-check-label" for="add_export_company">
                                        {{ __('lang.add') }}
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-6">


                                <div class="form-check">
                                    <input class="form-check-input input-icheck  my-company-checkbox" type="checkbox"
                                        name="permissions[]" id="update_export_company" value="update_export_company">
                                    <label class="form-check-label" for="update_export_company">
                                        {{ __('lang.update') }}
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-6">

                                <div class="form-check">
                                    <input class="form-check-input input-icheck  my-company-checkbox" type="checkbox"
                                        name="permissions[]" id="delete_export_company" value="delete_export_company">
                                    <label class="form-check-label" for="delete_export_company">
                                        {{ __('lang.delete') }}
                                    </label>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-check">
                                    <input class="form-check-input input-icheck  my-company-checkbox" type="checkbox"
                                        name="permissions[]" id="show_export_company" value="show_export_company">
                                    <label class="form-check-label" for="show_export_company">
                                        {{ __('lang.show') }}
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card border border-info">
                    <div class="card-header">
                        <h5 class="card-title"> {{ __('lang.shipping_companies') }} </h5>
                    </div>
                    <div class="card-body">
                        <div class="row g-5 g-xl-10 mb-5 mb-xl-10">
                            <div class="col-md-6">
                                <div class="form-check">
                                    <input class="form-check-input input-icheck  my-company-checkbox" type="checkbox" name="permissions[]"
                                        id="add_shipping_company" value="add_shipping_company">
                                    <label class="form-check-label" for="add_shipping_company">
                                        {{ __('lang.add') }}
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-6">


                                <div class="form-check">
                                    <input class="form-check-input input-icheck  my-company-checkbox" type="checkbox" name="permissions[]"
                                        id="update_shipping_company" value="update_shipping_company">
                                    <label class="form-check-label" for="update_shipping_company">
                                        {{ __('lang.update') }}
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-6">

                                <div class="form-check">
                                    <input class="form-check-input input-icheck  my-company-checkbox" type="checkbox" name="permissions[]"
                                        id="delete_shipping_company" value="delete_shipping_company">
                                    <label class="form-check-label" for="delete_shipping_company">
                                        {{ __('lang.delete') }}
                                    </label>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-check">
                                    <input class="form-check-input input-icheck  my-company-checkbox" type="checkbox" name="permissions[]"
                                        id="show_shipping_company" value="show_shipping_company">
                                    <label class="form-check-label" for="show_shipping_company">
                                        {{ __('lang.show') }}
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card border border-info">
                    <div class="card-header">
                        <h5 class="card-title"> {{ __('lang.customer_clearance_companies') }} </h5>
                    </div>
                    <div class="card-body">
                        <div class="row g-5 g-xl-10 mb-5 mb-xl-10">
                            <div class="col-md-6">
                                <div class="form-check">
                                    <input class="form-check-input input-icheck  my-company-checkbox" type="checkbox" name="permissions[]"
                                        id="add_clearance_company" value="add_clearance_company">
                                    <label class="form-check-label" for="add_clearance_company">
                                        {{ __('lang.add') }}
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-6">


                                <div class="form-check">
                                    <input class="form-check-input input-icheck  my-company-checkbox" type="checkbox" name="permissions[]"
                                        id="update_clearance_company" value="update_clearance_company">
                                    <label class="form-check-label" for="update_clearance_company">
                                        {{ __('lang.update') }}
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-6">

                                <div class="form-check">
                                    <input class="form-check-input input-icheck  my-company-checkbox" type="checkbox" name="permissions[]"
                                        id="delete_clearance_company" value="delete_clearance_company">
                                    <label class="form-check-label" for="delete_clearance_company">
                                        {{ __('lang.delete') }}
                                    </label>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-check">
                                    <input class="form-check-input input-icheck  my-company-checkbox" type="checkbox" name="permissions[]"
                                        id="show_clearance_company" value="show_clearance_company">
                                    <label class="form-check-label" for="show_clearance_company">
                                        {{ __('lang.show') }}
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card border border-info">
                    <div class="card-header">
                        <h5 class="card-title"> {{ __('lang.import_companies') }} </h5>
                    </div>
                    <div class="card-body">
                        <div class="row g-5 g-xl-10 mb-5 mb-xl-10">
                            <div class="col-md-6">
                                <div class="form-check">
                                    <input class="form-check-input input-icheck  my-company-checkbox" type="checkbox" name="permissions[]"
                                        id="add_import_company" value="add_import_company">
                                    <label class="form-check-label" for="add_import_company">
                                        {{ __('lang.add') }}
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-check">
                                    <input class="form-check-input input-icheck  my-company-checkbox" type="checkbox" name="permissions[]"
                                        id="update_import_company" value="update_import_company">
                                    <label class="form-check-label" for="update_import_company">
                                        {{ __('lang.update') }}
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-6">

                                <div class="form-check">
                                    <input class="form-check-input input-icheck  my-company-checkbox" type="checkbox" name="permissions[]"
                                        id="delete_import_company" value="delete_import_company">
                                    <label class="form-check-label" for="delete_import_company">
                                        {{ __('lang.delete') }}
                                    </label>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-check">
                                    <input class="form-check-input input-icheck  my-company-checkbox" type="checkbox" name="permissions[]"
                                        id="show_import_company" value="show_import_company">
                                    <label class="form-check-label" for="show_import_company">
                                        {{ __('lang.show') }}
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card border border-info">
                    <div class="card-header">
                        <h5 class="card-title"> {{ __('lang.container_invoices') }} </h5>
                    </div>
                    <div class="card-body">
                        <div class="row g-5 g-xl-10 mb-5 mb-xl-10">
                            <div class="col-md-6">
                                <div class="form-check">
                                    <input class="form-check-input input-icheck  my-company-checkbox" type="checkbox" name="permissions[]"
                                        id="add_invoice_container" value="add_invoice_container">
                                    <label class="form-check-label" for="add_invoice_container">
                                        {{ __('lang.add') }}
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-6">


                                <div class="form-check">
                                    <input class="form-check-input input-icheck  my-company-checkbox" type="checkbox" name="permissions[]"
                                        id="update_invoice_container" value="update_invoice_container">
                                    <label class="form-check-label" for="update_invoice_container">
                                        {{ __('lang.update') }}
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-6">

                                <div class="form-check">
                                    <input class="form-check-input input-icheck  my-company-checkbox" type="checkbox" name="permissions[]"
                                        id="delete_invoice_container" value="delete_invoice_container">
                                    <label class="form-check-label" for="delete_invoice_container">
                                        {{ __('lang.delete') }}
                                    </label>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-check">
                                    <input class="form-check-input input-icheck  my-company-checkbox" type="checkbox" name="permissions[]"
                                        id="show_invoice_container" value="show_invoice_container">
                                    <label class="form-check-label" for="show_invoice_container">
                                        {{ __('lang.show') }}
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card border border-info">
                    <div class="card-header">
                        <h5 class="card-title"> {{ __('lang.shipping_invoices') }} </h5>
                    </div>
                    <div class="card-body">
                        <div class="row g-5 g-xl-10 mb-5 mb-xl-10">
                            <div class="col-md-6">
                                <div class="form-check">
                                    <input class="form-check-input input-icheck  my-company-checkbox" type="checkbox" name="permissions[]"
                                        id="add_invoice_shipping" value="add_invoice_shipping">
                                    <label class="form-check-label" for="add_invoice_shipping">
                                        {{ __('lang.add') }}
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-6">


                                <div class="form-check">
                                    <input class="form-check-input input-icheck  my-company-checkbox" type="checkbox" name="permissions[]"
                                        id="update_invoice_shipping" value="update_invoice_shipping">
                                    <label class="form-check-label" for="update_invoice_shipping">
                                        {{ __('lang.update') }}
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-6">

                                <div class="form-check">
                                    <input class="form-check-input input-icheck  my-company-checkbox" type="checkbox" name="permissions[]"
                                        id="delete_invoice_shipping" value="delete_invoice_shipping">
                                    <label class="form-check-label" for="delete_invoice_shipping">
                                        {{ __('lang.delete') }}
                                    </label>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-check">
                                    <input class="form-check-input input-icheck  my-company-checkbox" type="checkbox" name="permissions[]"
                                        id="show_invoice_shipping" value="show_invoice_shipping">
                                    <label class="form-check-label" for="show_invoice_shipping">
                                        {{ __('lang.show') }}
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card border border-info">
                    <div class="card-header">
                        <h5 class="card-title"> {{ __('lang.customer_clearance_invoices') }} </h5>
                    </div>
                    <div class="card-body">
                        <div class="row g-5 g-xl-10 mb-5 mb-xl-10">
                            <div class="col-md-6">
                                <div class="form-check">
                                    <input class="form-check-input input-icheck  my-company-checkbox" type="checkbox" name="permissions[]"
                                        id="add_invoice_clearance" value="add_invoice_clearance">
                                    <label class="form-check-label" for="add_invoice_clearance">
                                        {{ __('lang.add') }}
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-6">


                                <div class="form-check">
                                    <input class="form-check-input input-icheck  my-company-checkbox" type="checkbox" name="permissions[]"
                                        id="update_invoice_clearance" value="update_invoice_clearance">
                                    <label class="form-check-label" for="update_invoice_clearance">
                                        {{ __('lang.update') }}
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-6">

                                <div class="form-check">
                                    <input class="form-check-input input-icheck  my-company-checkbox" type="checkbox" name="permissions[]"
                                        id="delete_invoice_clearance" value="delete_invoice_clearance">
                                    <label class="form-check-label" for="delete_invoice_clearance">
                                        {{ __('lang.delete') }}
                                    </label>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-check">
                                    <input class="form-check-input input-icheck  my-company-checkbox" type="checkbox" name="permissions[]"
                                        id="show_invoice_clearance" value="show_invoice_clearance">
                                    <label class="form-check-label" for="show_invoice_clearance">
                                        {{ __('lang.show') }}
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card border border-info">
                    <div class="card-header">
                        <h5 class="card-title"> {{ __('lang.payments') }} </h5>
                    </div>
                    <div class="card-body">
                        <div class="row g-5 g-xl-10 mb-5 mb-xl-10">
                            <div class="col-md-6">
                                <div class="form-check">
                                    <input class="form-check-input input-icheck  my-company-checkbox" type="checkbox" name="permissions[]"
                                        id="add_payment" value="add_payment">
                                    <label class="form-check-label" for="add_payment">
                                        {{ __('lang.add') }}
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-6">


                                <div class="form-check">
                                    <input class="form-check-input input-icheck  my-company-checkbox" type="checkbox" name="permissions[]"
                                        id="update_payment" value="update_payment">
                                    <label class="form-check-label" for="update_payment">
                                        {{ __('lang.update') }}
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-6">

                                <div class="form-check">
                                    <input class="form-check-input input-icheck  my-company-checkbox" type="checkbox" name="permissions[]"
                                        id="delete_payment" value="delete_payment">
                                    <label class="form-check-label" for="delete_payment">
                                        {{ __('lang.delete') }}
                                    </label>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-check">
                                    <input class="form-check-input input-icheck  my-company-checkbox" type="checkbox" name="permissions[]"
                                        id="show_payment" value="show_payment">
                                    <label class="form-check-label" for="show_payment">
                                        {{ __('lang.show') }}
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card border border-info">
                    <div class="card-header">
                        <h5 class="card-title"> {{ __('lang.countries') }} </h5>
                    </div>
                    <div class="card-body">
                        <div class="row g-5 g-xl-10 mb-5 mb-xl-10">
                            <div class="col-md-6">
                                <div class="form-check">
                                    <input class="form-check-input input-icheck  my-company-checkbox" type="checkbox" name="permissions[]"
                                        id="add_country" value="add_country">
                                    <label class="form-check-label" for="add_country">
                                        {{ __('lang.add') }}
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-6">


                                <div class="form-check">
                                    <input class="form-check-input input-icheck  my-company-checkbox" type="checkbox" name="permissions[]"
                                        id="update_country" value="update_country">
                                    <label class="form-check-label" for="update_country">
                                        {{ __('lang.update') }}
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-6">

                                <div class="form-check">
                                    <input class="form-check-input input-icheck  my-company-checkbox" type="checkbox" name="permissions[]"
                                        id="delete_country" value="delete_country">
                                    <label class="form-check-label" for="delete_country">
                                        {{ __('lang.delete') }}
                                    </label>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-check">
                                    <input class="form-check-input input-icheck  my-company-checkbox" type="checkbox" name="permissions[]"
                                        id="show_country" value="show_country">
                                    <label class="form-check-label" for="show_country">
                                        {{ __('lang.show') }}
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card border border-info">
                    <div class="card-header">
                        <h5 class="card-title"> {{ __('lang.categories') }} </h5>
                    </div>
                    <div class="card-body">
                        <div class="row g-5 g-xl-10 mb-5 mb-xl-10">
                            <div class="col-md-6">
                                <div class="form-check">
                                    <input class="form-check-input input-icheck  my-company-checkbox" type="checkbox" name="permissions[]"
                                        id="add_category" value="add_category">
                                    <label class="form-check-label" for="add_category">
                                        {{ __('lang.add') }}
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-6">


                                <div class="form-check">
                                    <input class="form-check-input input-icheck  my-company-checkbox" type="checkbox" name="permissions[]"
                                        id="update_category" value="update_category">
                                    <label class="form-check-label" for="update_category">
                                        {{ __('lang.update') }}
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-6">

                                <div class="form-check">
                                    <input class="form-check-input input-icheck  my-company-checkbox" type="checkbox" name="permissions[]"
                                        id="delete_category" value="delete_category">
                                    <label class="form-check-label" for="delete_category">
                                        {{ __('lang.delete') }}
                                    </label>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-check">
                                    <input class="form-check-input input-icheck  my-company-checkbox" type="checkbox" name="permissions[]"
                                        id="show_category" value="show_category">
                                    <label class="form-check-label" for="show_category">
                                        {{ __('lang.show') }}
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card border border-info">
                    <div class="card-header">
                        <h5 class="card-title"> {{ __('lang.users') }} </h5>
                    </div>
                    <div class="card-body">
                        <div class="row g-5 g-xl-10 mb-5 mb-xl-10">
                            <div class="col-md-6">
                                <div class="form-check">
                                    <input class="form-check-input input-icheck  my-company-checkbox" type="checkbox" name="permissions[]"
                                        id="add_user" value="add_user">
                                    <label class="form-check-label" for="add_user">
                                        {{ __('lang.add') }}
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-6">


                                <div class="form-check">
                                    <input class="form-check-input input-icheck  my-company-checkbox" type="checkbox" name="permissions[]"
                                        id="update_user" value="update_user">
                                    <label class="form-check-label" for="update_user">
                                        {{ __('lang.update') }}
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-6">

                                <div class="form-check">
                                    <input class="form-check-input input-icheck  my-company-checkbox" type="checkbox" name="permissions[]"
                                        id="delete_user" value="delete_user">
                                    <label class="form-check-label" for="delete_user">
                                        {{ __('lang.delete') }}
                                    </label>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-check">
                                    <input class="form-check-input input-icheck  my-company-checkbox" type="checkbox" name="permissions[]"
                                        id="show_user" value="show_user">
                                    <label class="form-check-label" for="show_user">
                                        {{ __('lang.show') }}
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card border border-info">
                    <div class="card-header">
                        <h5 class="card-title"> {{ __('lang.roles') }} </h5>
                    </div>
                    <div class="card-body">
                        <div class="row g-5 g-xl-10 mb-5 mb-xl-10">
                            <div class="col-md-6">
                                <div class="form-check">
                                    <input class="form-check-input input-icheck  my-company-checkbox" type="checkbox" name="permissions[]"
                                        id="add_role" value="add_role">
                                    <label class="form-check-label" for="add_role">
                                        {{ __('lang.add') }}
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-6">


                                <div class="form-check">
                                    <input class="form-check-input input-icheck  my-company-checkbox" type="checkbox" name="permissions[]"
                                        id="update_role" value="update_role">
                                    <label class="form-check-label" for="update_role">
                                        {{ __('lang.update') }}
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-6">

                                <div class="form-check">
                                    <input class="form-check-input input-icheck  my-company-checkbox" type="checkbox" name="permissions[]"
                                        id="delete_role" value="delete_role">
                                    <label class="form-check-label" for="delete_role">
                                        {{ __('lang.delete') }}
                                    </label>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-check">
                                    <input class="form-check-input input-icheck  my-company-checkbox" type="checkbox" name="permissions[]"
                                        id="show_role" value="show_role">
                                    <label class="form-check-label" for="show_role">
                                        {{ __('lang.show') }}
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="card border border-info">
                    <div class="card-header">
                        <h5 class="card-title"> {{ __('lang.reports') }} </h5>
                    </div>
                    <div class="card-body">
                        <div class="row g-5 g-xl-10 mb-5 mb-xl-10">

                            <div class="col-md-3">
                                <div class="form-check">
                                    <input class="form-check-input input-icheck  my-company-checkbox" type="checkbox" name="permissions[]"
                                        id="report_country" value="report_country">
                                    <label class="form-check-label" for="report_country">
                                        {{ __('lang.report') }}
                                        {{ __('lang.countries') }}
                                    </label>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-check">
                                    <input class="form-check-input input-icheck  my-company-checkbox" type="checkbox" name="permissions[]"
                                        id="report_my_company" value="report_my_company">
                                    <label class="form-check-label" for="report_my_company">
                                        {{ __('lang.report') }}
                                        {{ __('lang.my_companies') }}
                                    </label>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-check">
                                    <input class="form-check-input input-icheck  my-company-checkbox" type="checkbox" name="permissions[]"
                                        id="report_export_invoices" value="report_export_invoices">
                                    <label class="form-check-label" for="report_export_invoices">
                                        {{ __('lang.report') }}
                                        {{ __('lang.export_invoices') }}
                                    </label>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-check">
                                    <input class="form-check-input input-icheck  my-company-checkbox" type="checkbox" name="permissions[]"
                                        id="report_import_invoices" value="report_import_invoices">
                                    <label class="form-check-label" for="report_import_invoices">
                                        {{ __('lang.report') }}
                                        {{ __('lang.import_invoices') }}
                                    </label>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-check">
                                    <input class="form-check-input input-icheck  my-company-checkbox" type="checkbox" name="permissions[]"
                                        id="report_shipping_invoices" value="report_shipping_invoices">
                                    <label class="form-check-label" for="report_shipping_invoices">
                                        {{ __('lang.report') }}
                                        {{ __('lang.shipping_invoices') }}
                                    </label>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-check">
                                    <input class="form-check-input input-icheck  my-company-checkbox" type="checkbox" name="permissions[]"
                                        id="report_clearance_invoices" value="report_clearance_invoices">
                                    <label class="form-check-label" for="report_clearance_invoices">
                                        {{ __('lang.report') }}
                                        {{ __('lang.customer_clearance_invoices') }}
                                    </label>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-check">
                                    <input class="form-check-input input-icheck  my-company-checkbox" type="checkbox" name="permissions[]"
                                        id="report_activity_log" value="report_activity_log">
                                    <label class="form-check-label" for="report_activity_log">
                                        {{ __('lang.report') }}
                                        {{ __('lang.activity_log') }}
                                    </label>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-check">
                                    <input class="form-check-input input-icheck  my-company-checkbox" type="checkbox" name="permissions[]"
                                        id="report_receive" value="report_receive">
                                    <label class="form-check-label" for="report_receive">
                                        {{ __('lang.report') }}
                                        {{ __('lang.receive') }}
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="card border border-info">
                    <div class="card-header">
                        <h5 class="card-title"> {{ __('lang.accounts') }} </h5>
                    </div>
                    <div class="card-body">
                        <div class="row g-5 g-xl-10 mb-5 mb-xl-10">

                            <div class="col-md-3">
                                <div class="form-check">
                                    <input class="form-check-input input-icheck  my-company-checkbox" type="checkbox" name="permissions[]"
                                        id="account_my_company" value="account_my_company">
                                    <label class="form-check-label" for="account_my_company">
                                        {{ __('lang.account') }}
                                        {{ __('lang.my_companies') }}
                                    </label>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-check">
                                    <input class="form-check-input input-icheck  my-company-checkbox" type="checkbox" name="permissions[]"
                                        id="account_export_invoices" value="account_export_invoices">
                                    <label class="form-check-label" for="account_export_invoices">
                                        {{ __('lang.account') }}
                                        {{ __('lang.export_invoices') }}
                                    </label>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-check">
                                    <input class="form-check-input input-icheck  my-company-checkbox" type="checkbox" name="permissions[]"
                                        id="account_import_invoices" value="account_import_invoices">
                                    <label class="form-check-label" for="account_import_invoices">
                                        {{ __('lang.account') }}
                                        {{ __('lang.import_invoices') }}
                                    </label>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-check">
                                    <input class="form-check-input input-icheck  my-company-checkbox" type="checkbox" name="permissions[]"
                                        id="account_shipping_invoices" value="account_shipping_invoices">
                                    <label class="form-check-label" for="account_shipping_invoices">
                                        {{ __('lang.account') }}
                                        {{ __('lang.shipping_invoices') }}
                                    </label>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-check">
                                    <input class="form-check-input input-icheck  my-company-checkbox" type="checkbox" name="permissions[]"
                                        id="account_clearance_invoices" value="account_clearance_invoices">
                                    <label class="form-check-label" for="account_clearance_invoices">
                                        {{ __('lang.account') }}
                                        {{ __('lang.customer_clearance_invoices') }}
                                    </label>
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
