<?php
namespace App\Services;

use App\Models\Genre;
use App\Repositories\AuthorRepository;


class AuthorService
{
     private AuthorRepository $authorRepository;
     public function __construct(AuthorRepository $authorRepository)
     {
          $this->authorRepository = $authorRepository;
     }

     public function get()
     {
          return $this->authorRepository->get();
     }

     public function details(int $id)
     {
          return $this->authorRepository->details($id);
     }

     public function store(array $data)
     {
          return $this->authorRepository->store($data);
     }

     public function update(int $id, array $data)
     {
          return $this->authorRepository->update($id, $data);
     }

     public function delete($id)
     {
          return $this->authorRepository->delete($id);
     }

     public function getWithBooks()
     {
          return $this->authorRepository->getWithBooks();
     }

     public function findBooks($id)
     {
          return $this->authorRepository->findBooks($id);
     }

}
