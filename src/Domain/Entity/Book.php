<?php

namespace Prana\PerpusPhpService\Domain\Entity;

class Book 
{
    private $id;
    private $nama;
    private $isbn;
    private $penerbit;
    private $penulis;
    private $tahunTerbit;
    private $jumlahHalaman;

    public function __construct(
        ?int $id,
        string $nama,
        string $isbn,
        string $penerbit,
        string $penulis,
        int $tahunTerbit,
        int $jumlahHalaman
    ) {
        $this->id = $id;
        $this->nama = $nama;
        $this->isbn = $isbn;
        $this->penerbit = $penerbit;
        $this->penulis = $penulis;
        $this->tahunTerbit = $tahunTerbit;
        $this->jumlahHalaman = $jumlahHalaman;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNama(): string
    {
        return $this->nama;
    }

    public function getIsbn(): string
    {
        return $this->isbn;
    }

    public function getPenerbit(): string
    {
        return $this->penerbit;
    }

    public function getPenulis(): string
    {
        return $this->penulis;
    }

    public function getTahunTerbit(): int
    {
        return $this->tahunTerbit;
    }

    public function getJumlahHalaman(): int
    {
        return $this->jumlahHalaman;
    }


    public function setId(int $id): void
    {
        $this->id = $id;
    }
}