<div class="app-sidebar-menu overflow-hidden flex-column-fluid">
    <div id="kt_app_sidebar_menu_wrapper" class="app-sidebar-wrapper hover-scroll-overlay-y my-5" data-kt-scroll="true"
        data-kt-scroll-activate="true" data-kt-scroll-height="auto"
        data-kt-scroll-dependencies="#kt_app_sidebar_logo, #kt_app_sidebar_footer"
        data-kt-scroll-wrappers="#kt_app_sidebar_menu" data-kt-scroll-offset="5px" data-kt-scroll-save-state="true">
        <div class="menu menu-column menu-rounded menu-sub-indention px-3" id="#kt_app_sidebar_menu" data-kt-menu="true"
            data-kt-menu-expand="false">
            
            <div class="menu-item">
                <a class="menu-link" href="{{ route('categories.index') }}">
                    <span class="menu-bullet">
                        <span class="menu-icon">{!! getIcon('element-11', 'fs-2') !!}</span>
                    </span>
                    <span class="menu-title"> {{ __('lang.categories') }}</span>
                </a>
            </div>

            <div class="menu-item">
                <a class="menu-link" href="{{ route('products.index') }}">
                    <span class="menu-bullet">
                        <span class="menu-icon">{!! getIcon('element-11', 'fs-2') !!}</span>
                    </span>
                    <span class="menu-title"> {{ __('lang.products') }}</span>
                </a>
            </div>

            <div class="menu-item">
                <a class="menu-link" href="{{ route('dealers.index') }}">
                    <span class="menu-bullet">
                        <span class="menu-icon">{!! getIcon('element-11', 'fs-2') !!}</span>
                    </span>
                    <span class="menu-title"> {{ __('lang.dealers') }}</span>
                </a>
            </div>

            <div class="menu-item">
                <a class="menu-link" href="{{ route('cities.index') }}">
                    <span class="menu-bullet">
                        <span class="menu-icon">{!! getIcon('element-11', 'fs-2') !!}</span>
                    </span>
                    <span class="menu-title"> {{ __('lang.cities') }}</span>
                </a>
            </div>

            <div class="menu-item">
                <a class="menu-link" href="{{ route('statuses.index') }}">
                    <span class="menu-bullet">
                        <span class="menu-icon">{!! getIcon('element-11', 'fs-2') !!}</span>
                    </span>
                    <span class="menu-title"> {{ __('lang.statuses') }}</span>
                </a>
            </div>

            <div class="menu-item">
                <a class="menu-link" href="{{ route('plans.index') }}">
                    <span class="menu-bullet">
                        <span class="menu-icon">{!! getIcon('element-11', 'fs-2') !!}</span>
                    </span>
                    <span class="menu-title"> {{ __('lang.plans') }}</span>
                </a>
            </div>
            
            <div class="menu-item">
                <a class="menu-link" href="{{ route('offers.index') }}">
                    <span class="menu-bullet">
                        <span class="menu-icon">{!! getIcon('element-11', 'fs-2') !!}</span>
                    </span>
                    <span class="menu-title"> {{ __('lang.offers') }}</span>
                </a>
            </div>
        </div>
    </div>
</div>
