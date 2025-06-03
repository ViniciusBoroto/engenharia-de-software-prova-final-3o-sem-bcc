<?php
namespace App\Repositories;

use App\Models\Book;

class BookRepository
{
     public function get()
     {
          return Book::all();
     }

     public function details(int $id)
     {
          return Book::findOrFail($id);
     }

     public function store(array $data)
     {
          return Book::create($data);
     }

     public function update(int $id, array $data)
     {
          $review = $this->details($id);
          $review->update($data);
          return $review;
     }

     public function delete(int $id)
     {
          $review = $this->details($id);
          $review->delete();
          return $review;
     }

     public function findReviews($id)
     {
          $book = Book::findOrFail($id);
          return $book->reviews;
     }

     public function getAllDetailed()
     {
          return Book::with(['reviews', 'author', 'genre'])->get();
     }

}