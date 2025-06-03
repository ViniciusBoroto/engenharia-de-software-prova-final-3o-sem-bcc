<?php
namespace App\Services;

use App\Models\Genre;
use App\Repositories\BookRepository;

class BookService
{
     private BookRepository $bookRepository;
     public function __construct(BookRepository $bookRepository)
     {
          $this->bookRepository = $bookRepository;
     }

     public function get()
     {
          return $this->bookRepository->get();
     }

     public function details(int $id)
     {
          return $this->bookRepository->details($id);
     }

     public function store(array $data)
     {
          return $this->bookRepository->store($data);
     }

     public function update(int $id, array $data)
     {
          return $this->bookRepository->update($id, $data);
     }

     public function delete($id)
     {
          return $this->bookRepository->delete($id);
     }

     public function getAllDetailed()
     {
          $r = $this->bookRepository->getAllDetailed();
          return $r;
     }

     public function findReviews($id)
     {
          return $this->bookRepository->findReviews($id);
     }

}
