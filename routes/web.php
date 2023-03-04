<?php

use App\Mail\userregister;
use Illuminate\Support\Facades\Mail;


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

Route::group(['middleware' => 'maintainaces'], function () {


});

Route::get('maintainaces', function () {
    if (settings()->status == 'open') {
        return redirect('index ');
    }

    return view('forentend.maintainaces.maintainaces');


});


Route::get('testmail', function () {

    //App\Jobs\SendMailjob::dispatch();


    $Jobs = (new App\Jobs\SendMailjob)->delay(\Carbon\Carbon::now()->addSeconds(1));
    dispatch($Jobs);


    return 'done';


});

Route::get('testmail2', function () {


    return view('testmail');


});


Route::get('email-test', function () {


    $details['email'] = 'mohamedchi2013@gmail.com';


    dispatch(new App\Jobs\SendEmailJob($details));


    dd('done');

});


Auth::routes();

//////////////// weblesson toutrial

Route::get('ajaxdata', 'AjaxdataController@index')->name('ajaxdata');
Route::get('ajaxdata/getdata', 'AjaxdataController@getdata')->name('ajaxdata.getdata');

Route::post('ajaxdata/postdata', 'AjaxdataController@postdata')->name('ajaxdata.postdata');

Route::get('ajaxdata/fetchdata', 'AjaxdataController@fetchdata')->name('ajaxdata.fetchdata');
Route::get('ajaxdata/removedata', 'AjaxdataController@removedata')->name('ajaxdata.removedata');
Route::get('ajaxdata/massremove', 'AjaxdataController@massremove')->name('ajaxdata.massremove');

//////////
Route::get('/dynamic_dependent', 'DynamicDependent@index');

Route::post('dynamic_dependent/fetch', 'DynamicDependent@fetch')->name('dynamicdependent.fetch');

Route::post('country/insertttt', 'DynamicDependent@insert')->name('country.insert');
///////////

Route::get('/email_available', 'EmailAvailable@index');

Route::post('/email_available/check', 'EmailAvailable@check')->name('email_available.check');

/////////////////
Route::get('/live_search', 'LiveSearch@index');
Route::get('/live_search/action', 'LiveSearch@action')->name('live_search.action');


/////////////////////////////////

Route::get('/export_excel', 'ExportExcelController@index');

Route::get('/export_excel/excel', 'ExportExcelController@excel')->name('export_excel.excel');

//////////////////////////

//  using   mysql database
Route::get('/autocomplete', 'AutocompleteController@index');
Route::post('/autocomplete/fetch', 'AutocompleteController@fetch')->name('autocomplete.fetch');

////////////////////
Route::get('/dynamic_pdf', 'DynamicPDFController@index');

Route::get('/dynamic_pdf/pdf', 'DynamicPDFController@pdf');
///////////////////////////
Route::get('/laravel_google_chart', 'LaravelGoogleGraph@index');

///////////////////////////////////

/////////////////////////////////////

Route::get('/ajax_upload', 'AjaxUploadController@index');

Route::post('/ajax_upload/action', 'AjaxUploadController@action')->name('ajaxupload.action');
////////////////////////////
Route::get('/sendemail', 'SendEmailController@index');
Route::post('/sendemail/send', 'SendEmailController@send');
///////////////////////////////////////////
Route::get('/pagination', 'PaginationController@index');

Route::get('/pagination/fetch_data', 'PaginationController@fetch_data');
///////////////////////////////////////
Route::get('/livetable', 'LiveTable@index');
Route::get('/livetable/fetch_data', 'LiveTable@fetch_data');
Route::post('/livetable/add_data', 'LiveTable@add_data')->name('livetable.add_data');
Route::post('/livetable/update_data', 'LiveTable@update_data')->name('livetable.update_data');
Route::post('/livetable/delete_data', 'LiveTable@delete_data')->name('livetable.delete_data');
///////////////////////////////////////////////////
Route::get('/import_excel', 'ImportExcelController@index');
Route::post('/import_excel/import', 'ImportExcelController@import');

///////////////////////////
Route::get('dynamic-field', 'DynamicFieldController@index');

Route::post('dynamic-field/insert', 'DynamicFieldController@insert')->name('dynamic-field.insert');


// Route::post('postverfiy','verfiycontroller@postverfiy');

Route::get('M_V_L_R_get_register', 'M_V_L_R@get_register');
Route::post('M_V_L_R_post_register', 'M_V_L_R@post_register');

Route::get('verify', 'M_V_L_R@getverfiy');
Route::post('postverfiy', 'M_V_L_R@postverfiy');


Route::get('M_V_get_Login', 'M_V_L_R@M_V_get_Login');
Route::post('M_V_post_Login', 'M_V_L_R@M_V_post_Login');

Route::get('user_logout', 'M_V_L_R@user_logout_fun');


Route::group(['middleware' => 'diny'], function () {


});


Route::get('/index', 'homeForentEndController@index');
Route::get('/productes', 'homeForentEndController@productes');

Route::get('/', 'homeForentEndController@index');

Route::get('/home', 'homeForentEndController@main');
Route::get('/en', 'homeForentEndController@en');


Route::get('/About ', 'AboutController@About');
Route::get('/VisionMission ', 'AboutController@VisionMission');
Route::get('/Values ', 'AboutController@Values');

Route::get('/feature ', 'AboutController@feature');
Route::get('/pricing ', 'AboutController@pricing');
Route::get('/testimonials ', 'AboutController@testimonials');

 
//Route::resource('posts','AboutController');
//Route::get('/posts/{code}', [ 'as'=>'post-show', 'uses'=>'AboutController@show']);


Route::get('/Objectives ', 'AboutController@Objectives');
Route::get('/Objectives/{id}', 'AboutController@viewphotoObjectives');


Route::get('/ourTeam ', 'AboutController@ourTeam');


Route::get('/Services ', 'ServicesController@Services');
Route::get('/sections ', 'sectionsController@index');


Route::get('/Services/{id}', 'ServicesController@getpen');
Route::get('/pen/{id}/{dep}', 'ServicesController@pen');

Route::get('/pen/{id}', 'ServicesController@pencat');


Route::get('/Ourworks ', 'Ourworksforentcontrller@Ourworks');
Route::get('/FAQs ', 'FAQsforentcontrller@FAQs');
Route::get('/contact', 'contactforentcontrller@contact');
Route::get('/SignIn', 'SignInforentcontrller@SignIn');
Route::get('/registration', 'registrationforentcontrller@registration');

Route::post('/Sendcontact ', 'contactforentcontrller@Sendcontact');
Route::get('/newess', 'newesforentcontrller@newes');

Route::get('blog', 'newesforentcontrller@publicBlog');

//Route::get('blog/{id}', 'newesforentcontrller@show')->middleware('auth');
Route::get('blog/{id}', 'newesforentcontrller@show');

Route::get('blog/user/{id}', 'newesforentcontrller@show');
Route::get('projects/{id}', 'newesforentcontrller@projects');

Route::group(['prefix' => '', 'namespace' => 'forentend'], function () {
    Route::get('/shop', 'ShopController@index')->name('shop.index');

    Route::get('/shop/{id}', 'ShopController@show')->name('shop.show');

});

Route::get('user_forgot_password', 'M_V_L_R@forgot_password');

Route::post('user_reset_pass', 'M_V_L_R@reset_pass');

Route::get('user_reset_pass_add_new/{token}', 'M_V_L_R@user_reset_pass_add_new_get');
Route::post('user_reset_pass_add_new_post/{token}', 'M_V_L_R@admin_reset_pass_add_new_post');


Route::get('Email_verfiy/{token}', 'M_V_L_R@Email_verfiy');

Route::get('shopPage', 'shopPageController@index');


Route::post('addcomment/{post}', 'BlogController@addComment')->name('comment.add');


Route::get('rrrrrrrrrrr', 'admin@index');


use App\User;
use App\Http\Resources\UserCollection;


Route::resource('API', 'API');
// Route::delete('API/{id}','API@destroy');


// route for processing payment
Route::post('paypal', 'PaymentController@payWithpaypal');

// route for check status of the payment
Route::get('status', 'PaymentController@getPaymentStatus');


Route::get('login/{provider}', 'Auth\LoginController@redirectToProvider');
Route::get('login/{provider}/callback', 'Auth\LoginController@handleProviderCallback');


Route::get('image/{filename}', 'homeForentEndController@displayImage')->name('image.displayImage');

Route::get('image-upload', 'ImageUploadController@imageUpload')->name('image.upload');

Route::post('image-upload', 'ImageUploadController@imageUploadPost')->name('image.upload.post');


Route::get('/language/{lang}', function ($lang) {
    \App::setLocale($lang);
    //storing the locale in session to get it back in the middleware
    session()->put('lang', $lang);
    return redirect()->back();
});

Route::get('/profile','homeForentEndController@profile')->middleware('auth');
Route::post('/profile','homeForentEndController@updateProfile')->name('update-profile')->middleware('auth');

Route::get('delete-comment/{id}','BlogController@deleteComment')->name('comment.delete')->middleware('auth');
Route::get('edit-comment/{id}','BlogController@editComment')->name('comment.edit')->middleware('auth');
Route::put('update-comment/{id}','BlogController@updateComment')->name('comment.update')->middleware('auth');

Route::get('user_custom_logout', function () {
    auth()->logout();
    return redirect()->back();
});




  Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('cache:clear');
    $exitCode = Artisan::call('config:clear');
    return 'Application cache cleared';
});

Route::get('/Storage-Linked', function () {
    \Illuminate\Support\Facades\Artisan::call('storage:link');
    return 'Storage Linked';
});






Route::get('/linkstorage', function () {
    Artisan::call('storage:link');

    return 'linkstorage';
    
});