<?php

use App\UI\Rest\Books\BookDetails;
use App\UI\Rest\Books\BorrowBook;
use App\UI\Rest\Books\ListBooks;
use App\UI\Rest\Books\ReturnBook;
use App\UI\Rest\Customers\CreateCustomer;
use App\UI\Rest\Customers\CustomerDetails;
use App\UI\Rest\Customers\DeleteCustomer;
use App\UI\Rest\Customers\ListCustomers;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::group([
    'prefix' => 'books',
    'namespace' => '\\',
], function () {
    Route::get('', ListBooks::class);
    Route::get('{id}', BookDetails::class);
    Route::patch('{id}/customers/{customerId}/borrow', BorrowBook::class);
    Route::patch('{id}/customers/{customerId}/return', ReturnBook::class);
});

Route::group([
    'prefix' => 'customers',
    'namespace' => '\\',
], function () {
    Route::post('', CreateCustomer::class);
    Route::get('', ListCustomers::class);
    Route::get('{id}', CustomerDetails::class);
    Route::delete('{id}', DeleteCustomer::class);
});
