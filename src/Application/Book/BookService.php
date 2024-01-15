<?php

namespace Prana\PerpusPhpService\Application\Book;

use Prana\PerpusPhpService\Domain\Entity\Book;
use Prana\PerpusPhpService\Domain\Repository\BookRepositoryInterface;

class BookService
{
    private $bookRepository;

    public function __construct(BookRepositoryInterface $bookRepository)
    {
        $this->bookRepository = $bookRepository;
    }

    public function getAllBooks(): array
    {
        return $this->bookRepository->findAll();
    }

    public function getBookById(int $id): ?Book
    {
        return $this->bookRepository->findById($id);
    }

    public function createBook(string $nama, string $isbn, string $penerbit, string $penulis, int $tahunTerbit, int $jumlahHalaman): void
    {
        $book = new Book(null, $nama, $isbn, $penerbit, $penulis, $tahunTerbit, $jumlahHalaman);
        $this->bookRepository->save($book);
    }

    public function updateBook(int $id, string $nama, string $isbn, string $penerbit, string $penulis, int $tahunTerbit, int $jumlahHalaman): void
    {
        $existingBook = $this->bookRepository->findById($id);

        if ($existingBook) {
            $updatedBook = new Book(null, $nama, $isbn, $penerbit, $penulis, $tahunTerbit, $jumlahHalaman);
            $updatedBook->setId($id);

            $this->bookRepository->update($updatedBook);
        }
    }

    public function deleteBook(int $id): void
    {
        $this->bookRepository->delete($id);
    }
}
