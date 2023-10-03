<?php

namespace App\Controller;

use App\Entity\Book;
use App\Repository\BookRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/book')]

class BookController extends AbstractController
{
    #[Route('/', name: 'get_all_book')]
    public function index(BookRepository $bookRepository): JsonResponse
    {
        $books = $bookRepository->findAll();
        return $this->json($books);
    }
    
    #[Route('/new', name: 'new_book')]
    public function save(EntityManagerInterface $em)
    {
        $book = new Book();
        $book->setName("Teste");
        $book->setActor("Tanto faz");
        $book->setSinopse("Teste");
        $em->persist($book);
        $em->flush();
        return $this->json("Saved");

    }
}

