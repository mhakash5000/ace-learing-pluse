<?php


use App\Http\Controllers\Backend\AboutController;
use App\Http\Controllers\Backend\NewsController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Http\Controllers\Backend\ContactController;
use App\Http\Controllers\Backend\LogoController;
use App\Http\Controllers\Backend\OrderController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\CustomerController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;



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

// Route::get('/sign-in', function () {
//     return redirect()->route('login');
// });


Auth::routes();



Route::get('/',[FrontendController::class,'index']);
Route::get('/home', [HomeController::class, 'index'])->name('home');
// email notification route to user
// Route::get('send',[HomeController::class,'SendNotification'])->name('send');

//__frontend page routes start from here__//
// Route::get('/',[FrontendController::class,'index']);
Route::get('/about-us',[FrontendController::class,'AboutUs'])->name('about.us');
Route::get('/contact-us',[FrontendController::class,'contactUs'])->name('contact.us');
Route::get('/our-team',[FrontendController::class,'OurTeam'])->name('our.team');
Route::get('/news',[FrontendController::class,'News'])->name('news');
Route::get('/news/details/{slug}',[FrontendController::class,'NewsDetails'])->name('news.details');
Route::get('/career',[FrontendController::class,'Career'])->name('career');
Route::get('/team-member-description/{slug}',[FrontendController::class,'TeamMemberDescription'])->name('team.member.description');
Route::get('/category-details/{slug}',[FrontendController::class,'CategoryDetails'])->name('category.details');
Route::get('/sub-cat-details/{slug}',[FrontendController::class,'SubCatDetails'])->name('sub.cat.details');


//tuition routes
Route::get('/home-schooling',[FrontendController::class,'HomeSchooling'])->name('home.schooling');
Route::get('/science-tuition',[FrontendController::class,'ScienceTuition'])->name('science.tuition');
Route::get('/math-english-tuition',[FrontendController::class,'MathEnglishTuition'])->name('math.english.tuition');
Route::get('/eleven-pluse-tuition',[FrontendController::class,'ElevenPluseTuition'])->name('eleven.pluse.tuition');
Route::get('/entrepreneur-workshop',[FrontendController::class,'EntrepreneurWorkshop'])->name('entrepreneur.workshop');
Route::get('/brain-training',[FrontendController::class,'BrainTraining'])->name('brain.training');
Route::get('/product',[FrontendController::class,'AllProduct'])->name('all.product');
Route::get('/blog',[FrontendController::class,'Blog'])->name('blog');

Route::get('/category',[FrontendController::class,'']);

// user contact store route
Route::post('/contact-store',[FrontendController::class,'ContactStore'])->name('contact.store');

// customer information route
Route::post('/customer-store',[CustomerController::class,'customerStore'])->name('customer.store');
Route::get('/customer-order',[CustomerController::class,'customerOrder'])->name('customer.order');

//shopping cart routes
Route::get('/product-details/{slug}',[CartController::class,'productDetails'])->name('product-details');
Route::post('/add-to-cart',[CartController::class,'addToCart'])->name('insert.cart');
Route::get('/show-cart',[CartController::class,'showCart'])->name('show.cart');
Route::post('/update-cart',[CartController::class,'updateCart'])->name('update.cart');
Route::get('/checkout-cart',[CartController::class,'checkOut'])->name('checkout.cart');
Route::get('/delete-cart/{rowId}',[CartController::class,'deleteCart'])->name('delete.cart');



//__frontend page routes end from here__//

//__backend page routes start from here__//
Route::group(['middleware' => ['test']], function () {
Route::prefix('users')->group(function () {
Route::get('/send/email',[HomeController::class,'SendEmail'])->name('users.send.email');
Route::get('/all',[UserController::class,'index'])->name('users.all');
Route::get('/create',[UserController::class,'create'])->name('users.create');
Route::post('/store',[UserController::class,'store'])->name('users.store');
Route::get('/edit/{id}',[UserController::class,'edit'])->name('users.edit');
Route::post('/update/{id}',[UserController::class,'update'])->name('users.update');
Route::get('/destroy/{id}',[UserController::class,'destroy'])->name('users.destroy');
Route::get('/change-password',[ProfileController::class,'ChangePassword'])->name('change.password');
Route::post('/update-password',[ProfileController::class,'UpdatePassword'])->name('update.password');

});

// // Profile Routes start from here
// Route::prefix('profile')->group(function () {
// Route::get('/user',[UserController::class,'index'])->name('profile.user');
// Route::post('/store',[UserController::class,'store'])->name('profile.store');
// Route::get('/edit',[UserController::class,'edit'])->name('profile.edit');
// Route::post('/update',[UserController::class,'update'])->name('profile.update');
// Route::get('/change-password',[ProfileController::class,'ChangePassword'])->name('change.password');
// Route::post('/update-password',[ProfileController::class,'UpdatePassword'])->name('update.password');
// });


//Logo routes start from here
Route::prefix('logos')->group(function () {
Route::get('/view',[LogoController::class,'index'])->name('logos.view');
Route::get('/create',[LogoController::class,'create'])->name('logos.create');
Route::post('/store',[LogoController::class,'store'])->name('logos.store');
Route::get('/edit/{id}',[LogoController::class,'edit'])->name('logos.edit');
Route::post('/update/{id}',[LogoController::class,'update'])->name('logos.update');
Route::get('/destroy/{id}',[LogoController::class,'destroy'])->name('logos.destroy');

});

//sliders routes start from here
Route::prefix('sliders')->group(function () {
Route::get('/view',[SliderController::class,'index'])->name('sliders.view');
Route::get('/create',[SliderController::class,'create'])->name('sliders.create');
Route::post('/store',[SliderController::class,'store'])->name('sliders.store');
Route::get('/edit/{id}',[SliderController::class,'edit'])->name('sliders.edit');
Route::post('/update/{id}',[SliderController::class,'update'])->name('sliders.update');
Route::get('/destroy/{id}',[SliderController::class,'destroy'])->name('sliders.destroy');
});


//contacts routes start from here
Route::prefix('contacts')->group(function () {
Route::get('/view',[ContactController::class,'index'])->name('contacts.view');
Route::get('/create',[ContactController::class,'create'])->name('contacts.create');
Route::post('/store',[ContactController::class,'store'])->name('contacts.store');
Route::get('/edit/{id}',[ContactController::class,'edit'])->name('contacts.edit');
Route::post('/update/{id}',[ContactController::class,'update'])->name('contacts.update');
Route::get('/destroy/{id}',[ContactController::class,'destroy'])->name('contacts.destroy');
});

//__ about routes start from here __//
Route::prefix('about')->group(function () {
Route::get('/view',[AboutController::class,'index'])->name('about.view');
Route::get('/create',[AboutController::class,'create'])->name('about.create');
Route::post('/store',[AboutController::class,'store'])->name('about.store');
Route::get('/edit/{id}',[AboutController::class,'edit'])->name('about.edit');
Route::post('/update/{id}',[AboutController::class,'update'])->name('about.update');
Route::get('/destroy/{id}',[AboutController::class,'destroy'])->name('about.destroy');
//__ Team routes start from here __//

//__ News routes start from here __//
Route::get('news/view',[NewsController::class,'index'])->name('about.news.view');
Route::get('news/create',[NewsController::class,'create'])->name('about.news.create');
Route::post('news/store',[NewsController::class,'store'])->name('about.news.store');
Route::get('news/pdf/{id}',[NewsController::class,'viewPdf'])->name('about.news.pdf');
Route::get('news/edit/{id}',[NewsController::class,'edit'])->name('about.news.edit');
Route::post('news/update/{id}',[NewsController::class,'update'])->name('about.news.update');
Route::get('news/destroy/{id}',[NewsController::class,'destroy'])->name('about.news.destroy');

});

//category routes start from here__//
Route::prefix('categories')->group(function () {
Route::get('/view',[CategoryController::class,'index'])->name('categories.view');
Route::get('/create',[CategoryController::class,'create'])->name('categories.create');
Route::post('/store',[CategoryController::class,'store'])->name('categories.store');
Route::get('/edit/{id}',[CategoryController::class,'edit'])->name('categories.edit');
Route::post('/update/{id}',[CategoryController::class,'update'])->name('categories.update');
Route::get('/destroy/{id}',[CategoryController::class,'destroy'])->name('categories.destroy');
//sub-category routes start from here__//
Route::get('/sub/view',[SubCategoryController::class,'index'])->name('sub.categories.view');
Route::get("/sub/get", [SubCategoryController::class, 'get_sub_cat'])->name('single.subcategory');
Route::get('/sub/create',[SubCategoryController::class,'create'])->name('sub.categories.create');
Route::post('/sub/store',[SubCategoryController::class,'store'])->name('sub.categories.store');
Route::get('/sub/edit/{id}',[SubCategoryController::class,'edit'])->name('sub.categories.edit');
Route::post('/sub/update/{id}',[SubCategoryController::class,'update'])->name('sub.categories.update');
Route::get('/sub/destroy/{id}',[SubCategoryController::class,'destroy'])->name('sub.categories.destroy');
});


});

//product routes start from here__//
Route::prefix('products')->group(function () {
Route::get('/view',[ProductController::class,'index'])->name('products.view');
Route::get('/create',[ProductController::class,'create'])->name('products.create');
Route::post('/store',[ProductController::class,'store'])->name('products.store');
Route::get('/edit/{id}',[ProductController::class,'edit'])->name('products.edit');
Route::get('/details/{slug}',[ProductController::class,'details'])->name('products.details.info');
Route::post('/updated/{id}',[ProductController::class,'update'])->name('products.update');
Route::get('/destroy/{id}',[ProductController::class,'destroy'])->name('products.destroy');
});

//order routes start from here__//
Route::prefix('orders')->group(function () {
Route::get('/view',[OrderController::class,'customerOrder'])->name('orders.view');
Route::get('/details/{id}',[OrderController::class,'customerOrderDetails'])->name('orders.details');
Route::get('/destroy/{id}',[OrderController::class,'orderDestroy'])->name('orders.destroy');
});
    

//User Email route for admin panel
Route::prefix('email')->group(function () {
Route::get('user-email.view',[FrontendController::class,'UserEmailView'])->name('user-email.view');
Route::get('/user-email.destroy/{id}',[FrontendController::class,'destroy'])->name('user-email.destroy');
});

// group middleware End here


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
