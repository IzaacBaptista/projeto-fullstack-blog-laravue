<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ArticleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request):array
    {
        return [
            'id' => $this->id,
            'id_category' => $this->id_category,
            'category' => new CategoryResource($this->whenLoaded('category')),
            'id_author' => $this->id_author,
            'author' => new AuthorResource($this->whenLoaded('author')),
            'data' => $this->data,
            'time_read' => $this->time_read,
            'title' => $this->title,
            'content' => $this->content,
            'blockquote' => $this->blockquote,
            'image' => $this->image
        ];
    }
}
