<?php

namespace Prana\PerpusPhpService\Domain\Repository;

use Prana\PerpusPhpService\Domain\Entity\Book;

interface BookRepositoryInterface
{
    public function findAll(): array;
    public function findById(int $id): ?Book;
    public function save(Book $book): void;
    public function update(Book $book): void;
    public function delete(int $id): void;
}