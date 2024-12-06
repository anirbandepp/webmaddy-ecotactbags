<?php

use Illuminate\Http\Request;
use App\Http\Controllers\Admin\CouponMasterController;
use App\Http\Controllers\Admin\DistributerController;

Route::get('server-check', function (Request $request) {
    $ip = $request->ip();
    $ip_response = json_decode(file_get_contents('https://pro.ip-api.com/json/' . $ip . '?key=L6J8j8tIixQdQ80'));
    return ($ip_response->countryCode);
});

Route::domain('packfreshfood.ecotactbags.com')->group(function () {
    Route::get('/', function () {
        return view('new_landing');
    })->name('new-landing')->middleware('setLanguage');

    //Route::view('/test','new_landing')->name('new-landing')->middleware('setLanguage');
});

Route::get('hash', function () {
    // return \Hash::make('Blog#$2023@Bags&Ecotact$');
    // return \Hash::make('Bags@2023Ecotact$@#');
});

Route::get('paise', function () {
    $latest = \App\Order::latest()->first();
    return 'OL' . Carbon::today()->format('Ym') . ($latest->order_no + 1);
    $order = \App\Order::where('id', 54)->first();
    $str = $order->carier_response;
    $pos1 = strpos($str, "Invoice_");
    $nwstr = substr($str, $pos1 + 8);
    return str_replace(".pdf\"}", "", $nwstr);
});

Route::get('/marketingleadsenglish', 'HomeController@marketingleadsenglish')->name('marketingleadsenglish');

Route::get('/thankYou', function () {
    return view('landing.thankyou');
})->name('thankyou');
Route::post('landing/Page/Post', 'HomeController@landingPagePost')->name('landingPagePost');

// Authentication Routes...
Route::group(['middleware' => ['guest']], function () {
    Route::get('/admin-login', 'Auth\AdminLoginController@showLoginForm')->name('adminLogin');
    Route::post('/admin-login', 'Auth\AdminLoginController@login');
    // Route::get('/account/login', 'Auth\LoginController@showLoginForm')->name('login');
    // Route::post('/account/login', 'Auth\LoginController@login');

    Route::post('/send-otp-login', 'AuthController@sendOtpLogin')->name('sendLoginOtp');
    Route::post('/post-login', 'AuthController@postLogin')->name('sendLoginOtpPost');
    Route::post('/send-otp-register', 'AuthController@sendOtpRegister')->name('sendRegisterOtp');
    Route::post('/post-register', 'AuthController@postRegister')->name('sendRegisterPostOtp');
});

/* Auth Common Routes */
Route::group(['middleware' => ['auth']], function () {
    /* Logout Page */
    Route::post('admin/logout', 'Auth\AdminLoginController@logout')->name('adminLogout');
    Route::get('user/logout', 'AuthController@logout')->name('userLogout');
    /* Change Password Page */
    Route::post('/post-change-pwd', 'HomeController@changePassword')->name('changePassword');
});

Route::namespace('Admin')->prefix('admin-modules')->middleware(['auth', 'role:Admin;Blog User'])->group(function () {
    /* Dashboard */
    Route::get('/dashboard', 'AdminController@adminDashboard')->name('adminDashboard');

    //Admin Routes 	
    Route::middleware(['role:Admin'])->group(function () {
        // SwarnadeepUserController
        Route::view('export', 'admin.export.export');
        Route::get('user/export', 'UserController@userExportExcel')->name('userExportExcel');
        // Swarnadeep
        Route::resource('continents', 'ContinentController');
        Route::resource('branches', 'BranchController');
        // End Swarnadeep
        // End Swarnadeep
        /* Settings */
        Route::prefix('settings')->group(function () {
            //Attributes
            Route::get('attributes/{attribute?}', 'SettingController@allAttribute')->name('allAttribute');
            Route::post('post/attribute/{attribute?}', 'SettingController@postAttribute')->name('postAttribute');

            Route::group(['prefix' => 'attribute/{attributeId}/', 'middleware' => 'setAttribute'], function () {
                //Attribute Values
                Route::get('values/{attributeValue?}', 'SettingController@attributeValues')->name('attributeValues');
                Route::post('post/value/{attributeValue?}', 'SettingController@postAttributeValue')->name('postAttributeValue');
            });

            //Taxes
            Route::get('tax-slabs/{taxSlab?}', 'SettingController@getTaxSlabs')->name('getTaxSlabs');
            Route::post('post/tax-slab/{taxSlab?}', 'SettingController@postTaxSlabs')->name('postTaxSlabs');

            //Delivary services
            Route::get('delivery/services/{deliveryService?}', 'SettingController@getDelivaryService')->name('getDelivaryService');
            Route::post('post/delivery/services/{deliveryService?}', 'SettingController@postDelivaryService')->name('postDelivaryService');

            //Sizes
            Route::get('sizes/{size?}', 'SettingController@getSizes')->name('getSizes');
            Route::post('post/size/{size?}', 'SettingController@postSizes')->name('postSize');

            //Categories
            Route::get('categories/{category?}', 'SettingController@getCategory')->name('allCategories');
            Route::post('post/category/{category?}', 'SettingController@postCategory')->name('postCategory');

            //Shipping Charges
            Route::get('shipping-charges/{ShippingCharge?}', 'SettingController@getShippingCharges')->name('getShippingCharges');
            Route::post('post/shipping-charges/{ShippingCharge?}', 'SettingController@postShippingCharge')->name('postShippingCharge');
        });
        /* User management */
        /* Swarnadeep*/
        Route::post('customers-management/{customer}/create-discount/{discount?}', 'UserController@createDiscount')->name('createDiscount');
        Route::get('customers-management/{customer}/delete-discount/{discount?}', 'UserController@deleteDiscount')->name('deleteDiscount');
        /* End Swarnadeep*/
        Route::resource('customers-management', 'UserController');
        Route::post('customers-management/address/update/{userAddressId}', 'UserController@userAddressUpdate')->name('userAddressUpdate');
        Route::post('customers-management/{customer}/create-token/{token?}', 'UserController@createToken')->name('createToken');
        Route::get('customers-management/delete-token/{token}', 'UserController@deleteToken')->name('deleteToken');
        /* Product management */
        Route::resource('products', 'ProductController', [
            'only' => ['index', 'create', 'store', 'edit', 'update', 'destroy']
        ]);
        Route::post('product/{product}/featured/update/', 'ProductController@updateFeaturedProduct')->name('updateFeaturedProduct');
        Route::post('post-bulk/product/changes', 'ProductController@postBulk')->name('postBulk');

        Route::group(['prefix' => 'product/{productId}/', 'middleware' => 'checkProduct'], function () {
            Route::resource('stock', 'ProductStockController', [
                'only' => ['index', 'store', 'update']
            ]);

            Route::resource('images', 'ProductImageController');
            Route::get('make-base/image/{image}', 'ProductImageController@makeBaseImage')->name('makeBaseImage');
        });

        /* Product Group Management */
        Route::resource('product-groups', 'ProductGroupController', [
            'only' => ['index', 'store', 'edit', 'update', 'destroy']
        ]);
        /* Orders management */
        Route::group(['prefix' => '{OrderStatus}/', 'middleware' => 'setOrderStatus'], function () {
            // Route::get('orders/','OrderController@index')->name('orders.index');
            Route::resource('orders', 'OrderController', [
                'only' => ['index', 'update', 'show']
            ]);
            Route::post('post/bulk-update/orders/', 'OrderController@postBulkOrderUpdate')->name('postBulkOrderUpdate');
            Route::get('downloud-invoice/{order}', 'OrderController@invoice')->name('invoiceDownloud');
            Route::get('export-orders', 'OrderController@ordersExports')->name('ordersExports');
            // 		Swarnadeep
            Route::post('exports/', 'OrderController@exportOrders')->name('exportOrders');
            // 		End Swarnadeep
        });
        /* Discount Controller */
        Route::group(['prefix' => '{discountType}/', 'middleware' => 'SetDiscountType'], function () {
            Route::resource('discounts', 'DiscountController', [
                'only' => ['index', 'store', 'edit', 'update', 'destroy']
            ]);
        });

        /* Language Management */
        Route::resource('languages', 'LanguageController');

        Route::get('configuration', 'AdminController@configuration')->name('config');


        /* About Admin */
        Route::get('about-managements', 'AboutController@managements')->name('managements');
        Route::get('about-management/{management?}', 'AboutController@managementGet')->name('managementGet');
        Route::post('about-management/{management?}', 'AboutController@managementPost')->name('management');

        Route::get('about-management/{management}/images', 'AboutController@managementImages')->name('managementImages');
        Route::get('about-management/{management?}/image', 'AboutController@managementImageGet')->name('managementImageGet');
        Route::post('about-management/{management}/image', 'AboutController@managementImage')->name('managementImage');
        Route::get('about-management-base-image/{image}', 'AboutController@managementBaseImage')->name('makeBaseImageManagement');
        Route::delete('about-management-image-delete/{image}', 'AboutController@managementImageDelete')->name('managementImageDelete');

        Route::get('workspaces/', 'AboutController@workspaceImages')->name('workspaceImages');
        Route::get('workspaces/image/{workspace?}', 'AboutController@workspaceImageGet')->name('workspaceImageGet');
        Route::post('workspaces/image/{workspace?}', 'AboutController@workspaceImage')->name('workspaceImage');
        Route::delete('workspaces-image-delete/{workspace}', 'AboutController@workspaceImageDelete')->name('workspaceImageDelete');

        Route::get('creative/image/', 'AdminController@creativeImageGet')->name('creativeImageGet');
        Route::post('creative/image/{creative}', 'AdminController@creativeImage')->name('creativeImage');
    });

    /* Blogs Management */
    Route::resource('blogs', 'BlogController');

    /***  Coupon Master Route ***/
    Route::prefix('coupon')->name('coupon.')->group(function () {

        Route::get('/', [CouponMasterController::class, 'index'])->name('couponlist');
        Route::get('/create_coupon', [CouponMasterController::class, 'createCoupon'])->name('createCoupon');
        Route::post('/store_coupon_code', [CouponMasterController::class, 'storeCouponCode'])->name('storeCouponCode');
        Route::post('/delete_coupon', [CouponMasterController::class, 'deleteCoupon'])->name('deleteCoupon');
        Route::post('/coupon_status_change', [CouponMasterController::class, 'couponStatusChange'])->name('couponStatusChange');
        Route::get('/fetch_coupon/{slug}', [CouponMasterController::class, 'fetchCoupon'])->name('fetchCoupon');
        Route::post('/update_coupon', [CouponMasterController::class, 'updateCoupon'])->name('updateCoupon');
        Route::get('/auto_generate_coupon', [CouponMasterController::class, 'autoGenerateCoupon'])->name('autoGenerateCoupon');
        Route::post('/create_auto_generate_coupon', [CouponMasterController::class, 'createAutoGenerateCoupon'])->name('createAutoGenerateCoupon');
        Route::get('/export_all_coupons', [CouponMasterController::class, 'exportAllCoupons'])->name('exportAllCoupons');
    });

    /***  Distributer Master Route ***/
    Route::prefix('distributer')->name('distributer.')->group(function () {

        Route::get('/', [DistributerController::class, 'index'])->name('distributerlist');
        Route::get('/create_distributor', [DistributerController::class, 'createDistributor'])->name('createDistributor');
        Route::post('/store_distributer', [DistributerController::class, 'storeDistributer'])->name('storeDistributer');
        Route::post('/delete_distributer', [DistributerController::class, 'deleteDistributer'])->name('deleteDistributer');
        Route::get('/fetch_distributer/{id}', [DistributerController::class, 'fetchDistributer'])->name('fetchDistributer');
        Route::post('/update_distributer', [DistributerController::class, 'updateDistributer'])->name('updateDistributer');

        /***  Assign coupon to distributors Route ***/
        Route::get('/assign_coupon_to_distributors', [DistributerController::class, 'assignCouponToDistributors'])->name('assignCouponToDistributors');
        Route::post('/store_coupon_to_distributors', [DistributerController::class, 'storeCouponToDistributors'])->name('storeCouponToDistributors');
        Route::get('/list_all_assign_coupon_to_distributors', [DistributerController::class, 'listAllAssignCouponToDistributors'])->name('listAllAssignCouponToDistributors');
        Route::get('/export_all_distributors', [DistributerController::class, 'exportAllDistributors'])->name('exportAllDistributors');
        Route::get('/export_all_distributors_with_coupons', [DistributerController::class, 'exportAllDistributorsWithCoupons'])->name('exportAllDistributorsWithCoupons');
    });
});

Route::group(['middleware' => ['setLanguage']], function () {
    Route::get('set-language', 'HomeController@setLanguage')->name('setLanguageRoute');
    Route::get('/', 'Controller@indexPage')->name('home');
    Route::get('eco-products/{slug}/', 'FrontProductsController@productsList')->name('productsList');
    Route::get('eco-product/{category?}/{slug}/', 'FrontProductsController@productFullView')->name('productFullView');
    Route::get('sitemap', function () {
        return view('sitemap');
    })->name('sitemap');
    // Route::view('fresh-food-packaging','new_landing')->name('new-landing');
    Route::get('fresh-food-packaging/thank-u/', 'HomeController@getThankLandingBochure')->name('getThankLandingBochure');
    Route::get('downloud/fresh-food-packaging/brochure', 'HomeController@brochureDownloudLanding')->name('brochureDownloudLanding');
    Route::view('about-us', 'new_about-us')->name('about-us');
    // 	Route::view('contact-us','contact')->name('contact');
    Route::view('initiatives', 'new_csr-activities')->name('csr-activities');
    Route::view('html-sitemap', 'sitemapHtml')->name('sitemapHtml');
    Route::view('not-found', 'errors.404')->name('notFound');
    Route::get("/contact-us", function () {
        $products = \App\ProductDetail::where('language_id', config('app.lang')->id)->get();
        $continents = \App\Continent::orderBy('id', 'asc')->where('name', '<>', 'HQ')->with('branches')->get();
        $hq = \App\Continent::orderBy('id', 'asc')->where('name', '=', 'HQ')->first();
        $hqBranch = $hq->load('branches');
        return view('contact', ['products' => $products, 'hqBranch' => $hqBranch, 'continents' => $continents]);
    })->name('contact');

    Route::post('enquire-now', 'HomeController@enquireNow')->name('enquireNow');
    Route::post('landing-enquire-now', 'HomeController@landingEnquiry')->name('landingEnquiry');
    Route::get('thank-you', 'HomeController@getThanku2')->name('getThanku2');

    Route::view('globe', 'globe')->name('globe');
    Route::view('terms', 'new_terms')->name('terms');
    Route::view('recycling', 'new_sustainablity')->name('sustainablity');
    Route::view('coming_soon', 'new_coming_soon')->name('coming_soon');
    Route::get('blog', 'HomeController@getBlogListing')->name('blog');
    Route::get('blog-inside/{slug}', 'HomeController@getBlogInside')->name('blogInside');


    Route::view('faq', 'new_faq')->name('faq');
    Route::view('privacy', 'new_privacy')->name('privacy');
    Route::view('refunds-and-returns', 'new_refunds-and-returns')->name('refunds-and-returns');
    Route::get('north-america/{slug}/', 'FrontProductsController@northAmericaFullView')->name('northAmericaFullView');
    Route::view('terracycle-zero-waste-box', 'new_australia')->name('australia');
    Route::get('north-america-order-now', 'FrontProductsController@orderNorthNow')->name('orderNorthNow');

    Route::post('north-america-order-now', 'PaymentController@createOrderSustain')->name('createOrderSustain');
    Route::post('create-order', 'CartController@createOrder')->name('createOrder');
    Route::get('payment-initiated', 'PaymentController@paymentInitiate')->name('paymentInitiate');
    Route::post('payment-success', 'PaymentController@paymentStatus')->name('successPayment');

    Route::get('payment-cancel', 'PaymentController@paymentStatus')->name('cancelPayment');
    Route::get('manual/{categorySlug}/{productSlug}', 'HomeController@manualForm')->name('manualForm');
    Route::get('thanku/{categorySlug}/{productSlug}', 'HomeController@getThanku')->name('thanku');
    Route::get('downloud/manual/{product}', 'HomeController@manualDownloud')->name('downloudManual');

    Route::post('/add-to-cart', 'CartController@addToCart')->name('addToCart');
    Route::get('/remove-from-cart/{sku}', 'CartController@removeFromCart')->name('removeFromCart');
    Route::get('/my-cart', 'CartController@cartItems')->name('cartItems');
    Route::get('/cart-address', 'CartController@addressConfirm')->name('addressConfirm');
    Route::post('/post-cart-address', 'CartController@postAddressConfirm')->name('postAddressConfirm');
    Route::get('/order-summary', 'CartController@getOrderSummery')->name('getOrderSummery');

    Route::prefix('user')->middleware(['auth', 'role:User'])->group(function () {
        Route::get('/my-orders', 'AuthController@myOrders')->name('myOrders');
        Route::get('/my-orders-details/{id}', 'AuthController@myOrderDetails')->name('myOrderDetails');
    });
    Route::prefix('user')->middleware(['auth'])->group(function () {
        Route::post('/apply-coupon', 'CartController@discountCoupon')->name('discountCoupon');
        Route::post('/remove-discount', 'CartController@removeDiscount')->name('removeDiscount');
    });
});

Route::post('post/comment', 'HomeController@postComment')->name('postComment');
Route::get('login/{provider}', 'SocialController@redirect');
Route::get('login/{provider}/callback', 'SocialController@Callback');
Route::get('track-url', 'HomeController@trackUrl')->name('trackUrl');


Route::get('test-invoice2', 'PaymentController@testMail')->name('testMail');

Route::get("/test-invoice", function (Request $request) {
    // return 1;
    $lang = \App\Language::where('id', 1)->first();
    config(['app.lang' => $lang]);
    \App::setLocale($lang->slug);
    // return view('contact_thanku')->with('request',[])->with('back','dfgsfsfd');
    $orderDetails = App\Order::find(222)->load(
        [
            'userUsedDiscounts', 'user', 'orderProducts' => function ($query) {
                $query->with(['stock' => function ($query) {
                    $query->with(['product' => function ($q) {
                        $q->with(['categories', 'productDetails']);
                    }]);
                }]);
            }
        ]
    );
    return view('new_successful_all_payments', ['order' => $orderDetails]);

    $heading = "New Order Placed";
    $wrd = "test";
    // view()->share(['order'=>$orderDetails,'wrd' => 'US Dollars One Hundred Fifty-Nine And Zero Cents']);
    return view('invoice', ['order' => $orderDetails, 'wrd' => 'US Dollars One Hundred Fifty-Nine And Zero Cents']);
    $pdf = PDF::loadview('invoice');

    Mail::send('confirm_mail', ['order' => $newOrder, 'heading' => 'New Order Placed'], function ($m) use ($pdf) {
        $m->to('swarnadeep@webmaddy.com')->subject('New Order Placed');
        $m->attachData($pdf->output(), 'invoice.pdf');
    });
    return 1;
});
