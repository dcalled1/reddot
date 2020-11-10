<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CommentResource extends JsonResource {

    public function toArray($request) {
        return [
            'author_name' => $this->author->getName(),
            'author_email' => $this->author->getEmail(),
            'content' => $this->getContent(),
        ];
    }
}