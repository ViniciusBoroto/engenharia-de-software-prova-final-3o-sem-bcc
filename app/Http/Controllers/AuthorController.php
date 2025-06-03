<?php

namespace App\Http\Controllers;

use App\Http\Requests\authorstoreRequest;
use App\Http\Requests\AuthorUpdateRequest;
use App\Http\Requests\GenreUpdateRequest;
use App\Http\Resources\AuthorResource;
use App\Http\Resources\BookResource;
use Illuminate\Http\Request;

use App\Http\Resources\ProductResource;
use App\Services\AuthorService;
use Illuminate\Database\Eloquent\ModelNotFoundException;



class AuthorController extends Controller
{
    private AuthorService $authorService;
    public function __construct(AuthorService $authorService)
    {
        $this->authorService = $authorService;
    }

    public function get()
    {
        $authors = $this->authorService->get();
        return AuthorResource::collection($authors);
    }

    public function details($id)
    {
        try {
            $genre = $this->authorService->details($id);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Author not found'], 404);
        }
        return new AuthorResource($genre);
    }

    public function store(AuthorStoreRequest $request)
    {
        $data = $request->validated();
        $genre = $this->authorService->store($data);
        return new AuthorResource($genre);

    }

    public function update(int $id, AuthorUpdateRequest $request)
    {
        $data = $request->validated();
        try {
            $genre = $this->authorService->update($id, $data);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Author not found'], 404);
        }
        return new AuthorResource($genre);

    }

    public function delete(int $id)
    {
        try {
            $genre = $this->authorService->delete($id);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Author not found'], 404);
        }
        return new AuthorResource($genre);
    }

    public function getWithBooks()
    {
        $authors = $this->authorService->getWithBooks();
        return AuthorResource::collection($authors);
    }

    public function findBooks(int $id)
    {
        try {
            $books = $this->authorService->findBooks($id);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Author not found'], 404);
        }
        return BookResource::collection($books);
    }
}
