@php
    use App\Libraries\Helpers;
@endphp

<div class="left side-menu">
    <button type="button" class="button-menu-mobile button-menu-mobile-topbar open-left">
        <i class="mdi mdi-close fw-700"></i>
    </button>

    <div class="topbar-left mt-3">
        <div class="text-center">
            <a href="#" class="logo"><img src="{{ asset('/assets/images/mercury.png') }}" height="50" alt="logo"></a>
            <h4 class="font-weight-bold text-dark">{{ env('APP_NAME') }}</h4>
        </div>
    </div>
   
    <div class="sidebar-inner slimscrollleft" id="sidebar-main">
        <div id="sidebar-menu">
            <ul>
                <li class="menu-title">Main Menu</li>

                <li>
                    <a href="#" class="text-dark {{ isset($nav_dashboard) ? $nav_dashboard : '' }}">
                        <i class="mdi mdi-home"></i><span> Dashboard </span> 
                        <span class="badge badge-pill badge-warning float-right">NEW!</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('management.product_item.index') }}" class="text-dark {{ isset($nav_product_item) ? $nav_product_item : '' }}"><i class="mdi mdi-account-circle"></i><span> Product Item </span></a>
                </li>
            </ul>
        </div>
        <div class="clearfix"></div>
    </div>
</div>