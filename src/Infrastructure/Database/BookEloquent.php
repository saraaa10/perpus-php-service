<?php

namespace Prana\PerpusPhpService\Infrastructure\Database;
use Illuminate\Database\Eloquent\Model;

class BookEloquent extends Model
{
    protected $table = 'book';
    protected $primaryKey = 'id';
    protected $keyType = 'int';
    public $timestamps = false;
    protected $fillable = ['nama', 'isbn', 'penerbit', 'penulis', 'tahun_terbit', 'jumlah_halaman'];
}