<?php
namespace App\Services;

use App\Models\Genre;
use App\Repositories\UserRepository;

class UserService
{
     private UserRepository $userRepository;
     public function __construct(UserRepository $userRepository)
     {
          $this->userRepository = $userRepository;
     }

     public function get()
     {
          return $this->userRepository->get();
     }

     public function details(int $id)
     {
          return $this->userRepository->details($id);
     }

     public function store(array $data)
     {
          return $this->userRepository->store($data);
     }

     public function update(int $id, array $data)
     {
          return $this->userRepository->update($id, $data);
     }

     public function delete($id)
     {
          return $this->userRepository->delete($id);
     }

     public function findReviews($id)
     {
          return $this->userRepository->findReviews($id);
     }

}
