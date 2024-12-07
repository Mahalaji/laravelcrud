<?php
use App\Http\Controllers\Auth\LogoutController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User;
use App\Http\Controllers\blogs;
use App\Http\Controllers\newss;


Route::get('/', function () {
    return view('welcome');
});
Route::view('/register','register');
Route::post('/adduser',[User::class,'adduser']);
Route::view('/login','login');
Route::post('/loginvalidation',[User::class,'loginvalidation']);
Route::view('/dashboard','dashboard');
Route::view('/profile','profile');
Route::view('/profileupdate','profileupdate');
Route::post('/updateprofile',[User::class,'updateprofile']);
Route::view('/changeadminpass','adminpassword');
Route::post('/adminpassword',[User::class,'adminpassword']);
Route::get('/logout', [LogoutController::class, 'logout']);
Route::view('/users','users');
Route::post('/getUsersAjax', [User::class, 'getUsersAjax']);
Route::get('/edit-user/{id}', [User::class, 'edituser']);
Route::post('/updateuserdetails', [User::class, 'updateuserdetails']);
Route::post('/delete-user/{id}', [User::class, 'deleteuser']);

Route::get('/blogadd', [blogs::class, 'seo_title']);
Route::post('/addblog',[blogs::class,'addblog']);
Route::view('/bloglist','blog');
Route::post('/getBlogsAjax', [blogs::class, 'getBlogsAjax']);
Route::get('/edit/{id}', [blogs::class, 'edit']);
Route::post('/update',[blogs::class,'update']);
Route::post('/destory/{id}', [blogs::class, 'destory']);
Route::view('/blogcategorylist','blogcategorylist');
Route::post('/getBlogsCategoryAjax', [blogs::class, 'getBlogsCategoryAjax']);
Route::view('/blogcategoryadd','blogcategoryadd');
Route::post('/addcategery',[blogs::class,'addcategery']);
Route::post('/destorycategory/{id}', [blogs::class, 'destorycategory']);
Route::get('/editcategory/{id}', [blogs::class, 'editcategory']);
Route::post('/updatecategery',[blogs::class,'updateCategory']);

Route::get('/newsadd', [newss::class, 'seo_title']);
Route::post('/createnews',[newss::class,'createnews']);
Route::view('/indexnews','newslist');
Route::post('/getNewsAjax', [newss::class, 'getNewsAjax']);
Route::get('/editnews/{id}', [newss::class, 'editnews']);
Route::post('/updatenews',[newss::class,'updatenews']);
Route::post('/destorynews/{id}', [newss::class, 'destorynews']);
Route::view('/indexnewscategory','newscategorylist');
Route::post('/getNewsCategoryAjax', [newss::class, 'getNewsCategoryAjax']);
Route::view('/newscategoryadd','newscategoryadd');
Route::post('/createnewscategory',[newss::class,'createnewscategory']);
Route::get('/editnewscategory/{id}', [newss::class, 'editnewscategory']);
Route::post('/updatenewscategery',[newss::class,'updatenewscategery']);
Route::post('/destorynewscategory/{id}', [newss::class, 'destorynewscategory']);































