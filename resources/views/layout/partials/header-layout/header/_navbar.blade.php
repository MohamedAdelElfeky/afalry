<!--begin::Navbar-->
<div class="app-navbar flex-shrink-0">
  
    <div class="app-navbar-item ms-1 ms-md-3">
        <div class="btn btn-icon btn-custom btn-icon-muted btn-active-light btn-active-color-primary w-30px h-30px w-md-40px h-md-40px"
            data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-attach="parent"
            data-kt-menu-placement="bottom-end">{!! getIcon('element-11', 'fs-2 fs-md-1') !!}</div>
        @include('partials/menus/_my-apps-menu')
    </div>
   
    <div class="app-navbar-item ms-1 ms-md-3">
        @include('partials/theme-mode/_main')
    </div>
   
    <div class="app-navbar-item ms-1 ms-md-3" id="kt_header_user_menu_toggle">

        <a class="menu-link px-5" href="{{ route('logout') }}"
            onclick="event.preventDefault();
			 document.getElementById('logout-form').submit();">
            <span data-bs-toggle="tooltip" data-bs-placement="top" title="Power Off">
                <i class="bi bi-power fs-2"></i>
            </span>
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </div>
 
    <div class="app-navbar-item d-lg-none ms-2 me-n3" title="Show header menu">
        <div class="btn btn-icon btn-active-color-primary w-30px h-30px w-md-35px h-md-35px"
            id="kt_app_header_menu_toggle">{!! getIcon('text-align-left', 'fs-2 fs-md-1') !!}</div>
    </div>
</div>
