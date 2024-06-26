<?php

use App\Http\Controllers\AdvertiseController;
// use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\ProtfolioController;
// use App\Http\Controllers\Backend\ReviewController;
use App\Http\Controllers\Backend\TeamController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
// use App\Http\Controllers\ContactController;
use App\Http\Controllers\ContactRequestController;
use App\Http\Controllers\DealerController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\HadithCategoryController;
use App\Http\Controllers\HadithController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\OfferController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PrayerTimeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QuidaController;
use App\Http\Controllers\QuranController;
use App\Http\Controllers\SiteSettingController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\SubscriberController;
// use App\Http\Controllers\VerificationAttemptsController;
use App\Http\Controllers\VideoController;
use App\Models\ContactRequest;
use App\Models\SiteSettings;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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
// bd@777
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/shop/{category:slug?}', [FrontendController::class, 'shop'])->name('shop');
Route::get('/career', [FrontendController::class, 'career'])->name('career');
Route::get('/prayer-time', [PrayerTimeController::class, 'prayerTime'])->name('prayerTime');
Route::get('/al-quran', [QuranController::class, 'quran'])->name('quran');
Route::get('/post/{post:slug}', [PostController::class, 'details'])->name('post.details');
Route::get('/news/{news:slug}', [NewsController::class, 'details'])->name('news.details');
Route::get('/get-advertise', [PostController::class, 'advertise'])->name('news.advertise');

// Route::get('/i-am-feeling', [FrontendController::class, 'iAmFeeling'])->name('iAmFeeling');
// Route::get('/99-names-of-allah', [FrontendController::class, 'NamesOfAllah'])->name('iAmFeeling');
// Route::get('/dua-dhikir', [FrontendController::class, 'duaDhikir'])->name('duaDhikir');
Route::get('/privacy-policy', [FrontendController::class, 'privacyPolicy'])->name('privacyPolicy');

Route::get('/qaida', [FrontendController::class, 'qaida'])->name('qaida');
Route::get('/about', [FrontendController::class, 'about'])->name('about');
Route::get('/faq', [FrontendController::class, 'faq'])->name('faq');
Route::get('/contact', [FrontendController::class, 'contact'])->name('contact');
Route::get('/donate', [FrontendController::class, 'donate'])->name('donate');

Route::get('/services', [FrontendController::class, 'services'])->name('services');
Route::get('/portfolios', [FrontendController::class, 'portfolios'])->name('portfolios');
Route::get('/gallery', [FrontendController::class, 'gallery'])->name('gallery');

Route::post('/save-contact', [FrontendController::class, 'saveContact'])->name('saveContact');
// Route::post('application', [ApplicationController::class, 'store'])->name('admin.application.store');
Route::get('details/{slug}', [FrontendController::class, 'product_details'])->name('product_details');
// Auth::routes();
Route::get('/master-admin-login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/master-admin-login', [LoginController::class, 'login'])->name('login');
Route::get('/admin-logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/service/{slug}', [FrontendController::class, 'serviceDetails'])->name('serviceDetails');

Route::post('/serce', [FrontendController::class, 'search'])->name('search');

// quran routes
Route::get('/surah/{edition}/{index}', [QuranController::class, 'getSura'])->name('getSura');

// frontend routes end

Route::post('/comment/post', [CommentController::class, 'saveComment'])->name('comment.add');

Route::get('/hadiths-collection', [FrontendController::class, 'hadithsCollectionRedirect'])->name('hadiths_collection_redirect');
Route::get('/hadiths/{id}/{slug}', [FrontendController::class, 'hadithsCollection'])->name('hadiths_collection');

Route::get('/{slug}', [FrontendController::class, 'categoryView'])->name('categoryView')->middleware('check.route.exists');
// backend routes
Route::group(['as' => 'admin.', 'prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    // Route::post('/seen', [ContactController::class, 'seenContact'])->name('seenContact');
    // Site Setting
    Route::get('site-settings', [SiteSettingController::class, 'index'])->name('site-setting.index');
    // Route::get('site-settings/create', [SiteSettingController::class, 'create'])->name('site-setting.create');
    // Route::post('site-settings/create', [SiteSettingController::class, 'store'])->name('site-setting.store');
    Route::get('site-settings/edit/{siteSetting:name}', [SiteSettingController::class, 'edit'])->name('site-setting.edit');
    Route::post('site-settings/edit/{id}', [SiteSettingController::class, 'update'])->name('site-setting.update');
    // Route::delete('site-settings/destroy/{id}', [SiteSettingController::class, 'destroy'])->name('site-setting.destroy');

    Route::resource('/books', BookController::class);
    
    // Categories
    Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
    Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
    Route::post('/categories/create', [CategoryController::class, 'store'])->name('categories.store');
    Route::post('/categories/short-update', [CategoryController::class, 'shortUpdate'])->name('categories.shortUpdate');
    Route::get('/categories/edit/{category}', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::post('/categories/edit/{category}', [CategoryController::class, 'update'])->name('categories.update');
    Route::delete('/categories/delete/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');
    // Quida
    Route::group(['as' => 'quidas.', 'prefix' => 'quidas'], function(){
        Route::get('/', [QuidaController::class, 'index'])->name('index');
        Route::get('/create', [QuidaController::class, 'create'])->name('create');
        Route::post('/store', [QuidaController::class, 'store'])->name('store');
        Route::get('/{quida}/edit', [QuidaController::class, 'edit'])->name('edit');
        Route::post('/{quida}/update', [QuidaController::class, 'update'])->name('update');
        Route::delete('/{quida}/delete', [QuidaController::class, 'delete'])->name('delete');
        Route::post('/short-update', [QuidaController::class, 'shortUpdate'])->name('shortUpdate');
    });
    // Video
    Route::group(['as' => 'videos.', 'prefix' => 'videos'], function(){
        Route::get('/', [VideoController::class, 'index'])->name('index');
        Route::get('/create', [VideoController::class, 'create'])->name('create');
        Route::post('/store', [VideoController::class, 'store'])->name('store');
        Route::get('/{video}/edit', [VideoController::class, 'edit'])->name('edit');
        Route::post('/{video}/update', [VideoController::class, 'update'])->name('update');
        Route::delete('/{video}/delete', [VideoController::class, 'delete'])->name('delete');
        Route::post('/short-update', [VideoController::class, 'shortUpdate'])->name('shortUpdate');
    });

    // Video
    Route::group(['as' => 'news.', 'prefix' => 'news'], function(){
        Route::get('/', [NewsController::class, 'index'])->name('index');
        Route::get('/create', [NewsController::class, 'create'])->name('create');
        Route::post('/store', [NewsController::class, 'store'])->name('store');
        Route::get('/{news}/edit', [NewsController::class, 'edit'])->name('edit');
        Route::post('/{news}/update', [NewsController::class, 'update'])->name('update');
        Route::delete('/{news}/delete', [NewsController::class, 'delete'])->name('delete');
        Route::post('/get-news-tags', [NewsController::class, 'getTags'])->name('getTags');
    });
    Route::group(['as' => 'advertise.', 'prefix' => 'advertise'], function(){
        Route::get('/', [AdvertiseController::class, 'index'])->name('index');
        Route::get('/create', [AdvertiseController::class, 'create'])->name('create');
        Route::post('/store', [AdvertiseController::class, 'store'])->name('store');
        Route::get('/{advertise}/edit', [AdvertiseController::class, 'edit'])->name('edit');
        Route::post('/{advertise}/update', [AdvertiseController::class, 'update'])->name('update');
        Route::delete('/{advertise}/delete', [AdvertiseController::class, 'delete'])->name('delete');
    });

    // Hadith categories
    Route::group(['as' => 'hadith_categories.', 'prefix' => 'hadith_categories'], function(){
        Route::get('/', [HadithCategoryController::class, 'index'])->name('index');
        Route::get('/create', [HadithCategoryController::class, 'create'])->name('create');
        Route::post('/store', [HadithCategoryController::class, 'store'])->name('store');
        Route::get('/{hadith_category}/edit', [HadithCategoryController::class, 'edit'])->name('edit');
        Route::post('/{hadith_category}/update', [HadithCategoryController::class, 'update'])->name('update');
        Route::post('/short-update', [HadithCategoryController::class, 'shortUpdate'])->name('shortUpdate');
        Route::delete('/{hadith_category}/delete', [HadithCategoryController::class, 'delete'])->name('delete');
    });
    // Hadith Collections
    Route::group(['as' => 'hadith_collections.', 'prefix' => 'hadith_collections'], function(){
        Route::get('/', [HadithController::class, 'index'])->name('index');
        Route::get('/create', [HadithController::class, 'create'])->name('create');
        Route::post('/store', [HadithController::class, 'store'])->name('store');
        Route::get('/{id}/edit', [HadithController::class, 'edit'])->name('edit');
        Route::post('/{id}/update', [HadithController::class, 'update'])->name('update');
        Route::delete('/{id}/delete', [HadithController::class, 'delete'])->name('delete');
    });

    // Hadith Collections
    Route::group(['as' => 'comments.', 'prefix' => 'comments'], function(){
        Route::get('/', [CommentController::class, 'index'])->name('index');
        Route::get('/active', [CommentController::class, 'active'])->name('active');
        Route::post('/{comment}/update', [CommentController::class, 'update'])->name('update');
        Route::post('/{comment}/delete', [CommentController::class, 'delete'])->name('delete');
    });

    // posts
    Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
    Route::get('/posts/{category:slug}/list-bycatagory', [PostController::class, 'listByCategory'])->name('posts.listByCategory');
    Route::get('/posts/{category:slug}/create-bycatagory', [PostController::class, 'createByCategory'])->name('posts.createByCategory');
    Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
    Route::post('/posts/store', [PostController::class, 'store'])->name('posts.store');
    Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');
    Route::post('/posts/{post}/update', [PostController::class, 'update'])->name('posts.update');
    Route::delete('/posts/{post}/delete', [PostController::class, 'delete'])->name('posts.delete');
    // Faqs
    Route::get('/faqs', [FaqController::class, 'index'])->name('faqs.index');
    Route::get('/faqs/create', [FaqController::class, 'create'])->name('faqs.create');
    Route::post('/faqs/create', [FaqController::class, 'store'])->name('faqs.store');
    Route::post('/faqs/edit/{faq}', [FaqController::class, 'update'])->name('faqs.update');
    Route::get('/faqs/edit/{faq}', [FaqController::class, 'edit'])->name('faqs.edit');
    Route::delete('/faqs/delete/{faq}', [FaqController::class, 'destroy'])->name('faqs.destroy');
    // Review
    // Route::get('/reviews', [ReviewController::class, 'index'])->name('reviews.index');
    // Route::get('/reviews/create', [ReviewController::class, 'create'])->name('reviews.create');
    // Route::post('/reviews/create', [ReviewController::class, 'store'])->name('reviews.store');
    // Route::post('/reviews/edit/{review}', [ReviewController::class, 'update'])->name('reviews.update');
    // Route::get('/reviews/edit/{review}', [ReviewController::class, 'edit'])->name('reviews.edit');
    // Route::delete('/reviews/delete/{review}', [ReviewController::class, 'destroy'])->name('reviews.destroy');

    // Subscribers
    Route::get('subscribers', [SubscriberController::class, 'index'])->name('subscribers.index');
    Route::delete('subscribers/{id}/delete', [SubscriberController::class, 'delete'])->name('subscribers.delete');
    
    // Contact Request
    Route::get('contact-requests', [ContactRequestController::class, 'index'])->name('contact-requests.index');
    Route::post('contact-requests/{id}/delete', [ContactRequestController::class, 'delete'])->name('contact-requests.delete');

    Route::get('/profile', [ProfileController::class, 'profile'])->name('profile');
    Route::post('/profile-update', [ProfileController::class, 'profileUpdate'])->name('profileUpdate');

});

Route::post('contact-requests', [ContactRequestController::class, 'store'])->name('contact-requests.store');
Route::post('store-subscriber', [SubscriberController::class, 'store'])->name('subscriber.store');

// Route::post('/list_for_attempt', [VerificationAttemptsController::class, 'list_for_attempt'])->name('list_for_attempt');
