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

Route::get('/', function () {
    return view('welcome');
});




route::post('/save-project', 'admincontroller@project');

route::post('/save-blog', 'admincontroller@blog');

route::post('/get-review-link', 'admincontroller@link');

route::post('/link-validate', 'admincontroller@Lvalidate');

route::post('/leave-review', 'admincontroller@review');

route::post('/contact', 'admincontroller@contact');

route::post('/subscribe', 'admincontroller@subscribe');

route::post('/update', 'admincontroller@update');

route::post('/update-blog', 'admincontroller@update_blog');

route::post('/destroy', 'admincontroller@destroy');

route::post('/destroy-blog', 'admincontroller@destroy_blog');

route::post('/like', 'admincontroller@like');


route::get('/blog-count', 'admincontroller@bcount');

route::get('/proj-count', 'admincontroller@pcount');

route::get('/contact-count', 'admincontroller@ccount');

route::get('/sub-count', 'admincontroller@scount');





//resources
route::get('/project-content', 'admincontroller@projectres');
route::get('/blog-content', 'admincontroller@blogres');
route::get('/all-project-content', 'admincontroller@Allprojectres');
route::get('/on-project-content', 'admincontroller@Onprojectres');
route::get('/off-project-content', 'admincontroller@Offprojectres');
route::get('/review-content', 'admincontroller@reviewres');
route::get('/read-blog', 'admincontroller@blogreadres');
route::get('/post-category/{type}', 'admincontroller@categoryres');
route::get('/single-blog/{title}/{id}', 'admincontroller@singleres');

//search
route::get('/search-blog/{query}', 'admincontroller@blogsearchres');

//excel
Route::get('/downloadExcel', 'admincontroller@downloadExcel');


//Auth
Route::post('/admin-register', 'customauthcontroller@reg');
Route::post('/admin-login', 'customauthcontroller@login');

Route::get('/{vue_capture?}', function () {
    return view('welcome');
  })->where('vue_capture', '[\/\w\.-]*');