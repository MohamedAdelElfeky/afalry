<x-auth-layout>

    <form class="form w-100" novalidate="novalidate" id="kt_sign_in_form" data-kt-redirect-url="{{ route('dashboard') }}"
        action="login">
        @csrf
        <div class="text-center mb-11">
            <h1 class="text-dark fw-bolder mb-3">
                {{ __('lang.sign_in') }}
            </h1>

        </div>

        <div class="fv-row mb-8">
            <input type="text" placeholder="Email" name="email" autocomplete="off"
                class="form-control bg-transparent" value="demo@demo.com" />
        </div>

        <div class="fv-row mb-3">
            <input type="password" placeholder="Password" name="password" autocomplete="off"
                class="form-control bg-transparent" value="demo" />
        </div>

        <div class="d-flex flex-stack flex-wrap gap-3 fs-base fw-semibold mb-8">
            <div></div>

        </div>
       
        <div class="d-grid mb-10">
            <button type="submit" id="kt_sign_in_submit" class="btn btn-primary">
                @include('partials/general/_button-indicator', ['label' => 'تسجيل الدخول'])
            </button>
        </div>
      
        <div class="text-gray-500 text-center fw-semibold fs-6">
           
        </div>
    </form>

</x-auth-layout>
