<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\TranslationManageController;
use App\Http\Controllers\Admin\SeoController;
use App\Http\Controllers\Admin\LogoController;
use App\Http\Controllers\Admin\SocialMediaController;
use App\Http\Controllers\Admin\SocialshareController;
use App\Http\Controllers\Admin\SocialfooterController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProductColorController;
use App\Http\Controllers\Admin\ProductSizeController;
use App\Http\Controllers\Admin\ProductImageController;
use App\Http\Controllers\Admin\ProductStockController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\HomeHeroController;
use App\Http\Controllers\Admin\PartnerController;
use App\Http\Controllers\Admin\HomeFollowController;
use App\Http\Controllers\Admin\HomeCartSectionController;
use App\Http\Controllers\Admin\HomeFeaturedBoxController;
use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\AboutCartSectionController;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\admin\KeyfiyetController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\BlogTypeController;
use App\Http\Controllers\Admin\TeamController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\ProjectController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect()->route('front.index');
});

// Front routes
Route::get('/home', [HomeController::class, 'index'])->name('front.index');
Route::get('/about', [App\Http\Controllers\Front\AboutController::class, 'index'])->name('front.about');
Route::get('/service', [App\Http\Controllers\Front\ServiceController::class, 'index'])->name('front.service');
Route::get('/service/{id}', [App\Http\Controllers\Front\ServiceController::class, 'show'])->name('front.service.show');
Route::get('/contact', [App\Http\Controllers\Front\HomeController::class, 'contact'])->name('front.contact');
Route::post('/contact/store-message', [App\Http\Controllers\Front\HomeController::class, 'storeMessage'])->name('front.storeMessage');

// Proje Routeları
Route::prefix('project')->name('front.project.')->group(function () {
    Route::get('/', [App\Http\Controllers\Front\ProjectController::class, 'index'])->name('index');
    Route::get('/{slug}', [App\Http\Controllers\Front\ProjectController::class, 'show'])->name('show');
});

// Front Blog Routes
Route::prefix('blog')->name('front.blog.')->group(function () {
    Route::get('/', [App\Http\Controllers\Front\BlogController::class, 'index'])->name('index');
    Route::get('/{slug}', [App\Http\Controllers\Front\BlogController::class, 'show'])->name('show');
    Route::get('/category/{slug}', [App\Http\Controllers\Front\BlogController::class, 'category'])->name('category');
});

// Front News Routes (News sayfası blog içeriğimizi gösterecek)
Route::prefix('news')->name('front.news.')->group(function () {
    Route::get('/', [App\Http\Controllers\Front\NewsController::class, 'index'])->name('index');
    Route::get('/{slug}', [App\Http\Controllers\Front\NewsController::class, 'show'])->name('show');
    Route::get('/category/{slug}', [App\Http\Controllers\Front\NewsController::class, 'category'])->name('category');
});

// Front Product Routes
Route::prefix('products')->name('front.products.')->group(function () {
    Route::get('/', [App\Http\Controllers\Front\ProductController::class, 'index'])->name('index');
    Route::get('/cart', [App\Http\Controllers\Front\ProductController::class, 'cart'])->name('cart');
    Route::get('/wishlist', [App\Http\Controllers\Front\ProductController::class, 'wishlist'])->name('wishlist');
    Route::post('/add-to-cart', [App\Http\Controllers\Front\ProductController::class, 'addToCart'])->name('add-to-cart');
    Route::post('/add-to-wishlist', [App\Http\Controllers\Front\ProductController::class, 'addToWishlist'])->name('add-to-wishlist');
    Route::post('/update-cart', [App\Http\Controllers\Front\ProductController::class, 'updateCart'])->name('update-cart');
    Route::post('/remove-from-cart', [App\Http\Controllers\Front\ProductController::class, 'removeFromCart'])->name('remove-from-cart');
    Route::post('/clear-cart', [App\Http\Controllers\Front\ProductController::class, 'clearCart'])->name('clear-cart');
    Route::post('/apply-coupon', [App\Http\Controllers\Front\ProductController::class, 'applyCoupon'])->name('apply-coupon');
    Route::get('/{slug}', [App\Http\Controllers\Front\ProductController::class, 'show'])->name('show');
    Route::post('/check-stock', [App\Http\Controllers\Front\ProductController::class, 'checkStock'])->name('check-stock');
});

Route::prefix('admin')->group(function () {
    Route::get('/', function () {
        if (auth()->guard('admin')->check()) {
            return redirect()->route('back.pages.index');
        }
        return redirect()->route('admin.login');
    });

    Route::get('login', [AdminController::class, 'showLoginForm'])->name('admin.login')->middleware('guest:admin');
    Route::post('login', [AdminController::class, 'login'])->name('handle-login');

    Route::middleware('auth:admin')->group(function () {
        Route::get('dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

        Route::get('profile', function () {
            return view('back.admin.profile');
        })->name('admin.profile');

        Route::post('logout', [AdminController::class, 'logout'])->name('admin.logout');

        Route::prefix('pages')->name('back.pages.')->group(function () {
            Route::get('index', [PageController::class, 'index'])->name('index');

            // Translation Management Routes
            Route::get('translation-manage', [TranslationManageController::class, 'index'])->name('translation-manage.index');
            Route::get('translation-manage/create', [TranslationManageController::class, 'create'])->name('translation-manage.create');
            Route::post('translation-manage', [TranslationManageController::class, 'store'])->name('translation-manage.store');
            Route::get('translation-manage/{translationManage}/edit', [TranslationManageController::class, 'edit'])->name('translation-manage.edit');
            Route::put('translation-manage/{translationManage}', [TranslationManageController::class, 'update'])->name('translation-manage.update');
            Route::delete('translation-manage/{translationManage}', [TranslationManageController::class, 'destroy'])->name('translation-manage.destroy');

             // SEO routes
             Route::get('seo', [SeoController::class, 'index'])->name('seo.index');
             Route::get('seo/create', [SeoController::class, 'create'])->name('seo.create');
             Route::post('seo', [SeoController::class, 'store'])->name('seo.store');
             Route::get('seo/{id}/edit', [SeoController::class, 'edit'])->name('seo.edit');
             Route::put('seo/{id}', [SeoController::class, 'update'])->name('seo.update');
             Route::delete('seo/{id}', [SeoController::class, 'destroy'])->name('seo.destroy');
             Route::post('seo/toggle-status/{id}', [SeoController::class, 'toggleStatus'])->name('seo.toggle-status.post');
             Route::post('seo/toggle-status/{id}', [SeoController::class, 'toggleStatus'])->name('seo.toggle-status');

             // Logo routes
             Route::get('logos', [LogoController::class, 'index'])->name('logos.index');
             Route::get('logos/create', [LogoController::class, 'create'])->name('logos.create');
             Route::post('logos', [LogoController::class, 'store'])->name('logos.store');
             Route::get('logos/{id}', [LogoController::class, 'show'])->name('logos.show');
             Route::get('logos/{id}/edit', [LogoController::class, 'edit'])->name('logos.edit');
             Route::put('logos/{id}', [LogoController::class, 'update'])->name('logos.update');
             Route::delete('logos/{id}', [LogoController::class, 'destroy'])->name('logos.destroy');

            
             // Social Media routes
             Route::get('social', [SocialMediaController::class, 'index'])->name('social.index');
             Route::get('social/create', [SocialMediaController::class, 'create'])->name('social.create');
             Route::post('social', [SocialMediaController::class, 'store'])->name('social.store');
             Route::get('social/{id}/edit', [SocialMediaController::class, 'edit'])->name('social.edit');
             Route::put('social/{id}', [SocialMediaController::class, 'update'])->name('social.update');
             Route::delete('social/{id}', [SocialMediaController::class, 'destroy'])->name('social.destroy');
             Route::post('social/order', [SocialMediaController::class, 'order'])->name('social.order');
             Route::post('social/toggle-status/{id}', [SocialMediaController::class, 'toggleStatus'])->name('social.toggle-status');

              // Social Share routes
            Route::get('socialshare', [SocialshareController::class, 'index'])->name('socialshare.index');
            Route::get('socialshare/create', [SocialshareController::class, 'create'])->name('socialshare.create');
            Route::post('socialshare', [SocialshareController::class, 'store'])->name('socialshare.store');
            Route::get('socialshare/{id}/edit', [SocialshareController::class, 'edit'])->name('socialshare.edit');
            Route::put('socialshare/{id}', [SocialshareController::class, 'update'])->name('socialshare.update');
            Route::delete('socialshare/{id}', [SocialshareController::class, 'destroy'])->name('socialshare.destroy');
            Route::post('socialshare/order', [SocialshareController::class, 'order'])->name('socialshare.order');
            Route::post('socialshare/{id}/toggle-status', [SocialshareController::class, 'toggleStatus'])->name('socialshare.toggleStatus');

              // Social Footer routes
              Route::get('socialfooter', [SocialfooterController::class, 'index'])->name('socialfooter.index');
              Route::get('socialfooter/create', [SocialfooterController::class, 'create'])->name('socialfooter.create');
              Route::post('socialfooter', [SocialfooterController::class, 'store'])->name('socialfooter.store');
              Route::get('socialfooter/{id}/edit', [SocialfooterController::class, 'edit'])->name('socialfooter.edit');
              Route::put('socialfooter/{id}', [SocialfooterController::class, 'update'])->name('socialfooter.update');
              Route::delete('socialfooter/{id}', [SocialfooterController::class, 'destroy'])->name('socialfooter.destroy');
              Route::post('socialfooter/order', [SocialfooterController::class, 'order'])->name('socialfooter.order');
              Route::post('socialfooter/toggle-status/{id}', [SocialfooterController::class, 'toggleStatus'])->name('socialfooter.toggle-status');

              // Product routes
              Route::resource('products', ProductController::class);
              Route::post('products/toggle-status/{id}', [ProductController::class, 'toggleStatus'])->name('products.toggle-status');
              Route::post('products/toggle-featured/{id}', [ProductController::class, 'toggleFeatured'])->name('products.toggle-featured');
              
              // Product Color routes
              Route::resource('product_colors', ProductColorController::class);
              Route::post('product_colors/toggle-status/{id}', [ProductColorController::class, 'toggleStatus'])->name('product_colors.toggle-status');
              
              // Product Size routes
              Route::resource('product_sizes', ProductSizeController::class);
              Route::post('product_sizes/toggle-status/{id}', [ProductSizeController::class, 'toggleStatus'])->name('product_sizes.toggle-status');
              
              // Product Image routes
              Route::resource('product_images', ProductImageController::class);
              Route::post('product_images/toggle-status/{id}', [ProductImageController::class, 'toggleStatus'])->name('product_images.toggle-status');
              Route::post('product_images/set-as-main/{id}', [ProductImageController::class, 'setAsMain'])->name('product_images.set-as-main');
              Route::get('product_images/get-colors-by-product/{productId}', [ProductImageController::class, 'getColorsByProduct'])->name('product_images.get-colors-by-product');
              
              // Product Stock routes
              Route::resource('product_stocks', ProductStockController::class);
              Route::post('product_stocks/toggle-status/{id}', [ProductStockController::class, 'toggleStatus'])->name('product_stocks.toggle-status');
              Route::get('product_stocks/get-colors-by-product/{productId}', [ProductStockController::class, 'getColorsByProduct'])->name('product_stocks.get-colors-by-product');
              Route::get('product_stocks/get-sizes-by-product/{productId}', [ProductStockController::class, 'getSizesByProduct'])->name('product_stocks.get-sizes-by-product');
              // Stock routes
              Route::get('product_stocks/{id}/add-movement', [ProductStockController::class, 'addMovement'])->name('product_stocks.add-movement');
              Route::post('product_stocks/{id}/store-movement', [ProductStockController::class, 'storeMovement'])->name('product_stocks.store-movement');

              // Category routes
              Route::resource('categories', CategoryController::class);
              Route::post('categories/toggle-status/{id}', [CategoryController::class, 'toggleStatus'])->name('categories.toggle-status');
              
              // Home Hero routes
              Route::resource('home-heroes', HomeHeroController::class);
              Route::post('home-heroes/toggle-status/{id}', [HomeHeroController::class, 'toggleStatus'])->name('home-heroes.toggle-status');

              // Partner routes
              Route::resource('partners', PartnerController::class);
              Route::post('partners/toggle-status/{id}', [PartnerController::class, 'toggleStatus'])->name('partners.toggle-status');

              // Home Follow routes
              Route::resource('home-follows', HomeFollowController::class);
              Route::post('home-follows/toggle-status/{id}', [HomeFollowController::class, 'toggleStatus'])->name('home-follows.toggle-status');
              
              // Home Cart Section routes
              Route::resource('home-cart-sections', HomeCartSectionController::class);
              Route::post('home-cart-sections/toggle-status/{id}', [HomeCartSectionController::class, 'toggleStatus'])->name('home-cart-sections.toggle-status');
              
              // Home Featured Box routes
              Route::resource('home-featured-boxes', HomeFeaturedBoxController::class);
              Route::post('home-featured-boxes/toggle-status/{id}', [HomeFeaturedBoxController::class, 'toggleStatus'])->name('home-featured-boxes.toggle-status');
              
              // About routes
              Route::resource('about', AboutController::class);
              Route::post('about/toggle-status/{id}', [AboutController::class, 'toggleStatus'])->name('about.toggle-status');
              
              // About Cart Section routes
              Route::resource('about-cart-sections', AboutCartSectionController::class);
              Route::post('about-cart-sections/toggle-status/{id}', [AboutCartSectionController::class, 'toggleStatus'])->name('about-cart-sections.toggle-status');

              
              // Keyfiyet Routes
            Route::get('keyfiyet', [KeyfiyetController::class, 'index'])->name('keyfiyet.index');
            Route::get('keyfiyet/create', [KeyfiyetController::class, 'create'])->name('keyfiyet.create');
            Route::post('keyfiyet', [KeyfiyetController::class, 'store'])->name('keyfiyet.store');
            Route::get('keyfiyet/{id}/edit', [KeyfiyetController::class, 'edit'])->name('keyfiyet.edit');
            Route::put('keyfiyet/{id}', [KeyfiyetController::class, 'update'])->name('keyfiyet.update');
            Route::delete('keyfiyet/{id}', [KeyfiyetController::class, 'destroy'])->name('keyfiyet.destroy');

            // Blog Routes
            Route::get('blogs', [BlogController::class, 'index'])->name('blogs.index');
            Route::get('blogs/create', [BlogController::class, 'create'])->name('blogs.create');
            Route::post('blogs', [BlogController::class, 'store'])->name('blogs.store');
            Route::get('blogs/{blog}/edit', [BlogController::class, 'edit'])->name('blogs.edit');
            Route::put('blogs/{blog}', [BlogController::class, 'update'])->name('blogs.update');
            Route::delete('blogs/{blog}', [BlogController::class, 'destroy'])->name('blogs.destroy');
            Route::post('blogs/toggle-status/{id}', [BlogController::class, 'toggleStatus'])->name('blogs.toggle-status');
            
            // Blog Type Routes
            Route::get('blog_types', [BlogTypeController::class, 'index'])->name('blog_types.index');
            Route::get('blog_types/create', [BlogTypeController::class, 'create'])->name('blog_types.create');
            Route::post('blog_types', [BlogTypeController::class, 'store'])->name('blog_types.store');
            Route::get('blog_types/{blogType}/edit', [BlogTypeController::class, 'edit'])->name('blog_types.edit');
            Route::put('blog_types/{blogType}', [BlogTypeController::class, 'update'])->name('blog_types.update');
            Route::delete('blog_types/{blogType}', [BlogTypeController::class, 'destroy'])->name('blog_types.destroy');


            Route::prefix('teams')->group(function () {
                Route::get('/', [TeamController::class, 'index'])->name('teams.index');
                Route::get('/create', [TeamController::class, 'create'])->name('teams.create');
                Route::post('/', [TeamController::class, 'store'])->name('teams.store');
                Route::get('/{team}/edit', [TeamController::class, 'edit'])->name('teams.edit');
                Route::put('/{team}', [TeamController::class, 'update'])->name('teams.update');
                Route::delete('/{team}', [TeamController::class, 'destroy'])->name('teams.destroy');
                Route::post('/toggle-status/{id}', [TeamController::class, 'toggleStatus'])->name('teams.toggle-status');
            });


            // Service Routes
            Route::get('service', [ServiceController::class, 'index'])->name('service.index');
            Route::get('service/create', [ServiceController::class, 'create'])->name('service.create');
            Route::post('service', [ServiceController::class, 'store'])->name('service.store');
            Route::get('service/{id}/edit', [ServiceController::class, 'edit'])->name('service.edit');
            Route::put('service/{id}', [ServiceController::class, 'update'])->name('service.update');
            Route::delete('service/{id}', [ServiceController::class, 'destroy'])->name('service.destroy');

            Route::resource('project', ProjectController::class);
            Route::post('project/{project}/toggle-status', [ProjectController::class, 'toggleStatus'])->name('project.toggle-status');

        });

        

        
    });

    
 
});

// Dil değiştirme route'u
Route::get('lang/{lang}', [LanguageController::class, 'switchLang'])->name('lang.switch');
