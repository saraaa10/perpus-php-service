<?php

use DI\ContainerBuilder;
use Prana\PerpusPhpService\Application\Book\BookRepositoryImpl;
use Prana\PerpusPhpService\Application\Book\BookService;
use Prana\PerpusPhpService\Domain\Repository\BookRepositoryInterface;
use Prana\PerpusPhpService\Presentation\Controllers\BookController;
use Psr\Container\ContainerInterface;

$containerBuilder = new ContainerBuilder();
$containerBuilder->useAutowiring(true); // Enable autowiring

$containerBuilder->addDefinitions([
    BookRepositoryInterface::class => DI\autowire(BookRepositoryImpl::class),
    BookService::class => DI\autowire(BookService::class),
    BookController::class => DI\autowire(BookController::class),
]);

$container = $containerBuilder->build();

return $container;
