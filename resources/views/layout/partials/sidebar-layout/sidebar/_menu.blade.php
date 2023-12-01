<div class="app-sidebar-menu overflow-hidden flex-column-fluid">
    <div id="kt_app_sidebar_menu_wrapper" class="app-sidebar-wrapper hover-scroll-overlay-y my-5" data-kt-scroll="true"
        data-kt-scroll-activate="true" data-kt-scroll-height="auto"
        data-kt-scroll-dependencies="#kt_app_sidebar_logo, #kt_app_sidebar_footer"
        data-kt-scroll-wrappers="#kt_app_sidebar_menu" data-kt-scroll-offset="5px" data-kt-scroll-save-state="true">
        <div class="menu menu-column menu-rounded menu-sub-indention px-3" id="#kt_app_sidebar_menu" data-kt-menu="true"
            data-kt-menu-expand="false">

            <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                <span class="menu-link">
                    <span class="menu-bullet">
                        <span class="menu-icon"><i class="fas fa-cog"></i></span>
                    </span>
                    <span class="menu-title">{{ __('lang.setting') }}</span>
                    <span class="menu-arrow"></span>
                </span>
                @if (auth()->user()->hasPermissionTo('show_country'))
                    <div class="menu-sub menu-sub-accordion">
                        <div class="menu-item">
                            <a class="menu-link" href="{{ url('countries') }}">
                                <span class="menu-bullet">
                                    <span class="menu-icon"><i class="fas fa-globe"></i></span>
                                </span>
                                <span class="menu-title">{{ __('lang.country') }} </span>
                            </a>
                        </div>
                @endif
                @if (auth()->user()->hasPermissionTo('show_category'))
                    <div class="menu-item">
                        <a class="menu-link" href="{{ url('categories') }}">
                            <span class="menu-bullet">
                                <span class="menu-icon"><i class="fas fa-list"></i></span>
                            </span>
                            <span class="menu-title">{{ __('lang.categories') }} </span>
                        </a>
                    </div>
                @endif

                <div class="menu-item">
                    <a class="menu-link" href="{{ url('users') }}">
                        <span class="menu-bullet">
                            <span class="menu-icon"><i class="fas fa-user"></i></span>
                        </span>
                        <span class="menu-title">{{ __('lang.users') }}</span>
                    </a>
                </div>

                <div class="menu-item">
                    <a class="menu-link" href="{{ route('roles.index') }}">
                        <span class="menu-bullet">
                            <span class="menu-icon"><i class="fas fa-shield"></i></span>
                        </span>
                        <span class="menu-title">{{ __('lang.roles') }}</span>
                    </a>
                </div>

                {{-- <div class="menu-item">
                        <a class="menu-link" href="{{ route('change.language', ['locale' => 'en']) }}">
                            <span class="menu-bullet">
                                <span class="menu-icon"><i class="fas fa-user"></i></span>
                            </span>
                            <span class="menu-title">{{ __('lang.العربية') }}</span>
                        </a>
                    </div>
                    <div class="menu-item">
                        <a class="menu-link" href="{{ route('change.language', ['locale' => 'ar']) }}">
                            <span class="menu-bullet">
                                <span class="menu-icon"><i class="fas fa-user"></i></span>
                            </span>
                            <span class="menu-title">{{ __('lang.English') }}</span>
                        </a>
                    </div> --}}
            </div>

        </div>

        <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
            <span class="menu-link">
                <span class="menu-bullet">
                    <span class="menu-icon"><i class="fas fa-building"></i></span>
                </span>
                <span class="menu-title">{{ __('lang.companies') }}</span>
                <span class="menu-arrow"></span>
            </span>

            <div class="menu-sub menu-sub-accordion">
                @if (auth()->user()->hasPermissionTo('show_my_company'))
                    <div class="menu-item">
                        <a class="menu-link" href="{{ url('company/all') }}">
                            <span class="menu-bullet">
                                <span class="menu-icon"><i class="fas fa-circle"></i></span>
                            </span>
                            <span class="menu-title">{{ __('lang.all_companies') }}</span>
                        </a>
                    </div>
                @endif
                @if (auth()->user()->hasPermissionTo('show_my_company'))
                    <div class="menu-item">
                        <div class="menu-item">
                            <a class="menu-link" href="{{ url('company/1') }}">
                                <span class="menu-bullet">
                                    <span class="menu-icon"><i class="fas fa-building"></i></span>
                                </span>
                                <span class="menu-title">{{ __('lang.my_companies') }}</span>
                            </a>
                        </div>

                    </div>
                @endif
                @if (auth()->user()->hasPermissionTo('show_export_company'))
                    <div class="menu-item">
                        <a class="menu-link" href="{{ url('company/2') }}">
                            <span class="menu-bullet">
                                <span class="menu-icon"><i class="fas fa-file-export"></i></span>
                            </span>
                            <span class="menu-title">{{ __('lang.export_companies') }}</span>
                        </a>
                    </div>
                @endif
                @if (auth()->user()->hasPermissionTo('show_import_company'))
                    <div class="menu-item">
                        <a class="menu-link" href="{{ url('company/3') }}">
                            <span class="menu-bullet">
                                <span class="menu-icon"><i class="fas fa-file-import"></i></span>
                            </span>
                            <span class="menu-title">{{ __('lang.import_companies') }}</span>
                        </a>
                    </div>
                @endif
                @if (auth()->user()->hasPermissionTo('show_shipping_company'))
                    <div class="menu-item">
                        <a class="menu-link" href="{{ url('company/5') }}">
                            <span class="menu-bullet">
                                <span class="menu-icon"><i class="fas fa-shipping-fast"></i></span>
                            </span>
                            <span class="menu-title">{{ __('lang.shipping_companies') }}</span>
                        </a>
                    </div>
                @endif
                @if (auth()->user()->hasPermissionTo('show_clearance_company'))
                    <div class="menu-item">
                        <a class="menu-link" href="{{ url('company/4') }}">
                            <span class="menu-bullet">
                                <span class="menu-icon"><i class="fas fa-user-check"></i></span>
                            </span>
                            <span class="menu-title">{{ __('lang.customer_clearance_companies') }}</span>
                        </a>
                    </div>
                @endif

            </div>
        </div>

        <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
            <span class="menu-link">
                <span class="menu-bullet">
                    <span class="menu-icon"><i class="fas fa-file-invoice"></i></span>
                </span>
                <span class="menu-title">{{ __('lang.invoices') }}</span>
                <span class="menu-arrow"></span>
            </span>

            <div class="menu-sub menu-sub-accordion">
                @if (auth()->user()->hasPermissionTo('show_invoice_container'))
                    <div class="menu-item">
                        <a class="menu-link" href="{{ route('invoiceContainers.index') }}">
                            <span class="menu-bullet">
                                <span class="menu-icon"><i class="fas fa-file-invoice"></i></span>
                            </span>
                            <span class="menu-title">{{ __('lang.container_invoices') }} </span>
                        </a>
                    </div>
                @endif
                @if (auth()->user()->hasPermissionTo('show_invoice_shipping'))
                    <div class="menu-item">
                        <a class="menu-link"
                            href="{{ route('shippingClearanceInvoices.index', ['type' => 'shipping']) }}">
                            <span class="menu-bullet">
                                <span class="menu-icon"><i class="fas fa-file-invoice"></i></span>
                            </span>
                            <span class="menu-title">{{ __('lang.shipping_invoices') }} </span>
                        </a>
                    </div>
                @endif
                @if (auth()->user()->hasPermissionTo('show_invoice_clearance'))
                    <div class="menu-sub menu-sub-accordion">
                        <div class="menu-item">
                            <a class="menu-link"
                                href="{{ route('shippingClearanceInvoices.index', ['type' => 'clearance']) }}">
                                <span class="menu-bullet">
                                    <span class="menu-icon"><i class="fas fa-file-invoice"></i></span>
                                </span>
                                <span class="menu-title">{{ __('lang.customer_clearance_invoices') }} </span>
                            </a>
                        </div>
                    </div>
                @endif

            </div>
        </div>

        <div data-kt-menu-trigger="click" class="menu-item menu-accordion">

            <span class="menu-link">
                <span class="menu-bullet">
                    <span class="menu-icon"><i class="fas fa-file-invoice"></i></span>
                </span>
                <span class="menu-title">{{ __('lang.reports') }}</span>
                <span class="menu-arrow"></span>
            </span>
            <div class="menu-sub menu-sub-accordion">

                @if (auth()->user()->hasPermissionTo('report_country'))
                    <div class="menu-item">
                        <a class="menu-link" href="{{ route('reports.companies.country') }}">
                            <span class="menu-bullet">
                                <span class="menu-icon"><i class="fas fa-file-invoice"></i></span>
                            </span>
                            <span class="menu-title">{{ __('lang.reports') . ' ' . __('lang.countries') }}
                            </span>
                        </a>
                    </div>
                @endif
                @if (auth()->user()->hasPermissionTo('report_my_company'))
                    <div class="menu-item">
                        <a class="menu-link" href="{{ route('reports.my.companies') }}">
                            <span class="menu-bullet">
                                <span class="menu-icon"><i class="fas fa-file-invoice"></i></span>
                            </span>
                            <span class="menu-title">{{ __('lang.reports') . ' ' . __('lang.my_companies') }}
                            </span>
                        </a>
                    </div>
                @endif
                @if (auth()->user()->hasPermissionTo('report_export_invoices'))
                    <div class="menu-item">
                        <a class="menu-link" href="{{ route('reports.companies', ['type' => '2']) }}">
                            <span class="menu-bullet">
                                <span class="menu-icon"><i class="fas fa-file-invoice"></i></span>
                            </span>
                            <span class="menu-title">{{ __('lang.reports') . ' ' . __('lang.export_invoices') }}
                            </span>
                        </a>
                    </div>
                @endif
                @if (auth()->user()->hasPermissionTo('report_import_invoices'))
                    <div class="menu-item">
                        <a class="menu-link" href="{{ route('reports.companies', ['type' => '3']) }}">
                            <span class="menu-bullet">
                                <span class="menu-icon"><i class="fas fa-file-invoice"></i></span>
                            </span>
                            <span class="menu-title">{{ __('lang.reports') . ' ' . __('lang.import_invoices') }}
                            </span>
                        </a>
                    </div>
                @endif
                @if (auth()->user()->hasPermissionTo('report_shipping_invoices'))
                    <div class="menu-item">
                        <a class="menu-link" href="{{ route('reports.sc.companies', ['type' => '5']) }}">
                            <span class="menu-bullet">
                                <span class="menu-icon"><i class="fas fa-file-invoice"></i></span>
                            </span>
                            <span class="menu-title">{{ __('lang.reports') . ' ' . __('lang.shipping_invoices') }}
                            </span>
                        </a>
                    </div>
                @endif
                @if (auth()->user()->hasPermissionTo('report_clearance_invoices'))
                    <div class="menu-sub menu-sub-accordion">
                        <div class="menu-item">
                            <a class="menu-link" href="{{ route('reports.sc.companies', ['type' => '4']) }}">
                                <span class="menu-bullet">
                                    <span class="menu-icon"><i class="fas fa-file-invoice"></i></span>
                                </span>
                                <span
                                    class="menu-title">{{ __('lang.reports') . ' ' . __('lang.customer_clearance_invoices') }}
                                </span>
                            </a>
                        </div>
                    </div>
                @endif
                @if (auth()->user()->hasPermissionTo('report_activity_log'))
                    <div class="menu-sub menu-sub-accordion">
                        <div class="menu-item">
                            <a class="menu-link" href="{{ route('reports.activity.log') }}">
                                <span class="menu-bullet">
                                    <span class="menu-icon"><i class="fas fa-file-invoice"></i></span>
                                </span>
                                <span class="menu-title">{{ __('lang.reports') . ' ' . __('lang.activity_log') }}
                                </span>
                            </a>
                        </div>
                    </div>
                @endif
                @if (auth()->user()->hasPermissionTo('report_receive'))
                    <div class="menu-sub menu-sub-accordion">
                        <div class="menu-item">
                            <a class="menu-link" href="{{ route('reports.receive') }}">
                                <span class="menu-bullet">
                                    <span class="menu-icon"><i class="fas fa-file-invoice"></i></span>
                                </span>
                                <span class="menu-title">{{ __('lang.reports') . ' ' . __('lang.receive') }}
                                </span>
                            </a>
                        </div>
                    </div>
                @endif
            </div>
        </div>

        <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
            <span class="menu-link">
                <span class="menu-bullet">
                    <span class="menu-icon"><i class="fas fa-file-invoice"></i></span>
                </span>
                <span class="menu-title">{{ __('lang.accounts') }}</span>
                <span class="menu-arrow"></span>
            </span>

            <div class="menu-sub menu-sub-accordion">
                @if (auth()->user()->hasPermissionTo('account_my_company'))
                    <div class="menu-item">
                        <a class="menu-link" href="{{ route('accounts.my.companies') }}">
                            <span class="menu-bullet">
                                <span class="menu-icon"><i class="fas fa-file-invoice"></i></span>
                            </span>
                            <span class="menu-title">{{ __('lang.accounts') . ' ' . __('lang.my_companies') }}
                            </span>
                        </a>
                    </div>
                @endif
                @if (auth()->user()->hasPermissionTo('account_export_invoices'))
                    <div class="menu-item">
                        <a class="menu-link" href="{{ route('accounts.companies', ['type' => '2']) }}">
                            <span class="menu-bullet">
                                <span class="menu-icon"><i class="fas fa-file-invoice"></i></span>
                            </span>
                            <span class="menu-title">{{ __('lang.accounts') . ' ' . __('lang.export_invoices') }}
                            </span>
                        </a>
                    </div>
                @endif
                @if (auth()->user()->hasPermissionTo('account_import_invoices'))
                    <div class="menu-item">
                        <a class="menu-link" href="{{ route('accounts.companies', ['type' => '3']) }}">
                            <span class="menu-bullet">
                                <span class="menu-icon"><i class="fas fa-file-invoice"></i></span>
                            </span>
                            <span class="menu-title">{{ __('lang.accounts') . ' ' . __('lang.import_invoices') }}
                            </span>
                        </a>
                    </div>
                @endif
                @if (auth()->user()->hasPermissionTo('account_shipping_invoices'))
                    <div class="menu-item">
                        <a class="menu-link" href="{{ route('accounts.companies.sc', ['type' => '5']) }}">
                            <span class="menu-bullet">
                                <span class="menu-icon"><i class="fas fa-file-invoice"></i></span>
                            </span>
                            <span class="menu-title">{{ __('lang.accounts') . ' ' . __('lang.shipping_invoices') }}
                            </span>
                        </a>
                    </div>
                @endif
                @if (auth()->user()->hasPermissionTo('account_clearance_invoices'))
                    <div class="menu-item">
                        <div class="menu-item">
                            <a class="menu-link" href="{{ route('accounts.companies.sc', ['type' => '4']) }}">
                                <span class="menu-bullet">
                                    <span class="menu-icon"><i class="fas fa-file-invoice"></i></span>
                                </span>
                                <span
                                    class="menu-title">{{ __('lang.accounts') . ' ' . __('lang.customer_clearance_invoices') }}
                                </span>
                            </a>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
</div>
