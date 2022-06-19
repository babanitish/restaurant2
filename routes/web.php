<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\checkoutController;
use App\Http\Controllers\CouponController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [Clientcontroller::class, 'home'])->name('/');
Route::get('/menu', [Clientcontroller::class, 'menu'])->name('menu');
Route::get('/about', [Clientcontroller::class, 'about']);
Route::get('/book', [Clientcontroller::class, 'book']);

//INFORMATIONS

Route::get('/Mentions-légales', [Clientcontroller::class, 'mention'])->name('mention');
Route::get("/conditions-générales-utilisation", [Clientcontroller::class, 'cgu'])->name('cgu');
Route::get('/conditions-générales-vente', [Clientcontroller::class, 'cgv'])->name('cgv');
Route::get('/Nous_contacter', [Clientcontroller::class, 'contact'])->name('contacts');
Route::post('/save_contact', [Clientcontroller::class, 'saveContact'])->name('save.contact');




//Voir produit en détail
Route::get('/product/{id}', [Productcontroller::class, 'show'])->name('product.show');

// Vider panier
Route::post('/vider', [CartController::class, 'clearAllCart'])->name('vider');

//NEWSLETTER
Route::post('/newsletter', [Clientcontroller::class, 'newsletter'])->name('subscribe_newsletter');




//CATEGORIES
Route::get('/select_par_category/{category_name}', [ProductController::class, 'select_par_category']);


//RESERVATION

Route::post('/table_book', [Clientcontroller::class, 'tableBook'])->name('book');
Route::get('/reservation', [Admincontroller::class, 'viewReservation'])->name('view_reservation');

//COUPON 
Route::post('/coupon-apply', [CartController::class, 'apply'])->name('apply_coupon');
Route::get('/coupon-calcul', [CartController::class, 'couponCalcul'])->name('coupon_calcul');
Route::delete('/coupon-destroy', [CartController::class, 'couponDestroy'])->name('coupon.destroy');



//CART
Route::post('/add-to-cart', [CartController::class, 'ajouter'])->name('ajout');
Route::get('/panier', [CartController::class, 'index'])->name('cart.index');
Route::delete('/panier/{id}', [CartController::class, 'destroy'])->name('cart.destroy');
Route::post('/update-cart/{rowId}', [CartController::class, 'update']);



Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/profile', function () {
        return view('profile');
    })->name('profile');


    Route::get('/redirects', [Clientcontroller::class, 'redirects'])->name('redirects');


    Route::get('/users', [Admincontroller::class, 'user'])->name('users');
    Route::get('/deleteuser/{id}', [Admincontroller::class, 'deleteuser']);
    Route::get('/contact', [Admincontroller::class, 'allContact'])->name('view_contact');
    Route::get('/deleteContact/{id}', [Admincontroller::class, 'deleteContact'])->name('delete_contact');



    Route::get('/orders', [Admincontroller::class, 'viewOrder']);
    // Route::get('/delete_order/{id}', [Admincontroller::class, 'deleteOrder'])->name('delete_order');


    // Route::get('/cart_view/{id}', [ShopController::class, 'cartView'])->name('cart_view');
    //CATEGORIES
    Route::get('/addcategory', [CategoryController::class, 'addcategory'])->name('addcategory');
    Route::post('/savecategory', [CategoryController::class, 'store'])->name('savecategory');
    Route::get('/edit_category/{id}', [CategoryController::class, 'edit'])->name('edit_category');
    Route::post('/update_category/{id}', [CategoryController::class, 'update'])->name('update_category');
    Route::get('/delete_category/{id}', [CategoryController::class, 'delete'])->name('delete_category');
    Route::get('/categories', [CategoryController::class, 'categories'])->name('categories');


    //CRUD PRODUCTS
    Route::get('/products', [ProductController::class, 'product'])->name('products');
    Route::get('/addproduct', [ProductController::class, 'addproduct'])->name('addproduct');
    Route::post('/saveproduct', [ProductController::class, 'store'])->name('saveproduct');
    Route::get('/edit_product/{id}', [ProductController::class, 'edit'])->name('edit_product');
    Route::post('/update_product/{id}', [ProductController::class, 'update'])->name('update_product');
    Route::get('/delete_product/{id}', [ProductController::class, 'delete'])->name('delete_product');
    Route::get('/desactiver_product/{id}', [ProductController::class, 'desactiver'])->name('desactiver_product');
    Route::get('/activer_product/{id}', [ProductController::class, 'activer'])->name('activer_product');
    Route::get('/search-product', [Productcontroller::class, 'searchProduct'])->name('search_product');
    Route::get('/mes-commandes', [Productcontroller::class, 'myOrder'])->name('my_order');
    Route::get('/commande/détail/{id}', [Productcontroller::class, 'orderDetail'])->name('order_view');
    Route::get('/search', [Productcontroller::class, 'search']);

    /////////////////////////////
    Route::get('/user/logout', [ClientController::class, 'UserLogout'])->name('user.logout');
    Route::get('/user/mot-de-passe', [ClientController::class, 'UserPassword'])->name('user.mdp');
    Route::put('/mdp/update', [Clientcontroller::class, 'updateMdp'])->name('mdp.update');
    Route::get('/user-profil', [Clientcontroller::class, 'UserProfil'])->name('user.profil');
    Route::put('/profil-update', [Clientcontroller::class, 'UpdateProfil'])->name('profil.update');
    Route::post('/profil-delete', [Clientcontroller::class, 'unsubscribe'])->name('user.unsubscribe');


    //CHECKOUT

    Route::get('/payment', [checkoutController::class, 'index'])->name('checkout.index');
    Route::post('/order', [checkoutController::class, 'payer'])->name('place-order');



    //COUPON
    Route::get('/coupons', [couponController::class, 'index'])->name('coupon.index');
    Route::get('/addcoupon', [couponController::class, 'addCoupon'])->name('addcoupon');
    Route::post('/savecoupon', [couponController::class, 'store'])->name('savecoupon');
    Route::get('/edit_coupon/{id}', [couponController::class, 'edit'])->name('edit_coupon');
    Route::post('/update_coupon/{id}', [couponController::class, 'update'])->name('update_coupon');
    Route::get('/delete_coupon/{id}', [couponController::class, 'delete'])->name('delete_coupon');

    Route::get('/merci', function () {
        return view('client.merci');
    })->name('merci');
});
require __DIR__ . '/auth.php';
