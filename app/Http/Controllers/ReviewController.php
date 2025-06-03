<?php

namespace App\Http\Controllers;

use App\Http\Requests\authorstoreRequest;
use App\Http\Requests\AuthorUpdateRequest;
use App\Http\Requests\GenreUpdateRequest;
use App\Http\Requests\ReviewStoreRequest;
use App\Http\Requests\ReviewUpdateRequest;
use App\Http\Resources\ReviewResource;
use App\Services\ReviewService;
use Illuminate\Database\Eloquent\ModelNotFoundException;



class ReviewController extends Controller
{
    private ReviewService $reviewService;
    public function __construct(ReviewService $reviewService)
    {
        $this->reviewService = $reviewService;
    }

    public function get()
    {
        $authors = $this->reviewService->get();
        return ReviewResource::collection($authors);
    }

    public function details($id)
    {
        try {
            $genre = $this->reviewService->details($id);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Review not found'], 404);
        }
        return new ReviewResource($genre);
    }

    public function store(ReviewStoreRequest $request)
    {
        $data = $request->validated();
        $genre = $this->reviewService->store($data);
        return new ReviewResource($genre);

    }

    public function update(int $id, ReviewUpdateRequest $request)
    {
        $data = $request->validated();
        try {
            $genre = $this->reviewService->update($id, $data);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Review not found'], 404);
        }
        return new ReviewResource($genre);

    }

    public function delete(int $id)
    {
        try {
            $genre = $this->reviewService->delete($id);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Review not found'], 404);
        }
        return new ReviewResource($genre);
    }

}
