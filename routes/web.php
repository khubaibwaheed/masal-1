<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\retailerOrder;
use App\User;
use Gloudemans\Shoppingcart\Facades\Cart;
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
//Authentication Route
Route::match(['get', 'post'], '/retailerrequest', 'AuthController@register');
//admin
Route::match(['get', 'post'], '/admin', 'AuthController@login');
//Admin Logout Route
Route::get('/logout','AuthController@logout')->name('logout');
//Retailer Logout Route
Route::get('/retailerlogout','AuthController@retailerlogout')->name('retailerlogout');
//retailer
Route::post('/retailerlogin', 'AuthController@retailerlogin')->name('retailerlogin');
//Admin Routes
Route::get('/dashboard', 'AdminController@index');
//Home Page Edits
Route::get('/template_edit/{id}', 'EmailController@template_edit')->name('template_edit');
Route::get('/template_stat/{id}/{value}', 'EmailController@template_stat')->name('template_stat');
Route::post('/templateeditor', 'EmailController@templateeditor')->name('templateeditor');
Route::post('/add_template', 'EmailController@add_template')->name('add_template');
Route::post('/temp_edit', 'EmailController@temp_edit')->name('temp_edit');
Route::get('/manageHome', 'pagerController@manageHome')->name('manageHome');
Route::get('/real_request/{id}', 'AdminController@real_request')->name('real_request');
Route::get('/active_request/{id}/{value}', 'pagerController@active_request')->name('active_request');
Route::post('/head1', 'pagerController@head1')->name('head1');
Route::post('/head2', 'pagerController@head2')->name('head2');
Route::post('/head3', 'pagerController@head3')->name('head3');
Route::post('/head4', 'pagerController@head4')->name('head4');
Route::post('/head5', 'pagerController@head5')->name('head5');
Route::post('/head6', 'pagerController@head6')->name('head6');
Route::post('/head7', 'pagerController@head7')->name('head7');
Route::post('/head8', 'pagerController@head8')->name('head8');
Route::post('/head9', 'pagerController@head9')->name('head9');
Route::post('/head10', 'pagerController@head10')->name('head10');
Route::post('/head11', 'pagerController@head11')->name('head11');
Route::post('/head12', 'pagerController@head12')->name('head12');
Route::post('/head13', 'pagerController@head13')->name('head13');
Route::post('/head14', 'pagerController@head14')->name('head14');
Route::post('/head15', 'pagerController@head15')->name('head15');
Route::post('/head16', 'pagerController@head16')->name('head16');
Route::post('/head17', 'pagerController@head17')->name('head17');
Route::post('/head18', 'pagerController@head18')->name('head18');
//Footer Edits
Route::post('/foot1', 'pagerController@foot1')->name('foot1');
Route::post('/foot2', 'pagerController@foot2')->name('foot2');
Route::post('/foot3', 'pagerController@foot3')->name('foot3');
Route::post('/foot4', 'pagerController@foot4')->name('foot4');
Route::post('/foot5', 'pagerController@foot5')->name('foot5');
Route::post('/foot6', 'pagerController@foot6')->name('foot6');
Route::post('/foot7', 'pagerController@foot7')->name('foot7');
Route::post('/foot8', 'pagerController@foot8')->name('foot8');
Route::post('/foot9', 'pagerController@foot9')->name('foot9');
Route::post('/foot10', 'pagerController@foot10')->name('foot10');
Route::post('/foot11', 'pagerController@foot11')->name('foot11');
Route::get('/manageFooter', 'pagerController@manageFooter')->name('manageFooter');
Route::get('/manageReal', 'pagerController@manageReal')->name('manageReal');
Route::get('/add_real/{id}', 'pagerController@add_real')->name('add_real');
Route::get('/del_real/{id}', 'pagerController@del_real')->name('del_real');
Route::get('/email_templates', 'EmailController@index')->name('email_templates');
//Product Page
Route::get('/product', 'AdminController@products')->name('products');
Route::get('/admin_searcher', 'AdminController@admin_searcher')->name('admin_searcher');
//Add Product
Route::post('/add_product', 'AdminController@addProduct')->name('add_product');
Route::post('/imgUploader', 'AdminController@imgUploader')->name('imgUploader');
//Edit product
Route::get('/edit_product/{id}', 'AdminController@edit_product')->name('edit_product');
Route::post('/editor', 'AdminController@editor')->name('editor');
Route::post('/update_order', 'AdminController@update_order')->name('update_order');
Route::get('/edit_sale/{id}', 'AdminController@edit_sale')->name('edit_sale');
Route::post('/update_sale/{id}', 'AdminController@update_sale')->name('update_sale');
//Delete product
Route::get('/delete/{id}', 'AdminController@destroy')->name('delete');
Route::get('/deletefeed/{id}', 'AdminController@deletefeed')->name('deletefeed');
Route::get('/sale_tag', 'AdminController@sale_tag')->name('sale_tag');
// Order Page
Route::get('/order', 'OrderController@index')->name('order');
Route::get('/adminChat', 'ChatController@adminChat');
Route::get('/start_chat/{id}', 'ChatController@start_chat')->name('start_chat');
Route::post('/adminSendMessage', 'ChatController@adminSendMessage')->name('adminSendMessage');
Route::get('/dater/{status}', 'OrderController@dater')->name('dater');
Route::post('/add_sale','AdminController@add_sale')->name('add_sale');
Route::get('/del_sale/{id}', 'AdminController@del_sale')->name('del_sale');
// stockist Page
Route::get('/stockist', 'StokistController@index')->name('stockist');
// stockist Request Page
Route::get('/stockistsrequest', 'StokistController@stockistsrequest')->name('stockistsrequest');
Route::get('/stokistaccount/{id}/{value}', 'StokistController@account')->name('stokistaccount');
Route::get('/stokistdelete/{id}', 'StokistController@stokistdelete')->name('stokistdelete');
Route::get('/stokistedit/{id}', 'StokistController@stokistedit')->name('stokistedit');
Route::post('/stokisteditor', 'StokistController@stokisteditor')->name('stokisteditor');
//Catogory For Navbar
Route::get('/mainpage', 'AdminController@mainpage');
Route::post('/category', 'AdminController@add_category')->name('category');
Route::post('/add_size', 'AdminController@add_size')->name('add_size');
Route::post('/add_extra', 'AdminController@add_extra')->name('add_extra');
Route::get('/manageCategory', 'AdminController@manageCategory')->name('manageCategory');
Route::get('/size', 'AdminController@size')->name('size');
Route::get('/addition', 'AdminController@addition')->name('addition');
Route::get('/deleteCat/{id}', 'AdminController@deleteCat')->name('deleteCat');
Route::get('/swatches', 'AdminController@swatches')->name('swatches');
Route::get('/deleteSwatch/{id}', 'AdminController@deleteSwatch')->name('deleteSwatch');
Route::get('/deleteSize/{id}', 'AdminController@deleteSize')->name('deleteSize');
Route::get('/deleteExtra/{id}', 'AdminController@deleteExtra')->name('deleteExtra');
Route::get('/editSwatch/{id}', 'AdminController@editSwatch')->name('editSwatch');
Route::post('/swatch', 'AdminController@add_swatch')->name('swatch');
Route::post('/swatch_color', 'AdminController@swatch_color')->name('swatch_color');
Route::get('/contactReport', 'AdminController@contactReport')->name('contactReport');
Route::get('/editCat/{id}', 'AdminController@editCat')->name('editCat');
Route::get('/del_image/{id}/{value}', 'AdminController@del_image')->name('del_image');
Route::post('/cat_edit_indb', 'AdminController@cat_edit_indb')->name('cat_edit_indb');
Route::get('/lock_screen', 'AdminController@lock_screen');
Route::get('/profile', 'AdminController@profile');
Route::get('/editor/{id}', 'AdminController@editor');
//Retailer Routes
Route::get('/retailerdash', 'RetailerController@index');
Route::match(['get', 'post'],'/collection', 'RetailerController@collection')->name('collection');
Route::get('/orders', 'RetailerController@orders')->name('orders');
Route::get('/retailerorder/{id}', 'RetailerOrderController@retailerorder')->name('retailerorder');
Route::get('/retailerOrderDel/{id}', 'OrderController@retailerOrderDel')->name('retailerOrderDel');
Route::get('/OrderDel/{id}', 'OrderController@OrderDel')->name('OrderDel');
Route::get('/retailer_del_order/{id}', 'RetailerController@retailer_del_order')->name('retailer_del_order');
Route::get('/cat_detail/{id}', 'RetailerController@cat_detail')->name('cat_detail');
Route::get('/product_search', 'RetailerOrderController@product_search')->name('product_search');
Route::get('/eway', 'RetailerOrderController@eway')->name('eway');
Route::get('/upload_real', 'RetailerController@upload_real')->name('upload_real');
Route::post('/bride_send', 'RetailerController@bride_send')->name('bride_send');
Route::get('/del_real_data/{id}', 'RetailerController@del_real_data')->name('del_real_data');
Route::get('/del_wedding/{id}', 'RetailerController@del_wedding')->name('del_wedding');
Route::get('/retailerOrderView/{id}', 'OrderController@retailerOrderView')->name('retailerOrderView');
Route::get('/retailerOrderEdit/{id}', 'OrderController@retailerOrderEdit')->name('retailerOrderEdit');
Route::post('/status_sender', 'OrderController@status_sender')->name('status_sender');
Route::post('/sendorder', 'RetailerOrderController@sendorder')->name('sendorder');
Route::post('/update_item', 'RetailerOrderController@update_item')->name('update_item');
Route::post('/account', 'RetailerController@account')->name('account');
Route::post('/passwordUpdate', 'RetailerController@passwordUpdate')->name('passwordUpdate');
Route::get('/checkout', 'RetailerOrderController@checkout')->name('checkout');
Route::get('/remover/{id}', 'RetailerOrderController@remover')->name('remover');
// Route::post('/ewayresponse', 'RetailerOrderController@ewayResponse')->name('ewayresponse');
Route::post('/adminEmail', 'AdminController@adminEmail')->name('adminEmail');
Route::post('/adminPassword', 'AdminController@passwordUpdate')->name('adminPassword');
Route::get('/chat', 'ChatController@chat');
Route::post('/send_message', 'ChatController@send_message')->name('send_message');
//Website Routes
Route::get('/',  'PagesController@home' );
Route::get('/bridesmaids', 'PagesController@bridesmaids' );
Route::get('/contact','PagesController@contact' );
Route::get('/detail/{id}', 'PagesController@detail')->name('detail');
Route::get('/wedding_detail/{id}', 'PagesController@wedding_detail')->name('wedding_detail');
Route::get('/real', 'PagesController@real');
Route::get('/wedding', 'PagesController@wedding');
Route::get('/wherebuy',  'PagesController@index');
Route::get('/statepicker', 'PagesController@statepicker')->name('statepicker');
Route::get('/retailerstatepicker', 'PagesController@retailerstatepicker')->name('retailerstatepicker');
Route::get('/citypicker', 'PagesController@cityPicker')->name('citypicker');
Route::get('/retailercitypicker', 'PagesController@retailercitypicker')->name('retailercitypicker');
Route::post('/mapper', 'PagesController@mapper')->name('mapper');
Route::get('/order_success', 'RetailerOrderController@order_success');
Route::post('/feedback', 'PagesController@feedback')->name('feedback');
Route::get('/nav_collection/{id}', 'PagesController@nav_collection')->name('nav_collection');
Route::post ('/strip', 'RetailerOrderController@payment');
Route::get('/del_me/{id}', 'ChatController@del_me');
Route::get('/del_every/{id}', 'ChatController@del_every');
Route::get('/del_me_admin/{id}', 'ChatController@del_me_admin');
Route::get('/retailer_chat_del', 'ChatController@retailer_chat_del')->name('retailer_chat_del');
Route::get('/del_admin_chat/{id}', 'ChatController@del_admin_chat')->name('del_admin_chat');
Route::get('/qty_update/{id}/{status}', 'RetailerOrderController@qty_update')->name('qty_update');
Route::get('/edit_item/{id}', 'RetailerOrderController@edit_item')->name('edit_item');
Route::get('/edit_templete/{id}', 'EmailController@edit_templete')->name('edit_templete');
Route::get('/delete_templete/{id}', 'EmailController@delete_templete')->name('delete_templete');
Route::get('/retailer_mail', 'EmailController@retailer_mail')->name('retailer_mail');
Route::post('/send_email', 'EmailController@send_email')->name('send_email');
Route::post('/specific', 'EmailController@specific')->name('specific');
Route::post('/all_retailer_mail', 'EmailController@all_retailer_mail')->name('all_retailer_mail');
Route::post('/mail_all', 'EmailController@mail_all')->name('mail_all');
Route::post('/mail_reply', 'EmailController@mail_reply')->name('mail_reply');
Route::get('/location/{status}', 'PagesController@location')->name('location');
Route::get('/menu', 'AdminController@menu')->name('menu');
Route::get('/header/{id}/{value}', 'AdminController@header')->name('header');
Route::get('/footer/{id}/{value}', 'AdminController@footer')->name('footer');
Route::get('/newPage/{new}', 'CrmController@newPage')->name('newPage');
Route::get('/customPage', 'CrmController@customPage')->name('customPage');
Route::get('/real_request_list', 'pagerController@real_request_list')->name('real_request_list');
Route::get('/weds/{id}', 'pagerController@weds')->name('weds');
Route::post('/add_page', 'CrmController@add_page')->name('add_page');
Route::get('/del_page/{name}', 'CrmController@del_page')->name('del_page');
//New Page Edits Route
Route::post('/new1', 'CrmController@new1')->name('new1');
Route::post('/new2', 'CrmController@new2')->name('new2');
Route::post('/new3', 'CrmController@new3')->name('new3');
Route::post('/new4', 'CrmController@new4')->name('new4');
Route::post('/new5', 'CrmController@new5')->name('new5');
Route::post('/new6', 'CrmController@new6')->name('new6');
Route::post('/new7', 'CrmController@new7')->name('new7');
Route::post('/new8', 'CrmController@new8')->name('new8');
Route::post('/new9', 'CrmController@new9')->name('new9');
Route::post('/new10', 'CrmController@new10')->name('new10');
Route::post('/new11', 'CrmController@new11')->name('new11');
Route::post('/new12', 'CrmController@new12')->name('new12');
Route::post('/new13', 'CrmController@new13')->name('new13');
Route::post('/new14', 'CrmController@new14')->name('new14');
Route::post('/new15', 'CrmController@new15')->name('new15');
Route::post('/new16', 'CrmController@new16')->name('new16');
Route::post('/new17', 'CrmController@new17')->name('new17');
Route::post('/new18', 'CrmController@new18')->name('new18');
Route::post('/new19', 'CrmController@new19')->name('new19');
Route::post('/new20', 'CrmController@new20')->name('new20');
Route::post('/new21', 'CrmController@new21')->name('new21');
Route::post('/new22', 'CrmController@new22')->name('new22');
Route::post('/new23', 'CrmController@new23')->name('new23');
Route::post('/new24', 'CrmController@new24')->name('new24');
Route::post('/new25', 'CrmController@new25')->name('new25');
Route::post('/new26', 'CrmController@new26')->name('new26');
Route::post('/new27', 'CrmController@new27')->name('new27');
Route::post('/new28', 'CrmController@new28')->name('new28');
Route::post('/new29', 'CrmController@new29')->name('new29');
Route::post('/new30', 'CrmController@new30')->name('new30');
Route::post('/new31', 'CrmController@new31')->name('new31');
Route::post('/video', 'CrmController@video')->name('video');
Route::post('/video_home', 'CrmController@video_home')->name('video_home');
Route::get('/custom_page/{name}', 'CrmController@custom_page')->name('custom_page');
Route::get('/retailer_wedding', 'RetailerController@retailer_wedding')->name('retailer_wedding');
Route::post('/wedding_send', 'RetailerController@wedding_send')->name('wedding_send');
