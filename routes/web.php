<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\adding_blog;
use Illuminate\Support\Facades\DB;
use App\Models\like;
use App\Models\comment;

use Illuminate\Support\Facades\Mail; ///use this class to send mail
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
####################################
 require __DIR__.'/auth.php';

 
// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/', function () {
//     return view('dashboard');
// })->middleware(['check_user','auth'])->name('dashboard');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');
//////////////////dashoard to user

Route::get('/dashboard/user', function () {
    return view('dashboard.User.dashboard');
})->middleware(['auth'])->name('dashboard.user');

Route::get('/dashboard/admin', function () {
    return view('dashboard.Admin.dashboard');
})->middleware(['auth:admin'])->name('dashboard.admin');

/////////////////////////this route to go to home page


// Route::get('/home', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('home');
Route::get('/home', function () {
   return view('dashboard');
    
})->name('home');

/////////////////////////



Route::get('/display',[App\Http\Controllers\mm::class,'display'])->middleware(['auth'])->name('display');
Route::get('/upload',[App\Http\Controllers\mm::class,'insert_blog'])->name('upload');
Route::post('/insert',[App\Http\Controllers\mm::class,'new_blog'])->name('insert');
Route::get('/show',[App\Http\Controllers\mm::class,'show'])->middleware(['auth'])->name('show');
Route::delete('/delete/{id}',[App\Http\Controllers\mm::class,'delete_blog'])->middleware(['auth'])->name('delete');
Route::get('/update/{id}',[App\Http\Controllers\mm::class,'update_page'])->name('update');
Route::post('/update_info/{id}',[App\Http\Controllers\mm::class,'update_info_blog'])->middleware(['auth'])->name('update_info');
Route::get('/dashboard',[App\Http\Controllers\mm::class,'dashboard'])->middleware(['auth'])->name('dashboard');
Route::get('/myblogs',[App\Http\Controllers\mm::class,'my_blogs'])->name('myblogs');
############################### This pages for Admin here we check if the user is admin to redirect to the page

// Route::get('/allblogs',[App\Http\Controllers\mm::class,'all_blogs'])->name('allblogs');
// Route::get('/adminblog',[App\Http\Controllers\mm::class,'all_blogs'])->middleware(['auth'])->name('admin.blog.admin');
Route::get('/allblogs',[App\Http\Controllers\mm::class,'all_blogs'])->name('allblogs');


Route::get('/editblog',[App\Http\Controllers\mm::class,'edit_blogs'])->name('editblogs');




############################### 
Route::get('/deleteall',[App\Http\Controllers\mm::class,'delete_alla_blogs'])->middleware(['auth'])->name('deleteAll');
Route::get('/editblog',[App\Http\Controllers\mm::class,'edit_blogs'])->name('admindashboard');
Route::get('/do',[App\Http\Controllers\mm::class,'search'])->middleware(['auth'])->name('doshow');

#########################################admin route #################
 //Route::get('/allblogs',[App\Http\Controllers\mm::class,'admin_all_blogs'])->name('allblogs');




///////////////############################## LOG OUT ##############################################
Route::post('/logout/admin',function(Request $request){////to log out from all admin and user
 Auth::guard('admin')->logout();
 Auth::guard('web')->logout();
        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
})->name('logout.admin');
//////#######################################

Route::get('/showblog',[App\Http\Controllers\mm::class, 'blog_comments'])->name('show.all.blog');////to log out from all admin and user
    
  

   Route::get('liked/{id}',[App\Http\Controllers\mm::class,'like']);
   Route::get('disliked/{id}',function ($id){
    $post=DB::table('likes')->where('post_id','=',$id)->where('user_id','=',Auth::user()->id)->delete();
    return back();
   });

   ##################
   Route::post('/comments', [App\Http\Controllers\mm::class, 'store_comments'])->name('comments.store');
Route::get('/profile',function(){
return view('profile.show');
});

##################### send email


Route::get('/send',[App\Http\Controllers\mm::class, 'sent_email'])->name('sent_email');
################### for read all notification
Route::get('/readNote/{id}',  [App\Http\Controllers\mm::class, 'notification_read'])->name('blog.read');
Route::get('/deleteAllnotes',  [App\Http\Controllers\mm::class, 'make_all_notification'])->name('notification.all.read');


