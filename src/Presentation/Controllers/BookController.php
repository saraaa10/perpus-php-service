<?php

namespace Prana\PerpusPhpService\Presentation\Controllers;

use Prana\PerpusPhpService\Application\Book\BookService;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use League\Plates\Engine;

class BookController
{
    private $bookService;
    private $plates;

    public function __construct(BookService $bookService)
    {
        $this->bookService = $bookService;
        $this->plates = new Engine(__DIR__ . '/../../../templates');
    }

    public function index(Request $request, Response $response): Response
    {
        $books = $this->bookService->getAllBooks();

        $html = $this->plates->render('index');
        $response->getBody()->write($html);
        return $response;
    }

    // public function create(Request $request, Response $response): Response
    // {
    //     if($request->getMethod() === 'POST')
    //     {
    //         $data = $request->getParsedBody();
    //         $nama = $data['nama'];
    //         $isbn = $data['isbn'];
    //         $penerbit = $data['penerbit'];
    //         $penulis = $data['penulis'];
    //         $tahunTerbit = $data['tahun_terbit'];
    //         $jumlahHalaman = $data['jumlah_halaman'];

    //         $this->bookService->createBook($nama, $isbn, $penerbit, $penulis, $tahunTerbit, $jumlahHalaman);
        
    //         return $response->withHeader('Location', '/books');
    //     }

    //     ob_start();
    //     include __DIR__ . '/../Templates/Book/create.php';
    //     $html = ob_get_clean();
    //     $response->getBody()->write($html);

    //     return $response;
    // }

    // public function edit(Request $request, Response $response, array $args): Response
    // {
    //     $id = $args['id'];
    //     $book = $this->bookService->getBookById($id);

    //     if($request->getMethod() === 'POST')
    //     {
    //         $data = $request->getParsedBody();
    //         $nama = $data['nama'];
    //         $isbn = $data['isbn'];
    //         $penerbit = $data['penerbit'];
    //         $penulis = $data['penulis'];
    //         $tahunTerbit = $data['tahun_terbit'];
    //         $jumlahHalaman = $data['jumlah_halaman'];

    //         $this->bookService->updateBook($id, $nama, $isbn, $penerbit, $penulis, $tahunTerbit, $jumlahHalaman);
        
    //         return $response->withHeader('Location', '/books');
    //     }

    //     ob_start();
    //     include __DIR__ . '/../Templates/Book/edit.php';
    //     $html = ob_get_clean();
    //     $response->getBody()->write($html);

    //     return $response;
    // }

    // public function delete(Request $request, Response $response, array $args): Response
    // {
    //     $id = $args['id'];
    //     $this->bookService->deleteBook($id);

    //     return $response->withHeader('Location', '/books');
    // }
}