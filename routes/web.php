<?php

use App\Http\Controllers\AboutSectionController;
use App\Http\Controllers\BannerSectionController;
use App\Http\Controllers\FooterServiceCategoryController;
use App\Http\Controllers\FooterServiceController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\GeneralController;
use App\Http\Controllers\HireSectionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\PortfolioSectionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ServiceItemController;
use App\Http\Controllers\SliderSectionController;
use App\Http\Controllers\SubmenuController;
use App\Http\Controllers\TestimonialSectionController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();


Route::get('/', [FrontController::class, 'home'])->name('home');
;
  
Route::group(['prefix' => 'admin','middleware' => ['auth']], function() {
	Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');
	Route::resource('roles', RoleController::class);
	Route::resource('users', UserController::class);
	Route::resource('permissions', PermissionController::class);

	Route::match(['get','post'],'header', [SliderSectionController::class,'header'])->name('header');
	Route::match(['get','post'],'about-us', [AboutSectionController::class,'about'])->name('about.us');
	Route::resource('services', ServiceController::class);
	Route::resource('products-and-services', ServiceItemController::class);
	Route::match(['get','post'],'/services-heading', [ServiceController::class,'service_heading'])->name('service.heading');
	Route::resource('banner', BannerSectionController::class);
	Route::resource('portfolio', PortfolioSectionController::class);
	Route::match(['get','post'],'/portfolio-heading', [PortfolioSectionController::class,'portfolio_heading'])->name('portfolio.heading');
	Route::resource('testimonial', TestimonialSectionController::class);
	Route::match(['get','post'],'/testimonial-heading', [TestimonialSectionController::class,'testimonial_heading'])->name('testimonial.heading');
	Route::resource('hire', HireSectionController::class);
	Route::resource('newsletter', NewsletterController::class);
	Route::resource('footerlinkcategory', FooterServiceCategoryController::class);
	Route::resource('footerlink', FooterServiceController::class);
	Route::resource('general', GeneralController::class);
	Route::resource('menus', MenuController::class);
	Route::resource('submenus', SubmenuController::class);

});
