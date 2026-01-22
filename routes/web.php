<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;

/*
|--------------------------------------------------------------------------
| Controllers
|--------------------------------------------------------------------------
*/
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\SalaryTaxController;
use App\Http\Controllers\LoanCalculatorController;
use App\Http\Controllers\RentCalculatorController;

/*
|--------------------------------------------------------------------------
| Admin Controllers
|--------------------------------------------------------------------------
*/
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PostAdminController;


/*
|--------------------------------------------------------------------------
| Homepage
|--------------------------------------------------------------------------
*/
Route::get('/', [HomeController::class, 'index'])->name('home');


/*
|--------------------------------------------------------------------------
| Blog (Guides)
|--------------------------------------------------------------------------
*/
Route::get('/guides', [BlogController::class, 'index'])->name('blog');
Route::get('/guides/{slug}', [BlogController::class, 'show'])->name('blog.show');


/*
|--------------------------------------------------------------------------
| Calculators
|--------------------------------------------------------------------------
*/
Route::get('/calculators', function () {
    return view('pages.calculators.index');
})->name('calculators');

Route::get('/calculators/salary-tax', [SalaryTaxController::class, 'index'])
    ->name('calculators.salary-tax');

Route::post('/calculators/salary-tax', [SalaryTaxController::class, 'calculate'])
    ->name('calculators.salary-tax.calculate');

Route::get('/calculators/loan-repayment', [LoanCalculatorController::class, 'index'])
    ->name('calculators.loan');

Route::post('/calculators/loan-repayment', [LoanCalculatorController::class, 'calculate'])
    ->name('calculators.loan.calculate');

Route::get('/calculators/rent-affordability', [RentCalculatorController::class, 'index'])
    ->name('calculators.rent');

Route::post('/calculators/rent-affordability', [RentCalculatorController::class, 'calculate'])
    ->name('calculators.rent.calculate');


/*
|--------------------------------------------------------------------------
| Static Pages
|--------------------------------------------------------------------------
*/
Route::view('/about', 'pages.about')->name('about');
Route::view('/contact', 'pages.contact')->name('contact');


/*
|--------------------------------------------------------------------------
| Legal Pages
|--------------------------------------------------------------------------
*/
Route::view('/privacy-policy', 'privacy')->name('privacy');
Route::view('/terms-and-conditions', 'terms')->name('terms');
Route::view('/disclaimer', 'disclaimer')->name('disclaimer');


/*
|--------------------------------------------------------------------------
| Admin Panel
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->name('admin.')->group(function () {

    /*
    |-------------------------
    | Admin Authentication
    |-------------------------
    */
    Route::get('/login', [AuthController::class, 'showLogin'])
        ->name('login');

    Route::post('/login', [AuthController::class, 'login'])
        ->name('login.submit');


    /*
    |-------------------------
    | Protected Admin Routes
    |-------------------------
    */
    Route::middleware('admin.auth')->group(function () {

        Route::post('/logout', [AuthController::class, 'logout'])
            ->name('logout');

        /*
        | Dashboard (CONTROLLER-DRIVEN)
        */
        Route::get('/dashboard', [DashboardController::class, 'index'])
            ->name('dashboard');

        /*
        | Blog Post Management
        */
        Route::get('/posts', [PostAdminController::class, 'index'])
            ->name('posts.index');

        Route::get('/posts/create', [PostAdminController::class, 'create'])
            ->name('posts.create');

        Route::post('/posts', [PostAdminController::class, 'store'])
            ->name('posts.store');

        Route::get('/posts/{post}/edit', [PostAdminController::class, 'edit'])
            ->name('posts.edit');

        Route::put('/posts/{post}', [PostAdminController::class, 'update'])
            ->name('posts.update');

        Route::delete('/posts/{post}', [PostAdminController::class, 'destroy'])
            ->name('posts.destroy');
    });
    
});
