<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function () {   return view('welcome'); });


Auth::routes();



Route::group(['prefix' => 'accounts', 'namespace' => 'Backend\Accounts', 'middleware' => ['guest']], function () {



});






Route::group(['middleware' => ['guest']], function () {


   

    Route::get('frontend.language.{language}',['as'=>'homewithlanguage','uses' => 'Frontend\WelcomeController@langselect']);


    // USER
    Route::get('user.login', 'Frontend\Auth\LoginController@getLoginForm');
    Route::post('user.logout', 'Frontend\Auth\LoginController@getLogout');

    Route::post('user.authenticate', 'Frontend\Auth\LoginController@authenticate');

    Route::get('user.register', 'Frontend\Auth\RegisterController@getRegisterForm');
    Route::post('user/saveregister', 'Frontend\Auth\RegisterController@saveRegisterForm');


    Route::get('frontend.subctgry/{id}','Frontend\Products\ProductDetailsController@index');
    Route::get('display/single/product/{id}','Frontend\Display\ProductDetailsController@productDetails');


    // info pages
    Route::group(['prefix' => 'info', 'namespace' => 'Frontend\Contacts'], function () {

        // requesting the about page
        Route::get('about', ['as' => 'about', 'uses' => 'InfoController@getAbout']);

        // requesting the terms & conditions page
        Route::get('termsofuse', ['as' => 'terms', 'uses' => 'InfoController@getTerms']);

        // requesting the contact page
        Route::get('contact', ['as' => 'contact', 'uses' => 'InfoController@getContact']);

        // this will handle the action of a user sending a message to us. since the form is already by default on the page, we don't need a GET request
        Route::post('contact', ['as' => 'contact.post', 'uses' => 'InfoController@postContactMessage', 'middleware' => ['msg.check']]);
    });
});


//Route::group(['prefix' => '', 'middleware' => ['admin']], function () {
//
//
//    Route::get('admin.register.index', 'Backend\Auth\RegisterController@getRegisterForm');
//    Route::post('admin/saveregister', 'backend\Auth\RegisterController@saveRegisterForm');
//
//
//
//});

// usr account
Route::group(['prefix' => "account", 'namespace' => 'Shared', 'middleware' => ['user']], function () {

    // account customizations
    Route::get('/', ['as' => 'myaccount', 'uses' => 'AccountController@index']);

    Route::patch('/Info/contact', ['as' => 'account.info.contact.edit', 'uses' => 'AccountController@patchContacts']);

    Route::patch('/Info/add', ['as' => 'account.info.addMore', 'uses' => 'AccountController@patchAccountAddingMoreDetails', 'middleware' => ['age.filter']]);

    Route::patch('/Info/personal', ['as' => 'account.info.personal.edit', 'uses' => 'AccountController@patchAccount', 'middleware' => ['age.filter']]);

    Route::patch('/Info/shipping', ['as' => 'account.info.shipping.edit', 'uses' => 'AccountController@patchShipping']);

    Route::patch('/password/new', ['as' => 'account.password.edit', 'uses' => 'AccountController@patchPassword']);

    Route::delete('/delete', ['as' => 'account.delete.temporary', 'uses' => 'AccountController@deleteAccount']);

});



Route::group(['prefix' => '', 'namespace' => 'Backend\Inventory\Relations', 'middleware' => ['admin']], function () {

    Route::get('backend.suppilers.index',['as'=>'backend.suppilers.index','uses'=>'SuppliersController@index']);
    Route::get('backend.suppliers.data',['as'=>'backend.suppliers.data','uses'=>'SuppliersController@getsuppliers']);
    Route::post('suppliers.data.new',['as'=>'suppliers.data.new','uses'=>'SuppliersController@add']);


    Route::get('backend.customers.index',['as'=>'backend.customers.index','uses'=>'CustomersController@index']);
    Route::get('customers.data.get',['as'=>'customers.data','uses'=>'CustomersController@getsuppliers']);
    Route::post('customers.data.new',['as'=>'customers.data.new','uses'=>'CustomersController@add']);



});







Route::group(['prefix' => 'display', 'namespace' => 'Frontend\Display', 'middleware' => ['guest']], function () {

    Route::get('categories/{id}',['as'=>'displaycategory', 'uses'=>'CategoryDisplayController@show']);
    Route::get('subcategory.index',['as'=>'display.category.index', 'uses'=>'SubCategoryDisplayController@index']);
    Route::get('singleproduct.index',['as'=>'display.singleproduct.index', 'uses'=>'SingleProductDisplayController@index']);
    Route::get('contactus.index',['as'=>'display.singleproduct.index', 'uses'=>'ContactusController@index']);
    Route::get('aboutus.index',['as'=>'display.aboutus.index', 'uses'=>'AboutusController@index']);

});


// basket
Route::group(['prefix' => 'basket', 'namespace' => 'Frontend\Shop'], function () {

    Route::get('/', ['as' => 'cart.index', 'uses' => 'CartController@index']);
    // adding a product to the cart
    Route::post('add/product/{products}', ['as' => 'cart.add', 'uses' => 'CartController@store']);
    // listing all products in the cart
    Route::get('/view', ['as' => 'cart.view', 'uses' => 'CartController@view']);
    // add a product to an existing cart
    Route::patch('/update/add/{products}', ['as' => 'cart.update', 'uses' => 'CartController@update']);

    Route::delete('/update/remove/{products}/remove', ['as' => 'cart.update.remove', 'uses' => 'CartController@removeProduct']);

    Route::delete('/update/removeAll', ['as' => 'cart.removeAllProducts', 'uses' => 'CartController@removeAllProducts']);

    // a users shopping cart
    Route::group(['prefix' => '', 'middleware' => ['auth']], function () {

        Route::get('/', ['as' => 'mycart', 'uses' => 'CartController@getMine']);
    });
});


//// checking out as a guest user
//Route::group(['prefix' => 'checkout/guest', 'namespace' => 'Frontend\Checkout', 'middleware' => ['cart.check', 'checkout.guest']], function () {
//
//    Route::get('/', ['as' => 'checkout.step1', 'uses' => 'GuestCheckoutController@guestInfo']);
//
//    Route::post('/aboutMe', ['as' => 'checkout.step1.store', 'uses' => 'GuestCheckoutController@postGuestInfo']);
//
//    Route::patch('/aboutMe', ['as' => 'checkout.step1.edit', 'uses' => 'GuestCheckoutController@editShippingAddress']);
//
//    Route::get('/shipping', ['as' => 'checkout.step2', 'uses' => 'GuestCheckoutController@shipping']);
//
//    Route::patch('/shipping', ['as' => 'checkout.step2', 'uses' => 'GuestCheckoutController@patchShipping']);
//
//    Route::get('/payment', ['as' => 'checkout.step4', 'uses' => 'GuestCheckoutController@payment']);
//
//    Route::post('/payment', ['as' => 'checkout.step4.post', 'uses' => 'GuestCheckoutController@storePayment']);
//
//    Route::get('/reviewOrder', ['as' => 'checkout.step3', 'uses' => 'GuestCheckoutController@reviewOrder']);
//
//    Route::get('/createAccount', ['as' => 'checkout.createAccount', 'uses' => 'GuestCheckoutController@getCreateAccount']);
//
//    Route::post('/createAccount', ['as' => 'checkout.createAccount.post', 'uses' => 'GuestCheckoutController@createAccount']);
//
//});


// shop
Route::group(['prefix' => 'shop', 'namespace' => 'Frontend\Products'], function(){
    // categories
    Route::group(['prefix' => 'categories'], function () {
        // listing categories. sort of sitemaping, or whatever
//        Route::get('/', ['as' => 'allCategories', 'uses' => 'CategoriesController@index']);

        // display all products in the category, regardless of sub-category
        Route::get('/{categories}', ['as' => 'categories.sub.shop', 'uses' => 'CategoriesController@show']);
    });

    // subcategories
    Route::group(['prefix' => 'sub-categories'], function () {

        Route::get('/', ['as' => 'allSubCategories', 'uses' => 'SubCategoriesController@index']);

        Route::get('/{subcategories}', ['as' => 'subcategories.shop', 'uses' => 'SubCategoriesController@show']);
    });

    // products
    Route::group(['prefix' => 'products'], function () {

        Route::get('/', ['as' => 'allProducts', 'uses' => 'ProductsController@index']);

        Route::get('/{products}', ['as' => 'product.view', 'uses' => 'ProductDetailsController@productDetails']);

    });

    // brands
    Route::group(['prefix' => 'brands'], function () {

        Route::get('/', ['as' => 'allBrands', 'uses' => 'BrandsController@index']);

        Route::get('/{brands}', ['as' => 'brands.shop', 'uses' => 'BrandsController@show']);
    });
});


//Route Help

Route::group(['prefix' => 'help', 'namespace' => 'Shared'], function () {

    Route::get('/', ['as' => 'help', 'uses' => 'HelpController@index']);
    // help & faq
    Route::get('/faq', ['as' => 'faq', 'uses' => 'HelpController@displayFAQ']);
    // articles
    Route::get('/article/{articles}', ['as' => 'help.article.view', 'uses' => 'HelpController@show']);
});


// checking out as a guest user
Route::group(['prefix' => 'checkout/guest', 'namespace' => 'Frontend\Checkout', 'middleware' => ['cart.check', 'checkout.guest']], function () {

    Route::get('/', ['as' => 'checkout.step1', 'uses' => 'GuestCheckoutController@guestInfo']);

    Route::post('/aboutMe', ['as' => 'checkout.step1.store', 'uses' => 'GuestCheckoutController@postGuestInfo']);

    Route::patch('/aboutMe', ['as' => 'checkout.step1.edit', 'uses' => 'GuestCheckoutController@editShippingAddress']);

    Route::get('/shipping', ['as' => 'checkout.step2', 'uses' => 'GuestCheckoutController@shipping']);

    Route::patch('/shipping', ['as' => 'checkout.step2', 'uses' => 'GuestCheckoutController@patchShipping']);

    Route::get('/payment', ['as' => 'checkout.step4', 'uses' => 'GuestCheckoutController@payment']);

    Route::post('/payment', ['as' => 'checkout.step4.post', 'uses' => 'GuestCheckoutController@storePayment']);

    Route::get('/reviewOrder', ['as' => 'checkout.step3', 'uses' => 'GuestCheckoutController@reviewOrder']);

    Route::get('/createAccount', ['as' => 'checkout.createAccount', 'uses' => 'GuestCheckoutController@getCreateAccount']);

    Route::post('/createAccount', ['as' => 'checkout.createAccount.post', 'uses' => 'GuestCheckoutController@createAccount']);

});

Route::get('checkout/begin', ['as' => 'checkout.auth', 'uses' => 'Frontend\Checkout\GuestCheckoutController@auth', 'middleware' => ['cart.check']]);


// orders for a guest user
Route::group(['prefix' => 'checkout/guest/orders', 'namespace' => 'Frontend\Orders', 'middleware' => ['cart.check', 'checkout.guest']], function(){
    Route::post('/placeOrder', ['as' => 'checkout.submitOrder', 'uses' => 'OrdersController@store']);

    Route::get('/viewInvoice', ['as' => 'checkout.viewInvoice', 'uses' => 'OrdersController@displayInvoice', 'middleware' => ['orders.verify']]);

    Route::get('/invoice/pdf', ['as' => 'checkout.viewInvoice.pdf', 'uses' => 'OrdersController@printInvoice', 'middleware' => ['orders.verify']]);

    Route::get('/complete', ['as' => 'order.finished', 'uses' => 'OrdersController@completeOrder', 'middleware' => ['orders.verify']]);
});

//
Route::group(['prefix' => 'checkout/orders', 'namespace' => 'Frontend\Orders', 'middleware' => ['cart.check', 'checkout.user']], function(){
    Route::get('/viewInvoice', ['as' => 'u.checkout.viewInvoice', 'uses' => 'OrdersController@displayInvoice', 'middleware' => ['orders.verify']]);

    Route::get('/invoice/pdf', ['as' => 'u.checkout.viewInvoice.pdf', 'uses' => 'OrdersController@printInvoice', 'middleware' => ['orders.verify']]);

    Route::post('/placeOrder', ['as' => 'u.checkout.submitOrder', 'uses' => 'OrdersController@store']);

    Route::get('/complete', ['as' => 'u.order.finished', 'uses' => 'OrdersController@completeOrder', 'middleware' => ['orders.verify']]);
});


// checking out as a normal authenticated user
Route::group(['prefix' => 'checkout', 'namespace' => 'Frontend\Checkout', 'middleware' => ['cart.check', 'checkout.user']], function () {

    Route::get('/', ['as' => 'u.checkout.step2', 'uses' => 'AuthUserCheckoutController@index']);

    Route::patch('/shipping', ['as' => 'u.checkout.step2.patch', 'uses' => 'AuthUserCheckoutController@shipping']);

    Route::get('/reviewOrder', ['as' => 'u.checkout.step3', 'uses' => 'AuthUserCheckoutController@reviewOrder']);

    Route::get('/payment', ['as' => 'u.checkout.step4', 'uses' => 'AuthUserCheckoutController@payment']);

    Route::post('/payment', ['as' => 'u.checkout.step3.post', 'uses' => 'AuthUserCheckoutController@postPayment']);




});


// authentication
Route::group(['prefix' => 'auth', 'namespace' => 'Frontend'], function () {

//     login
    Route::group(['prefix' => 'login'], function () {

//         requesting the login page
        Route::get('/', ['as' => 'login', 'uses' => 'Auth\LoginController@getLoginForm']);

//         posting to the login page, for credentials validation
        Route::post('/', ['as' => 'login.verify', 'uses' => 'AuthController@postLogin']);

    });

    // OAUTH
    Route::group(['prefix' => 'oauth'], function () {
//
//        // API login
        Route::get('/', ['as' => 'auth.loginUsingAPI', 'uses' => 'AuthController@apiAuth', 'middleware' => 'api.authenticate']);
//
//        // account creation. Requires that a valid user was returned by the API
        Route::get('/register', ['as' => 'auth.fill', 'uses' => 'AuthController@getMiniRegistrationForm', 'middleware' => 'user.found']);
        Route::post('/register', ['as' => 'auth.fill.post', 'uses' => 'AuthController@createAccountViaOAUTHData', 'middleware' => 'user.found']);
//
//        // handle user verification via OAUTH
        Route::get('/callback', ['as' => 'auth.getDataFromAPI', 'uses' => 'AuthController@handleOAUTHCallback']);
//
    });

    // registration
    Route::group(['prefix' => 'register'], function () {
        // display registration form
        Route::get('/', ['as' => 'register', 'uses' => 'Auth\RegisterController@getRegisterForm']);

        // process user registration
        Route::post('/', ['as' => 'registration.store', 'uses' => 'AuthController@postRegister']);
    });

    // logout
    Route::get('logout', ['as' => 'logout', 'uses' => 'AuthController@getLogout']);

    // account activation
    Route::get('/activate/{code}', ['as' => 'account.activate', 'uses' => 'AuthController@getActivate']);

    // confirming a user's password
    Route::post('/confirm_password', ['as' => 'confirm_password', 'uses' => 'AccountController@confirmPassword', 'middleware' => ['auth']]);

    // password reset
    Route::group(['prefix' => 'password'], function () {

        // display email form for password reset. This isn't used entirely because displaying the form is done via a modal
        Route::get('/reset', ['as' => 'password.reset', 'uses' => 'PasswordController@getEmail']);

        // verifying email
        Route::post('/reset', ['as' => 'reset.postEmail', 'uses' => 'PasswordController@postEmail']);

        // display the form for resetting a password
        Route::get('/new/{token}', ['as' => 'reset.start', 'uses' => 'PasswordController@getReset']);

        // save the new password
        Route::post('/new', ['as' => 'reset.finish', 'uses' => 'PasswordController@postReset']);
    });


});
