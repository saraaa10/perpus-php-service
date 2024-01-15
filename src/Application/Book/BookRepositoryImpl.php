<?php

namespace Prana\PerpusPhpService\Application\Book;

use Prana\PerpusPhpService\Domain\Entity\Book;
use Prana\PerpusPhpService\Domain\Repository\BookRepositoryInterface;
use Prana\PerpusPhpService\Infrastructure\Database\BookEloquent;

class BookRepositoryImpl implements BookRepositoryInterface
{
    public function findAll(): array 
    {
        $book = BookEloquent::all();

        return $book->map(function ($book) {
            return $this->mapToEntity($book);
        })->all();
    }
    public function findById(int $id): ?Book 
    {
        $book = BookEloquent::find($id);

        return $book ? $this->mapToEntity($book) : null;
    }
    public function save(Book $book): void 
    {
        BookEloquent::create($this->mapToData($book));
    }
    public function update(Book $book): void 
    {
        $bookEloquent = BookEloquent::find($book->getId());
        $bookEloquent->update($this->mapToData($book));
    }
    public function delete(int $id): void 
    {
        BookEloquent::destroy($id);
    }

    private function mapToEntity(BookEloquent $book): Book 
    {
        return new Book(
            $book->id,
            $book->nama,
            $book->isbn,
            $book->penerbit,
            $book->penulis,
            $book->tahun_terbit,
            $book->jumlah_halaman
        );
    }

    private function mapToData(Book $book): array
    {
        return [
            'nama' => $book->getNama(),
            'isbn' => $book->getIsbn(),
            'penerbit' => $book->getPenerbit(),
            'penulis' => $book->getPenulis(),
            'tahun_terbit' => $book->getTahunTerbit(),
            'jumlah_halaman' => $book->getJumlahHalaman(),
        ];
    }
}