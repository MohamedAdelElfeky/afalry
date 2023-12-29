<x-default-layout>
    <div class="row g-5 g-xl-8">

        <div class="col-xl-3">
            <a href="{{ route('admins.index') }}" class="card bg-body hoverable card-xl-stretch mb-xl-8">
                <div class="card-body">
                    {!! getIcon('user-tick', 'text-primary fs-3x ms-n1 float-end') !!}
                    <div class="text-gray-900 fw-bold fs-2 mb-2 mt-5">5</div>
                    <div class="fw-semibold text-gray-400">{{ __('lang.admins') }}</div>
                </div>
            </a>
        </div>

        <div class="col-xl-3">
            <a href="{{ route('users.index') }}" class="card bg-dark hoverable card-xl-stretch mb-xl-8">
                <div class="card-body">
                    {!! getIcon('profile-circle', 'text-gray-100 fs-3x ms-n1 float-end') !!}
                    <div class="text-gray-100 fw-bold fs-2 mb-2 mt-5">6</div>
                    <div class="fw-semibold text-gray-100"> {{ __('lang.users') }}</div>
                </div>
            </a>
        </div>

        <div class="col-xl-3">
            <a href="{{ route('orders.index') }}" class="card bg-warning hoverable card-xl-stretch mb-xl-8">
                <div class="card-body">
                    {!! getIcon('basket-ok', 'text-white fs-3x ms-n1 float-end') !!}
                    <div class="text-white fw-bold fs-2 mb-2 mt-5">9</div>
                    <div class="fw-semibold text-white"> {{ __('lang.orders') }}</div>
                </div>
            </a>
        </div>

        <div class="col-xl-3">
            <a href="{{ route('offers.index') }}" class="card bg-info hoverable card-xl-stretch mb-5 mb-xl-8">
                <div class="card-body">
                    {!! getIcon('percentage', 'text-white fs-3x ms-n1 float-end') !!}
                    <div class="text-white fw-bold fs-2 mb-2 mt-5">3</div>
                    <div class="fw-semibold text-white"> {{ __('lang.offers') }} </div>
                </div>
            </a>
        </div>

    </div>

    <div class="row g-5 g-xl-8">

        <div class="col-xl-3">
            <a href="{{ route('complaints.index') }}" class="card bg-body hoverable card-xl-stretch mb-xl-8">
                <div class="card-body">
                    {!! getIcon('directbox-default', 'text-primary fs-3x ms-n1 float-end') !!}
                    <div class="text-gray-900 fw-bold fs-2 mb-2 mt-5">5</div>
                    <div class="fw-semibold text-gray-400">{{ __('lang.complaints') }}</div>
                </div>
            </a>
        </div>

        <div class="col-xl-3">
            <a href="{{ route('plans.index') }}" class="card bg-dark hoverable card-xl-stretch mb-xl-8">
                <div class="card-body">
                    {!! getIcon('office-bag', 'text-gray-100 fs-3x ms-n1 float-end') !!}
                    <div class="text-gray-100 fw-bold fs-2 mb-2 mt-5">6</div>
                    <div class="fw-semibold text-gray-100"> {{ __('lang.plans_subscribers') }}</div>
                </div>
            </a>
        </div>

        <div class="col-xl-3">
            <a href="{{ route('subscribers.index') }}" class="card bg-warning hoverable card-xl-stretch mb-xl-8">
                <div class="card-body">
                    {!! getIcon('diamonds', 'text-white fs-3x ms-n1 float-end') !!}
                    <div class="text-white fw-bold fs-2 mb-2 mt-5">9</div>
                    <div class="fw-semibold text-white"> {{ __('lang.subscribers') }}</div>
                </div>
            </a>
        </div>

        <div class="col-xl-3">
            <a href="{{ route('products.index') }}" class="card bg-info hoverable card-xl-stretch mb-5 mb-xl-8">
                <div class="card-body">
                    {!! getIcon('purchase', 'text-white fs-3x ms-n1 float-end') !!}
                    <div class="text-white fw-bold fs-2 mb-2 mt-5">3</div>
                    <div class="fw-semibold text-white"> {{ __('lang.products') }} </div>
                </div>
            </a>
        </div>

    </div>

    <div class="row g-5 g-xl-8">
        <div class="card card-flush h-xl-100">
            <!--begin::Header-->
            <div class="card-header py-5">
                <!--begin::Title-->
                <h3 class="card-title fw-bold text-gray-800">Monthly Targets</h3>
                <!--end::Title-->
                <!--begin::Toolbar-->
                <div class="card-toolbar">
                    <!--begin::Daterangepicker(defined in src/js/layout/app.js)-->
                    <div data-kt-daterangepicker="true" data-kt-daterangepicker-opens="left"
                        class="btn btn-sm btn-light d-flex align-items-center px-4">
                        <!--begin::Display range-->
                        <div class="text-gray-600 fw-bold">Loading date range...</div>
                        <!--end::Display range-->
                        {!! getIcon('calendar-8', 'fs-1 ms-2 me-0') !!}
                    </div>
                    <!--end::Daterangepicker-->
                </div>
                <!--end::Toolbar-->
            </div>
            <!--end::Header-->
            <!--begin::Card body-->
            <div class="card-body d-flex justify-content-between flex-column pb-0 px-0 pt-1">
                <!--begin::Items-->
                <div class="d-flex flex-wrap d-grid gap-5 px-9 mb-5">
                    <!--begin::Item-->
                    <div class="me-md-2">
                        <!--begin::Statistics-->
                        <div class="d-flex mb-2">
                            <span class="fs-4 fw-semibold text-gray-400 me-1">$</span>
                            <span class="fs-2hx fw-bold text-gray-800 me-2 lh-1 ls-n2">12,706</span>
                        </div>
                        <!--end::Statistics-->
                        <!--begin::Description-->
                        <span class="fs-6 fw-semibold text-gray-400">Targets for April</span>
                        <!--end::Description-->
                    </div>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <div
                        class="border-start-dashed border-end-dashed border-start border-end border-gray-300 px-5 ps-md-10 pe-md-7 me-md-5">
                        <!--begin::Statistics-->
                        <div class="d-flex mb-2">
                            <span class="fs-4 fw-semibold text-gray-400 me-1">$</span>
                            <span class="fs-2hx fw-bold text-gray-800 me-2 lh-1 ls-n2">8,035</span>
                        </div>
                        <!--end::Statistics-->
                        <!--begin::Description-->
                        <span class="fs-6 fw-semibold text-gray-400">Actual for April</span>
                        <!--end::Description-->
                    </div>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <div class="m-0">
                        <!--begin::Statistics-->
                        <div class="d-flex align-items-center mb-2">
                            <!--begin::Currency-->
                            <span class="fs-4 fw-semibold text-gray-400 align-self-start me-1">$</span>
                            <!--end::Currency-->
                            <!--begin::Value-->
                            <span class="fs-2hx fw-bold text-gray-800 me-2 lh-1 ls-n2">4,684</span>
                            <!--end::Value-->
                            <!--begin::Label-->
                            <span class="badge badge-light-success fs-base">{!! getIcon('black-up', 'fs-7 text-success ms-n1') !!} 4.5%</span>
                            <!--end::Label-->
                        </div>
                        <!--end::Statistics-->
                        <!--begin::Description-->
                        <span class="fs-6 fw-semibold text-gray-400">GAP</span>
                        <!--end::Description-->
                    </div>
                    <!--end::Item-->
                </div>
                <!--end::Items-->
                <!--begin::Chart-->
                <div id="kt_charts_widget_20" class="min-h-auto ps-4 pe-6" data-kt-chart-info="Revenue"
                    style="height: 300px"></div>
                <!--end::Chart-->
            </div>
            <!--end::Card body-->
        </div>
    </div>

    <div class="row g-5 g-xl-8 py-3" >
        <div class="card card-flush h-md-100">
            <!--begin::Header-->
            <div class="card-header py-7">
                <!--begin::Statistics-->
                <div class="m-0">
                    <!--begin::Heading-->
                    <div class="d-flex align-items-center mb-2">
                        <!--begin::Title-->
                        <span class="fs-2hx fw-bold text-gray-800 me-2 lh-1 ls-n2">0.37%</span>
                        <!--end::Title-->
                        <!--begin::Badge-->
                        <span class="badge badge-light-danger fs-base">{!! getIcon('arrow-up', 'fs-5 text-danger ms-n1') !!} 8.02%</span>
                        <!--end::Badge-->
                    </div>
                    <!--end::Heading-->
                    <!--begin::Description-->
                    <span class="fs-6 fw-semibold text-gray-400">Online store convertion rate</span>
                    <!--end::Description-->
                </div>
                <!--end::Statistics-->
                <!--begin::Toolbar-->
                <div class="card-toolbar">
                    <!--begin::Menu-->
                    <button class="btn btn-icon btn-color-gray-400 btn-active-color-primary justify-content-end" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end" data-kt-menu-overflow="true">{!! getIcon('dots-square', 'fs-1 text-gray-300 me-n1') !!}</button>
                    @include('partials/menus/_menu-2')
                    <!--end::Menu-->
                </div>
                <!--end::Toolbar-->
            </div>
            <!--end::Header-->
            <!--begin::Body-->
            <div class="card-body pt-0">
                <!--begin::Items-->
                <div class="mb-0">
                    <!--begin::Item-->
                    <div class="d-flex flex-stack">
                        <!--begin::Section-->
                        <div class="d-flex align-items-center me-5">
                            <!--begin::Symbol-->
                            <div class="symbol symbol-30px me-5">
                                <span class="symbol-label">{!! getIcon('magnifier', 'fs-3 text-gray-600') !!}</span>
                            </div>
                            <!--end::Symbol-->
                            <!--begin::Content-->
                            <div class="me-5">
                                <!--begin::Title-->
                                <a href="#" class="text-gray-800 fw-bold text-hover-primary fs-6">Search Retargeting</a>
                                <!--end::Title-->
                                <!--begin::Desc-->
                                <span class="text-gray-400 fw-semibold fs-7 d-block text-start ps-0">Direct link clicks</span>
                                <!--end::Desc-->
                            </div>
                            <!--end::Content-->
                        </div>
                        <!--end::Section-->
                        <!--begin::Wrapper-->
                        <div class="d-flex align-items-center">
                            <!--begin::Number-->
                            <span class="text-gray-800 fw-bold fs-6 me-3">0.24%</span>
                            <!--end::Number-->
                            <!--begin::Info-->
                            <div class="d-flex flex-center">
                                <!--begin::label-->
                                <span class="badge badge-light-success fs-base">{!! getIcon('arrow-up', 'fs-5 text-success ms-n1') !!} 2.4%</span>
                                <!--end::label-->
                            </div>
                            <!--end::Info-->
                        </div>
                        <!--end::Wrapper-->
                    </div>
                    <!--end::Item-->
                    <!--begin::Separator-->
                    <div class="separator separator-dashed my-3"></div>
                    <!--end::Separator-->
                    <!--begin::Item-->
                    <div class="d-flex flex-stack">
                        <!--begin::Section-->
                        <div class="d-flex align-items-center me-5">
                            <!--begin::Symbol-->
                            <div class="symbol symbol-30px me-5">
                                <span class="symbol-label">{!! getIcon('tiktok', 'fs-3 text-gray-600') !!}</span>
                            </div>
                            <!--end::Symbol-->
                            <!--begin::Content-->
                            <div class="me-5">
                                <!--begin::Title-->
                                <a href="#" class="text-gray-800 fw-bold text-hover-primary fs-6">Social Retargeting</a>
                                <!--end::Title-->
                                <!--begin::Desc-->
                                <span class="text-gray-400 fw-semibold fs-7 d-block text-start ps-0">Direct link clicks</span>
                                <!--end::Desc-->
                            </div>
                            <!--end::Content-->
                        </div>
                        <!--end::Section-->
                        <!--begin::Wrapper-->
                        <div class="d-flex align-items-center">
                            <!--begin::Number-->
                            <span class="text-gray-800 fw-bold fs-6 me-3">0.94%</span>
                            <!--end::Number-->
                            <!--begin::Info-->
                            <div class="d-flex flex-center">
                                <!--begin::label-->
                                <span class="badge badge-light-danger fs-base">{!! getIcon('arrow-down', 'fs-5 text-danger ms-n1') !!} 9.4%</span>
                                <!--end::label-->
                            </div>
                            <!--end::Info-->
                        </div>
                        <!--end::Wrapper-->
                    </div>
                    <!--end::Item-->
                    <!--begin::Separator-->
                    <div class="separator separator-dashed my-3"></div>
                    <!--end::Separator-->
                    <!--begin::Item-->
                    <div class="d-flex flex-stack">
                        <!--begin::Section-->
                        <div class="d-flex align-items-center me-5">
                            <!--begin::Symbol-->
                            <div class="symbol symbol-30px me-5">
                                <span class="symbol-label">{!! getIcon('sms', 'fs-3 text-gray-600') !!}</span>
                            </div>
                            <!--end::Symbol-->
                            <!--begin::Content-->
                            <div class="me-5">
                                <!--begin::Title-->
                                <a href="#" class="text-gray-800 fw-bold text-hover-primary fs-6">Email Retargeting</a>
                                <!--end::Title-->
                                <!--begin::Desc-->
                                <span class="text-gray-400 fw-semibold fs-7 d-block text-start ps-0">Direct link clicks</span>
                                <!--end::Desc-->
                            </div>
                            <!--end::Content-->
                        </div>
                        <!--end::Section-->
                        <!--begin::Wrapper-->
                        <div class="d-flex align-items-center">
                            <!--begin::Number-->
                            <span class="text-gray-800 fw-bold fs-6 me-3">1.23%</span>
                            <!--end::Number-->
                            <!--begin::Info-->
                            <div class="d-flex flex-center">
                                <!--begin::label-->
                                <span class="badge badge-light-success fs-base">{!! getIcon('arrow-up', 'fs-5 text-success ms-n1') !!} 0.2%</span>
                                <!--end::label-->
                            </div>
                            <!--end::Info-->
                        </div>
                        <!--end::Wrapper-->
                    </div>
                    <!--end::Item-->
                    <!--begin::Separator-->
                    <div class="separator separator-dashed my-3"></div>
                    <!--end::Separator-->
                    <!--begin::Item-->
                    <div class="d-flex flex-stack">
                        <!--begin::Section-->
                        <div class="d-flex align-items-center me-5">
                            <!--begin::Symbol-->
                            <div class="symbol symbol-30px me-5">
                                <span class="symbol-label">{!! getIcon('icon', 'fs-3 text-gray-600') !!}</span>
                            </div>
                            <!--end::Symbol-->
                            <!--begin::Content-->
                            <div class="me-5">
                                <!--begin::Title-->
                                <a href="#" class="text-gray-800 fw-bold text-hover-primary fs-6">Referrals Customers</a>
                                <!--end::Title-->
                                <!--begin::Desc-->
                                <span class="text-gray-400 fw-semibold fs-7 d-block text-start ps-0">Direct link clicks</span>
                                <!--end::Desc-->
                            </div>
                            <!--end::Content-->
                        </div>
                        <!--end::Section-->
                        <!--begin::Wrapper-->
                        <div class="d-flex align-items-center">
                            <!--begin::Number-->
                            <span class="text-gray-800 fw-bold fs-6 me-3">0.08%</span>
                            <!--end::Number-->
                            <!--begin::Info-->
                            <div class="d-flex flex-center">
                                <!--begin::label-->
                                <span class="badge badge-light-danger fs-base">{!! getIcon('arrow-down', 'fs-5 text-danger ms-n1') !!} 0.4%</span>
                                <!--end::label-->
                            </div>
                            <!--end::Info-->
                        </div>
                        <!--end::Wrapper-->
                    </div>
                    <!--end::Item-->
                    <!--begin::Separator-->
                    <div class="separator separator-dashed my-3"></div>
                    <!--end::Separator-->
                    <!--begin::Item-->
                    <div class="d-flex flex-stack">
                        <!--begin::Section-->
                        <div class="d-flex align-items-center me-5">
                            <!--begin::Symbol-->
                            <div class="symbol symbol-30px me-5">
                                <span class="symbol-label">{!! getIcon('abstract-25', 'fs-3 text-gray-600') !!}</span>
                            </div>
                            <!--end::Symbol-->
                            <!--begin::Content-->
                            <div class="me-5">
                                <!--begin::Title-->
                                <a href="#" class="text-gray-800 fw-bold text-hover-primary fs-6">Other</a>
                                <!--end::Title-->
                                <!--begin::Desc-->
                                <span class="text-gray-400 fw-semibold fs-7 d-block text-start ps-0">Direct link clicks</span>
                                <!--end::Desc-->
                            </div>
                            <!--end::Content-->
                        </div>
                        <!--end::Section-->
                        <!--begin::Wrapper-->
                        <div class="d-flex align-items-center">
                            <!--begin::Number-->
                            <span class="text-gray-800 fw-bold fs-6 me-3">0.46%</span>
                            <!--end::Number-->
                            <!--begin::Info-->
                            <div class="d-flex flex-center">
                                <!--begin::label-->
                                <span class="badge badge-light-success fs-base">{!! getIcon('arrow-up', 'fs-5 text-success ms-n1') !!} 8.3%</span>
                                <!--end::label-->
                            </div>
                            <!--end::Info-->
                        </div>
                        <!--end::Wrapper-->
                    </div>
                    <!--end::Item-->
                </div>
                <!--end::Items-->
            </div>
            <!--end::Body-->
        </div>
    </div>
</x-default-layout>
