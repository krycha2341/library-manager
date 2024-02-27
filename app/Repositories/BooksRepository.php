<?php

namespace App\Repositories;

use App\DataTransferObjects\BookListDTO;
use App\ValueObjects\BookVO;

interface BooksRepository
{
    /**
     * @return BookVO[]
     */
    public function list(BookListDTO $dto): array;

    public function get(int $id): BookVO;

    public function update(BookVO $bookVO): void;
}
