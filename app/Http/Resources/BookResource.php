<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BookResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'synopsis' => $this->synopsis,
            'title' => $this->title,
            'genre' => new GenreResource($this->whenLoaded('genre')),
            'author' => new AuthorResource($this->whenLoaded('author')),
            'reviews' => ReviewResource::collection($this->whenLoaded('reviews'))
        ];
    }
}
