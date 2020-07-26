<?php
/**
 * Created by PhpStorm.
 * User: ubuntu
 * Date: 12/15/17
 * Time: 1:25 AM
 */

Route::group(['prefix' => 'admin', 'namespace' => 'Backend', 'middleware' => ['guest']], function () {


    Route::get('/', 'Auth\LoginController@getLoginForm');
    Route::post('authenticate', 'Auth\LoginController@authenticate');
//    Route::get('home', 'Auth\AdminController@index');

});

Route::group(['prefix' => 'admin', 'namespace' => 'Backend', 'middleware' => ['admin']], function () {

    Route::get('home', 'Auth\AdminController@index');
    Route::post('logout', 'Auth\LoginController@getLogout');

});


Route::group(['prefix' => '', 'namespace' => 'Backend\Inventory\Products', 'middleware' => ['admin']], function () {

    Route::get('admin.category.index',['as'=>'admin.category.index', 'uses'=>'CategoryController@index']);
    Route::get('admin.categories.data',['as'=>'admin.categories.data', 'uses'=>'CategoryController@getCData']);
    Route::post('admin.categories.add',['as'=>'admin.categories.add', 'uses'=>'CategoryController@add']);

    Route::get('/category/ajax/{id}',['as'=>'category.ajax.sub', 'uses'=>'CategoryController@getsubcategory']);

//    Route::post('admin.categories.rowdata/{id}',['as'=>'admin.categories.edit', 'uses'=>'CategoryController@edit']);
    Route::get('backend.categories.modaldata/{id}',['as'=>'backend.categories.modaldata', 'uses'=>'CategoryController@modaldata']);
    Route::post('backend.categories.update',['as'=>'backend.categories.update', 'uses'=>'CategoryController@update']);
    Route::post('category.locale.title',['as'=>'category.locale.title', 'uses'=>'CategoryController@newlocate']);

    Route::get('admin.subcategory.index',['as'=>'admin.subcategory.index', 'uses'=>'SubcategoryController@index']);
    Route::get('admin.subcategories.data',['as'=>'admin.subcategories.data', 'uses'=>'SubcategoryController@getSCData']);
    Route::post('admin.subcategories.add',['as'=>'admin.subcategories.add', 'uses'=>'SubcategoryController@add']);

    Route::get('backend.subcategories.modaldata/{id}',['as'=>'admin.subcategory.modaldata', 'uses'=>'SubcategoryController@modaldata']);

    Route::post('backend.subcategories.update',['as'=>'admin.subcategories.edit', 'uses'=>'SubcategoryController@update']);
    Route::post('admin.subcategories.delete/{id}',['as'=>'admin.subcategories.delete', 'uses'=>'SubcategoryController@destroy']);
    Route::get('subcategories.autocomplete',['as'=>'admin.subcategories.auto', 'uses'=>'SubcategoryController@autocomplete']);

    Route::post('subcategory.locale.title',['as'=>'subcategory.locale.title', 'uses'=>'SubcategoryController@newlocate']);


    Route::get('/language/ajax/{locale}',['as'=>'getcategory', 'uses'=>'SubcategoryController@getCategoryaslocale']);



    Route::get('admin.brand.index',['as'=>'admin.brand.index', 'uses'=>'BrandController@index']);
    Route::get('admin.brand.data',['as'=>'admin.brand.data', 'uses'=>'BrandController@getBrandData']);
    Route::post('admin.brand.add',['as'=>'admin.brand.add', 'uses'=>'BrandController@add']);
    Route::post('admin.brand.edit/{id}',['as'=>'admin.brand.edit', 'uses'=>'BrandController@update']);
    Route::post('admin.brand.delete/{id}',['as'=>'admin.brand.delete', 'uses'=>'BrandController@destroy']);


    Route::get('admin.tax.index',['as'=>'admin.tax.index', 'uses'=>'TaxController@index']);
    Route::get('admin.tax.data',['as'=>'admin.tax.data', 'uses'=>'TaxController@getTaxData']);
    Route::post('admin.tax.add',['as'=>'admin.tax.add', 'uses'=>'TaxController@add']);
    Route::post('admin.tax.edit/{id}',['as'=>'admin.tax.edit', 'uses'=>'TaxController@update']);
    Route::post('admin.tax.delete/{id}',['as'=>'admin.tax.delete', 'uses'=>'TaxController@destroy']);

    Route::get('admin.size.index',['as'=>'admin.size.index', 'uses'=>'SizeController@index']);
    Route::get('admin.size.data',['as'=>'admin.size.data', 'uses'=>'SizeController@getSizeData']);
    Route::post('admin.size.add',['as'=>'admin.size.add', 'uses'=>'SizeController@add']);
    Route::post('admin.size.edit/{id}',['as'=>'admin.size.edit', 'uses'=>'SizeController@update']);
    Route::post('admin.size.delete/{id}',['as'=>'admin.size.delete', 'uses'=>'SizeController@destroy']);

    Route::get('admin.color.index',['as'=>'admin.color.index', 'uses'=>'ColorController@index']);
    Route::get('admin.color.data',['as'=>'admin.color.data', 'uses'=>'ColorController@getColorData']);
    Route::post('admin.color.add',['as'=>'admin.color.add', 'uses'=>'ColorController@add']);
    Route::post('admin.color.edit/{id}',['as'=>'admin.color.edit', 'uses'=>'ColorController@update']);
    Route::post('admin.color.delete/{id}',['as'=>'admin.color.delete', 'uses'=>'ColorController@destroy']);


    Route::get('admin.unit.index',['as'=>'admin.unit.index', 'uses'=>'UnitController@index']);
    Route::get('admin.unit.data',['as'=>'admin.unit.data', 'uses'=>'UnitController@getUnitData']);
    Route::post('admin.unit.add',['as'=>'admin.unit.add', 'uses'=>'UnitController@add']);
    Route::post('backend.units.update',['as'=>'admin.unit.edit', 'uses'=>'UnitController@update']);
    Route::post('admin.unit.delete/{id}',['as'=>'admin.unit.delete', 'uses'=>'UnitController@destroy']);
    Route::post('unit.locale.title',['as'=>'unit.locale.title', 'uses'=>'UnitController@newlocate']);

    Route::get('backend.unit.modaldata/{id}',['as'=>'backend.unit.modaldata', 'uses'=>'UnitController@modaldata']);



    Route::get('admin.model.index',['as'=>'admin.model.index', 'uses'=>'ProductModelController@index']);
    Route::get('admin.model.data',['as'=>'admin.model.data', 'uses'=>'ProductModelController@getModelData']);
    Route::post('admin.model.add',['as'=>'admin.model.add', 'uses'=>'ProductModelController@add']);
    Route::post('admin.model.edit/{id}',['as'=>'admin.model.edit', 'uses'=>'ProductModelController@update']);
    Route::post('admin.model.delete/{id}',['as'=>'admin.model.delete', 'uses'=>'ProductModelController@destroy']);


    Route::get('admin.product.index',['as'=>'admin.product.index', 'uses'=>'ProductController@index']);
    Route::get('admin.product.data',['as'=>'admin.product.data', 'uses'=>'ProductController@getPDTData']);
    Route::get('product.create.form',['as'=>'product.create.form', 'uses'=>'ProductController@createIndex']);
    Route::post('product.data.new',['as'=>'admin.product.add', 'uses'=>'ProductController@store']);
//    Route::post('admin.product.edit/{id}',['as'=>'admin.product.edit', 'uses'=>'ProductController@update']);
    Route::post('admin.product.delete/{id}',['as'=>'admin.product.delete', 'uses'=>'ProductController@destroy']);
    Route::get('product/ajax_details/{id}',['as'=>'product/ajax_details', 'uses'=>'ProductController@details']);
    Route::post('product.details.update',['as'=>'product.details.update', 'uses'=>'ProductController@update']);

    Route::get('admin.product.list',['as'=>'admin.product.list', 'uses'=>'ProductController@autocomplete']); //Get product autocomplete


    Route::get('product.desc.index',['as'=>'product.desc.index', 'uses'=>'ProductController@descriptionindex']);
    Route::post('product.desc.post',['as'=>'product.desc.index', 'uses'=>'ProductController@descriptionpost']);

    Route::get('autocomplete.productlist',['as'=>'autocomplete.productlist', 'uses'=>'ProductController@autocomplete']);
    Route::post('products/totalItem',['as'=>'producttotal', 'uses'=>'ProductController@totalproduct']);

    Route::post('product.locale.title',['as'=>'add.product.locale.title', 'uses'=>'ProductController@addtitle']);

});

//Product Requisition

Route::group(['prefix' => '', 'namespace' => 'Backend\Inventory\Requisitions', 'middleware' => ['admin']], function () {

    Route::get('create.requisition.index',['as'=>'create.requisition.index','uses'=>'RequisitionController@index']);
    Route::post('create.requisition.post',['as'=>'create.requisition.post','uses'=>'RequisitionController@create']);

    Route::get('edit.requisition.index',['as'=>'edit.requisition.index','uses'=>'EditRequisitionController@index']);
    Route::get('edit.requisition.data',['as'=>'edit.requisition.data','uses'=>'EditRequisitionController@getreqdata']);

    Route::get('requisition.edit/{refno}',['as'=>'requisition.edit','uses'=>'EditRequisitionController@reqitemdata']);

    Route::post('requisition.edit.post',['as'=>'requisition.edit.post','uses'=>'EditRequisitionController@update']);

    Route::get('approve.requisition.index',['as'=>'approve.requisition.index','uses'=>'ApproveRequisitionController@index']);
    Route::get('approve.requisition.data',['as'=>'approve.requisition.data','uses'=>'ApproveRequisitionController@getreqdata']);

    Route::post('requisition.approve/{refno}',['as'=>'approve.requisition.data','uses'=>'ApproveRequisitionController@approve']);
    Route::post('requisition.reject/{refno}',['as'=>'reject.requisition.data','uses'=>'ApproveRequisitionController@reject']);

    Route::get('print.requisition.index',['as'=>'print.requisition.index','uses'=>'PrintRequisitionController@index']);
    Route::get('report.requisition.data',['as'=>'report.requisition.index','uses'=>'PrintRequisitionController@dtableindex']);

    Route::get('requisition.print/{refno}',['as'=>'report.requisition.index','uses'=>'PrintRequisitionController@print']);

});



//Product Purchase

Route::group(['prefix' => '', 'namespace' => 'Backend\Inventory\Purchase', 'middleware' => ['admin']], function () {

    Route::get('item.purchase.index',['as'=>'item.purchase.index','uses'=>'PurchaseController@index']);
    Route::post('purchase.create.post',['as'=>'purchase.create','uses'=>'PurchaseController@create']);
    Route::get('edit.purchase.index',['as'=>'edit.purchase.index','uses'=>'EditPurchaseController@index']);

    Route::post('edit.purchase.update',['as'=>'edit.purchase.update','uses'=>'EditPurchaseController@update']);

    Route::get('approve.purchase.index',['as'=>'approve.purchase.index','uses'=>'ApprovePurchaseController@index']);
    Route::get('approve.purchase.data',['as'=>'approve.purchase.data','uses'=>'ApprovePurchaseController@getpurchasedata']);

    Route::post('purchase.approve/{refno}',['as'=>'purchase.approve','uses'=>'ApprovePurchaseController@approve']);

    Route::post('purchase.reject/{refno}',['as'=>'purchase.reject','uses'=>'ApprovePurchaseController@reject']);


    Route::get('receive.product.index',['as'=>'receive.product.index','uses'=>'ReceivePurchasedItemController@index']);
    route::post('receive.product.post',['as'=>'receive.product.post','uses'=>'ReceivePurchasedItemController@receive']);



});


//Sales

Route::group(['prefix' => '', 'namespace' => 'Backend\Inventory\Sales', 'middleware' => ['admin']], function () {

    Route::get('sales.invoice.index',['as'=>'sales.invoice.index','uses'=>'SalesController@index']);
    Route::post('sales.invoice.create',['as'=>'sales.invoice.create','uses'=>'SalesController@create']);

    Route::get('edit.invoice.index',['as'=>'edit.invoice.index','uses'=>'EditSalesController@index']);
    Route::post('edit.invoice.update',['as'=>'edit.invoice.update','uses'=>'EditSalesController@update']);

    Route::get('approve.invoice.index',['as'=>'approve.invoice.index','uses'=>'ApproveSalesController@index']);
    Route::get('approve.invoice.data',['as'=>'approve.invoice.data','uses'=>'ApproveSalesController@getinvoicedata']);

    Route::post('invoice.approve/{refno}',['as'=>'invoice.approve','uses'=>'ApproveSalesController@approve']);

    Route::post('invoice.reject/{refno}',['as'=>'invoice.reject','uses'=>'ApproveSalesController@reject']);


    Route::get('delivery.invoice.index',['as'=>'delivery.invoice.index','uses'=>'DeliverySalesController@index']);
    Route::post('delivery.invoice.create',['as'=>'delivery.invoice.create','uses'=>'DeliverySalesController@create']);

    Route::get('print.invoice.index',['as'=>'print.invoice.index','uses'=>'RptSalesInvoiceController@index']);
    Route::get('invoice.autocomplete',['as'=>'print.invoice.index','uses'=>'RptSalesInvoiceController@autocomplete']);

    Route::get('print.challan.index',['as'=>'print.challan.index','uses'=>'RptDeliveryChallanController@index']);
    Route::get('delivery.autocomplete',['as'=>'delivery.autocomplete','uses'=>'RptDeliveryChallanController@autocomplete']);

    Route::get('print.item.ledger',['as'=>'print.item.ledger','uses'=>'RptProductLedgerController@index']);

});


//Inventory Reports

Route::group(['prefix' => '', 'namespace' => 'Backend\Inventory\Report', 'middleware' => ['admin']], function () {

    Route::get('product.list.index',['as'=>'product.list.index','uses'=>'RptProductlistController@productlist']);
    Route::get('product.ledger.index',['as'=>'productledger','uses'=>'RptProductLedgerController@index']);


});
