<?php

use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\UploadProductController;
use App\Http\Controllers\Website\AddressController;
use App\Http\Controllers\Website\CartController;
use App\Http\Controllers\Website\CategoryController;
use App\Http\Controllers\Website\CheckoutController;
use App\Http\Controllers\Website\HomepageController;
use App\Http\Controllers\Website\MyAccountController;
use App\Http\Controllers\Website\OrderController;
use App\Http\Controllers\Website\ThankYouController;
use App\Http\Controllers\Website\ViewFinancePDFController;
use App\Http\Controllers\Website\WishlistController;
use App\Http\Middleware\AuthCheck;
use Illuminate\Support\Facades\Route;


Route::get('/', HomepageController::class)->name('homepage');
Route::view('search', 'search')->name('search');
Route::get('upload-product', [UploadProductController::class, 'index']);
Route::post('upload-product', [UploadProductController::class, 'store'])->name('upload-product');

// product and categories routes
Route::get('products/categories/{type}', CategoryController::class)->name('categories.show');
Route::get('products/categories/{type}/{category}/{subCategory?}', [ProductController::class, 'index'])->name('products.index');
Route::get('product/{type}/{slug}', [ProductController::class, 'show'])->name('products.show');
// Route::post('products/{slug}/add-to-wishlist', [ProductController::class, 'addToWishlist'])->name('products.add-to-wishlist');
Route::view("products", 'products.all')->name('products');

Route::get("contact-us", [ContactUsController::class, 'index'])->name('contacts.index');
Route::post("contact-us", [ContactUsController::class, 'store'])->name('contacts.store');

// wishlist
Route::resource('wish-list', WishlistController::class)->only(['index', 'store', 'destroy']);

// add to cart
Route::get('cart', [CartController::class, 'index'])->name('cart.index');
Route::post('add-to-cart', [CartController::class, 'store'])->name('add-to-cart');

// checkout
Route::get('checkout/success', [CheckoutController::class, 'success'])->name('checkout.success');
Route::get('checkout/cancel', [CheckoutController::class, 'cancel'])->name('checkout.cancel');
Route::get('checkout', [CheckoutController::class, 'index'])->name('checkout.index');
Route::post('checkout', [CheckoutController::class, 'store'])->name('checkout.store');

// thank you
Route::get("thank-you", ThankYouController::class)->name('thank-you');

// privacy and terms condition
Route::view('privacy-policy', 'privacy-policy')->name('privacy-policy');
Route::view('terms-conditions', 'terms-conditions')->name('terms-conditions');

Route::prefix('our-company')->group(function () {
    Route::view('about-us', 'website.about-us')->name('about-us');
    Route::view('about-our-product', 'website.about-our-product')->name('about-our-product');
    Route::view('why-play-matters', 'website.why-play-matters')->name('why-play-matters');
    Route::view('who-we-serve', 'website.who-we-serve')->name('who-we-serve');
    Route::view('playground-installation', 'website.playground-installation')->name('playground-installation');
    Route::view('certifications-partnerships', 'website.certifications-partnerships')->name('certifications-partnerships');
});
Route::prefix('planning-tools')->group(function () {
    Route::view('plan-your-playground', 'website.plan-your-playground')->name('plan-your-playground');
    Route::view('apply-for-financing', 'website.apply-for-financing')->name('apply-for-financing');
    Route::view('playground-maintenance-inspection', 'website.playground-maintenance-inspection')->name('playground-maintenance-inspection');
});

Route::middleware([AuthCheck::class])->group(function () {
    Route::get('my-account', [MyAccountController::class, 'index'])->name('my-account.index');
    Route::post('my-account', [MyAccountController::class, 'update'])->name('my-account.update');

    // address routes
    Route::get('my-account/address', [AddressController::class, 'index'])->name('my-account.address');
    Route::post('my-account/address/billing', [AddressController::class, 'updateBilling'])->name('my-account.address.billing');
    Route::post('my-account/address/shipping', [AddressController::class, 'updateShipping'])->name('my-account.address.shipping');
    Route::post('my-account/copy-billing-to-shipping', [AddressController::class, 'copyBilling'])->name('my-account.address.copy-billing');

    // orders routes
    Route::get('my-account/orders', [OrderController::class, 'index'])->name('my-account.orders.index');
    Route::get('my-account/orders/{orderId}', [OrderController::class, 'show'])->name('my-account.orders.show');
});

Route::get('my-account/lost-password', [MyAccountController::class, 'lostPassword'])->name('my-account.lost-password');

Route::get('/dashboard', DashboardController::class)->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
