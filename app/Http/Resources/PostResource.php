<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'author'=>$this->whenLoaded('user', $this->user->name),
            'title'=>$this->title,
            'content'=>$this->content
        ];
    }
}
