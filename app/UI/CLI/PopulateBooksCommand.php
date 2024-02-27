<?php

namespace App\UI\CLI;

use App\Models\Book;
use Illuminate\Console\Command;

class PopulateBooksCommand extends Command
{
    protected $signature = 'books:populate {number}';
    protected $description = 'Generate given number of books';

    public function handle(): void
    {
        $number = filter_var($this->argument('number'), FILTER_VALIDATE_INT, FILTER_NULL_ON_FAILURE);

        Book::factory()->count($number ?? 60)->create();
    }
}
