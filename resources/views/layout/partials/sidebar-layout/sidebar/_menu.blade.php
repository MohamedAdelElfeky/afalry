<div class="app-sidebar-menu overflow-hidden flex-column-fluid">
    <div id="kt_app_sidebar_menu_wrapper" class="app-sidebar-wrapper hover-scroll-overlay-y my-5" data-kt-scroll="true"
        data-kt-scroll-activate="true" data-kt-scroll-height="auto"
        data-kt-scroll-dependencies="#kt_app_sidebar_logo, #kt_app_sidebar_footer"
        data-kt-scroll-wrappers="#kt_app_sidebar_menu" data-kt-scroll-offset="5px" data-kt-scroll-save-state="true">F
        <div class="menu menu-column menu-rounded menu-sub-indention px-3" id="#kt_app_sidebar_menu" data-kt-menu="true"
            data-kt-menu-expand="false">


            {{-- User Controller --}}
            <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                <span class="menu-link">
                    <span class="menu-icon">{!! getIcon('category', 'fs-2') !!}</span>
                    <span class="menu-title">{{ __('lang.categories') }}</span>
                    <span class="menu-arrow"></span>
                </span>

                <div class="menu-sub menu-sub-accordion">

                    <div class="menu-item">
                        <a class="menu-link" href="{{ route('categories.index', ['type' => 'parent']) }}">
                            <span class="menu-icon">{!! getIcon('scan-barcode', 'fs-2') !!}</span>
                            <span class="menu-title"> {{ __('lang.parent_categoies') }}</span>
                        </a>
                    </div>

                    <div class="menu-item">
                        <a class="menu-link" href="{{ route('categories.index', ['type' => 'child']) }}">
                            <span class="menu-icon">{!! getIcon('add-item', 'fs-2') !!}</span>
                            <span class="menu-title"> {{ __('lang.child_categories') }}</span>
                        </a>
                    </div>

                </div>
            </div>



            <div class="menu-item">
                <a class="menu-link" href="{{ route('products.index') }}">
                    <span class="menu-icon">{!! getIcon('purchase', 'fs-2') !!}</span>
                    <span class="menu-title"> {{ __('lang.products') }}</span>
                </a>
            </div>

            <div class="menu-item">
                <a class="menu-link" href="{{ route('dealers.index') }}">
                    <span class="menu-icon">{!! getIcon('shop', 'fs-2') !!}</span>
                    <span class="menu-title"> {{ __('lang.dealers') }}</span>
                </a>
            </div>

            <div class="menu-item">
                <a class="menu-link" href="{{ route('cities.index') }}">
                    <span class="menu-icon">{!! getIcon('geolocation-home', 'fs-2') !!}</span>
                    <span class="menu-title"> {{ __('lang.cities') }}</span>
                </a>
            </div>



            <div class="menu-item">
                <a class="menu-link" href="{{ route('offers.index') }}">
                    <span class="menu-icon">{!! getIcon('percentage', 'fs-2') !!}</span>
                    <span class="menu-title"> {{ __('lang.offers') }}</span>
                </a>
            </div>

            <div class="menu-item">
                <a class="menu-link" href="{{ route('carts.index') }}">
                    <span class="menu-icon">{!! getIcon('handcart', 'fs-2') !!}</span>
                    <span class="menu-title"> {{ __('lang.carts') }}</span>
                </a>
            </div>

            <div class="menu-item">
                <a class="menu-link" href="{{ route('orders.index') }}">
                    <span class="menu-icon">{!! getIcon('basket-ok', 'fs-2') !!}</span>
                    <span class="menu-title"> {{ __('lang.orders') }}</span>
                </a>
            </div>

            <div class="menu-item">
                <a class="menu-link" href="{{ route('complaints.index') }}">
                    <span class="menu-icon">{!! getIcon('directbox-default', 'fs-2') !!}</span>
                    <span class="menu-title"> {{ __('lang.complaints') }}</span>
                </a>
            </div>

            {{-- Plan And Subscriber Controller --}}
            <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                <span class="menu-link">
                    <span class="menu-icon">{!! getIcon('office-bag', 'fs-2') !!}</span>
                    <span class="menu-title">{{ __('lang.plans_subscribers') }}</span>
                    <span class="menu-arrow"></span>
                </span>

                <div class="menu-sub menu-sub-accordion">

                    <div class="menu-item">
                        <a class="menu-link" href="{{ route('plans.index') }}">
                            <span class="menu-icon">{!! getIcon('star', 'fs-2') !!}</span>
                            <span class="menu-title"> {{ __('lang.plans') }}</span>
                        </a>
                    </div>

                    <div class="menu-item">
                        <a class="menu-link" href="{{ route('subscribers.index') }}">
                            <span class="menu-icon">{!! getIcon('diamonds', 'fs-2') !!}</span>
                            <span class="menu-title"> {{ __('lang.subscribers') }}</span>
                        </a>
                    </div>

                </div>
            </div>


            {{-- User Controller --}}
            <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                <span class="menu-link">
                    <span class="menu-icon">{!! getIcon('people', 'fs-2') !!}</span>
                    <span class="menu-title">{{ __('lang.users') }}</span>
                    <span class="menu-arrow"></span>
                </span>

                <div class="menu-sub menu-sub-accordion">

                    <div class="menu-item">
                        <a class="menu-link" href="{{ route('admins.index') }}">
                            <span class="menu-bullet">
                                <span class="menu-icon">{!! getIcon('user-tick', 'fs-2') !!}</span>
                            </span>
                            <span class="menu-title">{{ __('lang.admins') }}</span>
                        </a>
                    </div>

                    <div class="menu-item">
                        <a class="menu-link" href="{{ route('users.index') }}">
                            <span class="menu-bullet">
                                <span class="menu-icon">{!! getIcon('profile-circle', 'fs-2') !!}</i></span>
                            </span>
                            <span class="menu-title">{{ __('lang.users') }}</span>
                        </a>
                    </div>

                    <div class="menu-item">
                        <a class="menu-link" href="{{ route('roles.index') }}">
                            <span class="menu-bullet">
                                <span class="menu-icon">{!! getIcon('security-user', 'fs-2') !!}</span>
                            </span>
                            <span class="menu-title">{{ __('lang.roles') }}</span>
                        </a>
                    </div>
                </div>
            </div>

            {{-- Setting Group --}}
            <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                <span class="menu-link">
                    <span class="menu-icon">{!! getIcon('setting', 'fs-2') !!}</span>
                    <span class="menu-title">{{ __('lang.settings') }}</span>
                    <span class="menu-arrow"></span>
                </span>

                <div class="menu-sub menu-sub-accordion">

                    <div class="menu-item">
                        <a class="menu-link" href="{{ route('statuses.index') }}">
                            <span class="menu-icon">{!! getIcon('flag', 'fs-2') !!}</span>
                            <span class="menu-title"> {{ __('lang.statuses') }}</span>
                        </a>
                    </div>

                    <div class="menu-item">
                        <a class="menu-link" href="{{ route('questions.index') }}">
                            <span class="menu-icon">{!! getIcon('question', 'fs-2') !!}</span>
                            <span class="menu-title"> {{ __('lang.questions') }}</span>
                        </a>
                    </div>

                    <div class="menu-item">
                        <a class="menu-link" href="{{ route('payments.index') }}">
                            <span class="menu-icon">{!! getIcon('dollar', 'fs-2') !!}</span>
                            <span class="menu-title"> {{ __('lang.type_payments') }}</span>
                        </a>
                    </div>

                    <div class="menu-item">
                        <a class="menu-link" href="{{ route('reasons.index') }}">
                            <span class="menu-icon">{!! getIcon('note-2', 'fs-2') !!}</span>
                            <span class="menu-title"> {{ __('lang.reasons') }}</span>
                        </a>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>
