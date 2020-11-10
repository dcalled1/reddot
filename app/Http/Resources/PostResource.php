<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource {

    public function toArray($request) {
        return [
            'author_name' => $this->author->getName(),
            'author_email' => $this->author->getEmail(),
            'title' => $this->getTitle(),
            'content' => $this->getContent(),
            'comments' => CommentResource::collection($this->comments),
        ];
    }
}