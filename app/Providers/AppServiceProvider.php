<?php

namespace App\Providers;

use App\Repositories\BooksRepository;
use App\Repositories\CustomersRepository;
use App\Repositories\Implementations\EloquentBooksRepository;
use App\Repositories\Implementations\EloquentCustomersRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
    }

    public function boot(): void
    {
        $this->app->bind(
            BooksRepository::class,
            EloquentBooksRepository::class
        );
        $this->app->bind(
            CustomersRepository::class,
            EloquentCustomersRepository::class
        );
    }
}
