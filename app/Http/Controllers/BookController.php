<?php

namespace App\Http\Controllers;

use App\Http\Requests\authorstoreRequest;
use App\Http\Requests\BookStoreRequest;
use App\Http\Requests\BookUpdateRequest;
use App\Http\Resources\BookResource;
use App\Http\Resources\ReviewResource;
use App\Services\BookService;
use Illuminate\Database\Eloquent\ModelNotFoundException;



class BookController extends Controller
{
    private BookService $bookService;
    public function __construct(BookService $bookService)
    {
        $this->bookService = $bookService;
    }

    public function get()
    {
        $authors = $this->bookService->get();
        return BookResource::collection($authors);
    }

    public function details($id)
    {
        try {
            $genre = $this->bookService->details($id);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Book not found'], 404);
        }
        return new BookResource($genre);
    }

    public function store(BookStoreRequest $request)
    {
        $data = $request->validated();
        $genre = $this->bookService->store($data);
        return new BookResource($genre);

    }

    public function update(int $id, BookUpdateRequest $request)
    {
        $data = $request->validated();
        try {
            $genre = $this->bookService->update($id, $data);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Book not found'], 404);
        }
        return new BookResource($genre);

    }

    public function delete(int $id)
    {
        try {
            $genre = $this->bookService->delete($id);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Book not found'], 404);
        }
        return new BookResource($genre);
    }

    public function findReviews(int $id)
    {
        try {
            $reviews = $this->bookService->findReviews($id);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Book not found'], 404);
        }
        return ReviewResource::collection($reviews);
    }

    public function allDetailed()
    {
        $books = $this->bookService->getAllDetailed();
        return BookResource::collection($books);
    }
}
