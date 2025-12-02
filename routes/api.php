<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PaymentTypeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShoppingCartController;
use App\Http\Controllers\ShoppingOrderController;
use App\Http\Controllers\VideoReviewController;
use App\Http\Controllers\ShippingMethodController;
use App\Http\Controllers\OrderStatusController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\NewsBlocksController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PromotionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VariationController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ChatBoxAiController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\ProductFavoriteController;
use App\Http\Controllers\ProvinceController;
use App\Http\Controllers\StoreBranchController;
use App\Http\Controllers\WardController;
use App\Http\Controllers\WarrantyController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\CompareProductController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


// ========== Minh Hieu ===========
Route::get('categories/{category}/variations', [CategoryController::class, 'getVariationByCategory']);
Route::get('variations/search', [VariationController::class, 'searchByVariationName']);
Route::apiResource('categories', CategoryController::class);
Route::apiResource('products', ProductController::class);
Route::apiResource('variations', VariationController::class);
// ========== End Minh Hieu ===========





Route::get('/products', [ProductController::class, 'index']);
Route::apiResource('shipping_methods', ShippingMethodController::class);
Route::apiResource('cart', ShoppingCartController::class);


// Video Review Routes
Route::get('/video-reviews', [VideoReviewController::class, 'index']);
Route::post('/video-reviews', [VideoReviewController::class, 'store']);
Route::put('/video-reviews/{id}', [VideoReviewController::class, 'update']);
Route::patch('/video-reviews/{id}', [VideoReviewController::class, 'update']);
Route::delete('/video-reviews/{id}', [VideoReviewController::class, 'destroy']);
Route::patch('/video-reviews/{id}/toggle', [VideoReviewController::class, 'toggleVisibility']);

Route::apiResource('payment-type', PaymentTypeController::class);
Route::apiResource('shopping-order', ShoppingOrderController::class);

Route::apiResource('shipping_methods', ShippingMethodController::class);
Route::apiResource('categories', CategoryController::class);
Route::get('/users/search', [UserController::class, 'search']);
Route::apiResource('users', UserController::class);
// Khóa/Mở tài khoản người dùng
Route::patch('/users/{id}/toggle', [UserController::class, 'toggleStatus']);



// chương trình khuyến mãi
Route::apiResource('promotions', PromotionController::class);

// chi nhánh cửa hàng
Route::apiResource('store_branches', StoreBranchController::class);
//phương thanh toán

Route::get('orderStatus/search', [OrderStatusController::class, 'search']);
Route::get('orderStatus/{orderstatus}/variations', [OrderStatusController::class, 'getVariationByOrderStatus']);
Route::apiResource('orderStatus', OrderStatusController::class);



//Banner
Route::get('banner/search', [BannerController::class, 'search']);
Route::get('/banner', [BannerController::class, 'index']);
Route::post('/banner', [BannerController::class, 'store']);
Route::patch('/banner/{id}', [BannerController::class, 'update']);
Route::get('/banner/{id}', [BannerController::class, 'show']);
Route::delete('/banner/{id}', [BannerController::class, 'destroy']);


//tin tức
Route::get('news/search', [NewsController::class, 'search']);
Route::get('/news', [NewsController::class, 'displayFeaturedNews']);
Route::get('/news', [NewsController::class, 'index']);
Route::post('/news', [NewsController::class, 'store']);
Route::patch('/news/{id}', [NewsController::class, 'update']);
Route::get('/news/{id}', [NewsController::class, 'show']);
Route::get('/news/{id}/blocks', [NewsController::class, 'showNewsBlocks']);
Route::delete('/news/{id}', [NewsController::class, 'destroy']);

//bài viết
Route::get('newsBlocks/search', [NewsBlocksController::class, 'search']);
Route::get('/newsBlocks', [NewsBlocksController::class, 'index']);
Route::post('/newsBlocks', [NewsBlocksController::class, 'store']);
Route::patch('/newsBlocks/{id}', [NewsBlocksController::class, 'update']);
Route::get('/newsBlocks/{id}', [NewsBlocksController::class, 'show']);
Route::delete('/newsBlocks/{id}', [NewsBlocksController::class, 'destroy']);

//Đăng ký & Đăng Nhập 
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// CRUD user
Route::apiResource('users', UserController::class);
// API đổi mật khẩu người dùng
Route::patch('/users/{id}/change-password', [UserController::class, 'changePassword']);

//Tìm kiếm thông tin bảo hành bằng số serial
Route::get('/warranty/search/{serial}', [WarrantyController::class, 'searchBySerial']);
Route::get('/warranty', [WarrantyController::class, 'index']);

//Bình luận tin tức
Route::get('comments', [CommentsController::class, 'index']);
Route::post('comments', [CommentsController::class, 'store']);

// Cổng thanht toán
Route::post('/momo_payment', [CheckoutController::class, 'momo_payment']);

// Lấy thông tin user và địa chỉ giao hàng để điền sẵn vào form nhận hàng
Route::get('/delivery-info', [CheckoutController::class, 'getDeliveryInfo']);


// lấy danh sách tỉnh thành và phường/xã theo tình thành
Route::get('/provinces', [ProvinceController::class, 'index']);
Route::get('/wards/by-province/{provinceId}', [WardController::class, 'getByProvince']);
Route::get('/comments', [CommentsController::class, 'index']);
Route::post('/comments', [CommentsController::class, 'store']);

//chatbox ai
Route::get('/chat', [ChatBoxAiController::class, 'chat']);
Route::post('/chat', [ChatBoxAiController::class, 'chat']);
//Quên mật khẩu
Route::post('/forgot-password', [AuthController::class, 'forgotPassword']);




//Địa chỉ khách hàng 
Route::apiResource('addresses', AddressController::class);
Route::patch('addresses/{id}/default', [AddressController::class, 'setDefault']);
Route::get('/provinces', [ProvinceController::class, 'index']);
Route::get('/wards/{provinceId}', [WardController::class, 'getByProvince']);
// Địa chỉ khách hàng (bảng customer_addresses)
Route::prefix('customer-addresses')->group(function () {
    Route::get('/', [AddressController::class, 'index']);
    Route::post('/', [AddressController::class, 'store']);
    Route::put('/{id}', [AddressController::class, 'update']);
    Route::delete('/{id}', [AddressController::class, 'destroy']);
    Route::patch('/{id}/default', [AddressController::class, 'setDefault']);
});

//Favorite product
Route::get('/favorite', [ProductFavoriteController::class, 'index']);
Route::post('/favorite', [ProductFavoriteController::class, 'store']);
Route::delete('/favorite/{product_favorite_id}', [ProductFavoriteController::class, 'delete']);
//So sanh san pham
Route::get('compare', [CompareProductController::class, 'index']);
Route::post('compare', [CompareProductController::class, 'store']);
Route::get('compare/{compare_product_id}', [CompareProductController::class, 'show']);
Route::put('compare/{compare_product_id}', [CompareProductController::class, 'update']);
Route::delete('compare/{compare_product_id}', [CompareProductController::class, 'destroy']);
