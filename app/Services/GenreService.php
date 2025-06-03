<?php
namespace App\Services;

use App\Models\Genre;
use App\Repositories\GenreRepository;

class GenreService
{
     private GenreRepository $genreRepository;
     public function __construct(GenreRepository $genreRepository)
     {
          $this->genreRepository = $genreRepository;
     }

     public function get()
     {
          return $this->genreRepository->get();
     }

     public function details(int $id)
     {
          return $this->genreRepository->details($id);
     }

     public function store(array $data)
     {
          return $this->genreRepository->store($data);
     }

     public function update(int $id, array $data)
     {
          return $this->genreRepository->update($id, $data);
     }

     public function delete($id)
     {
          return $this->genreRepository->delete($id);
     }

     public function getWithBooks()
     {
          return $this->genreRepository->getWithBooks();
     }

     public function findBooks($id)
     {
          return $this->genreRepository->findBooks($id);
     }

}
