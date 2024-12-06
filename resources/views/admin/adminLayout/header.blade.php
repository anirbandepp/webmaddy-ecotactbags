<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ecommerce</title>

    @include('admin.adminLayout.header-assets')

    <style>
        .error {
            /*border-color: #D84315;*/
            border-color: #ff3c00;
            color: #ff0000;
            box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
        }

        .form-control.is-invalid {
            border-color: #ff3c00;
            color: #ff0000;
            box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
        }

        .invalid-feedback {
            width: 100%;
            margin-top: .25rem;
            font-size: 80%;
            color: #e3342f;
        }
    </style>
</head>

<body class="navbar-top">

    <!-- Main navbar -->
    <div class="navbar navbar-inverse navbar-fixed-top">
        <div class="navbar-header">
            <a class="navbar-brand" href="index.html"><img src="{{ asset('assets/images/logo_light.png') }}"
                    alt=""></a>

            <ul class="nav navbar-nav pull-right visible-xs-block">
                <li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
                <li><a class="sidebar-mobile-main-toggle"><i class="icon-paragraph-justify3"></i></a></li>
            </ul>
        </div>

        <div class="navbar-collapse collapse" id="navbar-mobile">
            <ul class="nav navbar-nav">
                <li><a class="sidebar-control sidebar-main-toggle hidden-xs"><i class="icon-paragraph-justify3"></i></a>
                </li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
                <!--<li><a href="#">Text link</a></li>-->

                <!--<li>-->
                <!--	<a href="#">-->
                <!--		<i class="icon-cog3"></i>-->
                <!--		<span class="visible-xs-inline-block position-right">Icon link</span>-->
                <!--	</a>						-->
                <!--</li>-->

                <li class="dropdown dropdown-user">
                    <a class="dropdown-toggle" data-toggle="dropdown">
                        <img src="{{ asset('assets/images/image.png') }}" alt="">
                        <span>Admin</span>
                        <i class="caret"></i>
                    </a>

                    <ul class="dropdown-menu dropdown-menu-right">
                        <!--<li><a href="#"><i class="icon-user-plus"></i> My profile</a></li>-->
                        <!--<li><a href="#"><i class="icon-coins"></i> My balance</a></li>-->
                        <!--<li><a href="#"><span class="badge badge-warning pull-right">58</span> <i class="icon-comment-discussion"></i> Messages</a></li>-->
                        <!--<li class="divider"></li>-->
                        <!--<li><a href="#"><i class="icon-cog5"></i> Account settings</a></li>-->
                        <li><a href="javascript:void(0);"
                                onclick="event.preventDefault();
                         	document.getElementById('logout-form').submit();"><i
                                    class="icon-switch2"></i> Logout</a></li>
                        <form id="logout-form" action="{{ route('adminLogout') }}" method="POST"
                            style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
    <!-- /main navbar -->


    <!-- Page container -->
    <div class="page-container">

        <!-- Page content -->
        <div class="page-content">

            <!-- Main sidebar -->
            <div class="sidebar sidebar-main sidebar-fixed">
                <div class="sidebar-content">

                    <!-- Main navigation -->
                    <div class="sidebar-category sidebar-category-visible">
                        <div class="category-content no-padding">
                            <ul class="navigation navigation-main navigation-accordion">

                                <!-- Main -->
                                <li><a href="{{ route('adminDashboard') }}"><i class="icon-meter2"></i>
                                        <span>Dashboard</span></a></li>
                                @if (auth()->user()->role_id == 1)
                                    <li>
                                        <a href="#"><i class="icon-cart"></i> <span>Contact Us</span></a>
                                        <ul>
                                            <li><a href="{{ route('continents.index') }}">All Continents</a></li>
                                            <li><a href="{{ route('continents.create') }}">Add Continents</a></li>
                                            <li><a href="{{ route('branches.index') }}">All Branch</a></li>
                                            <li><a href="{{ route('branches.create') }}">Add Branch</a></li>

                                        </ul>
                                    </li>

                                    {{-- *** Distributors Master Routes *** --}}
                                    <li>
                                        <a href="#"><i class="icon-price-tags"></i>
                                            <span>Distributors</span>
                                        </a>
                                        <ul>
                                            <li>
                                                <a href="{{ route('distributer.distributerlist') }}">
                                                    All Distributors
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ route('distributer.createDistributor') }}">
                                                    Create Distributor
                                                </a>
                                            </li>
                                        </ul>
                                    </li>

                                    {{-- *** Coupon Master Routes *** --}}
                                    <li>
                                        <a href="#"><i class="icon-price-tags"></i>
                                            <span>Distributors Coupon</span>
                                        </a>
                                        <ul>
                                            <li><a href="{{ route('coupon.couponlist') }}">All Coupons</a></li>
                                            <li><a href="{{ route('coupon.createCoupon') }}">Create Coupon</a></li>
                                            <li>
                                                <a href="{{ route('coupon.autoGenerateCoupon') }}">
                                                    Auto Generate Coupon
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ route('distributer.assignCouponToDistributors') }}">
                                                    Assign Coupon to Distributors
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ route('distributer.listAllAssignCouponToDistributors') }}">
                                                    List All Assign Coupon to Distributors
                                                </a>
                                            </li>
                                        </ul>
                                    </li>


                                    <li>
                                        <a href="#"><i class="icon-price-tags"></i> <span>Products</span></a>
                                        <ul>
                                            <li><a href="{{ route('products.index') }}">All Products</a></li>
                                            <li><a href="{{ route('product-groups.index') }}">Group Products</a></li>
                                            <li><a href="{{ route('products.create') }}">Add New Product</a></li>
                                            <li><a href="{{ route('allCategories') }}">Product Categories</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="#"><i class="icon-cart"></i> <span>Orders</span></a>
                                        <ul>
                                            <li><a href="{{ route('orders.index', ['OrderStatus' => 'all']) }}">All
                                                    Orders</a></li>
                                            <li><a href="{{ route('orders.index', ['OrderStatus' => 'confirmed']) }}">Confirmed
                                                    Orders</a></li>
                                            <li><a href="{{ route('orders.index', ['OrderStatus' => 'delivered']) }}">Delivered
                                                    Orders</a></li>
                                            <li><a href="{{ route('orders.index', ['OrderStatus' => 'shipped']) }}">Shipped
                                                    Orders</a></li>
                                            <li><a href="{{ route('orders.index', ['OrderStatus' => 'pending']) }}">Pending
                                                    Orders</a></li>
                                            <li><a href="{{ route('orders.index', ['OrderStatus' => 'returned']) }}">Returned
                                                    Orders</a></li>
                                            <li><a href="{{ route('orders.index', ['OrderStatus' => 'cancelled']) }}">Cancelled
                                                    Orders</a></li>
                                            <li><a href="{{ route('orders.index', ['OrderStatus' => 'refunded']) }}">Refunded
                                                    Orders</a></li>
                                        </ul>
                                    </li>

                                    <li><a href="{{ route('customers-management.index') }}"><i class="icon-users2"></i>
                                            <span>Customers</span></a></li>
                                    <!--<li><a href="{{ route('ordersExports', ['OrderStatus' => 'all']) }}"><i class="icon-file-excel"></i> <span>Orders Excel</span></a></li>-->
                                    <!--<li>-->
                                    <!--	<a href="#"><i class="icon-megaphone"></i> <span>Promotions</span></a>-->
                                    <!--	<ul>-->
                                    <!--		{{-- <li><a href="#">All Promotions</a></li>-->
								<!--		<li><a href="#">Create Promotion</a></li> --}}-->
                                    <!--		<li><a href="{{ route('discounts.index', ['discountType' => 'coupon']) }}">Coupon Discounts</a></li>-->
                                    <!-- <li><a href="#">Tokens</a></li> -->
                                    <!--		<li><a href="{{ route('discounts.index', ['discountType' => 'cart']) }}">Cart Discounts</a></li>-->
                                    <!--	</ul>-->
                                    <!--</li>-->

                                    <!-- <li>
         <a href="#"><i class="icon-list3"></i> <span>CMS</span></a>
         <ul>
          <li><a href="#">Pages</a></li>
          <li><a href="#">Blogs</a></li>
          <li><a href="#">Blog Categories</a></li>
         </ul>
        </li> -->
                                    <li>
                                        <a href="#"><i class="icon-cog"></i> <span>Settings</span></a>
                                        <ul>
                                            <!--<li><a href="{{ route('allAttribute') }}">Attributes</a></li>-->
                                            {{-- <li><a href="{{(route('attributeValues'))}}">Attribute Sets</a></li> --}}
                                            <li><a href="{{ route('getSizes') }}">Manage Sizes</a></li>
                                            <!--<li><a href="{{ route('getTaxSlabs') }}">Taxes</a></li>-->
                                            <li><a href="{{ route('getDelivaryService') }}">Delivery Services</a></li>
                                            <!--<li><a href="{{ route('getShippingCharges') }}">Delivery Charges</a></li>-->
                                            <li><a href="{{ route('languages.index') }}">Languages</a></li>
                                        </ul>
                                    </li>
                                    {{-- <li><a href="#"><i class="icon-user"></i> <span>User Management</span></a></li>
								<li><a href="{{ route('config') }}"><i class="icon-wrench"></i> <span>Configuration</span></a></li> --}}
                                    <!-- /main -->


                                    {{-- <li class="navigation-header"><span>Mobile Application</span> <i class="icon-menu" title="" data-original-title="Forms"></i></li>

								<li><a href="#"><i class="icon-wrench"></i> <span>App Settings</span></a></li> --}}
                                    <li>
                                        <a href="#"><i class="icon-cog"></i> <span>About Us</span></a>
                                        <ul>
                                            <li><a href="{{ route('managements') }}">Managements</a></li>
                                            <li><a href="{{ route('workspaceImages') }}">Workspace</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="{{ route('creativeImageGet') }}"><i class="icon-wrench"></i>
                                            <span>Creative</span></a></li>
                                @endif
                                <li>
                                    <a href="#"><i class="icon-list3"></i> <span>Blogs</span></a>
                                    <ul>
                                        <li><a href="{{ route('blogs.index') }}">Blogs</a></li>
                                        <li><a href="{{ route('blogs.create') }}">Add Blog</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- /main navigation -->

                </div>
            </div>
            <!-- /main sidebar -->


            <!-- Main content -->
            <div class="content-wrapper">
