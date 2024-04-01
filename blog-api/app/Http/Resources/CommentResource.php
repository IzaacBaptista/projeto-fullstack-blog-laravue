<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CommentResource extends JsonResource
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
            'id_article' => $this->id_article,
            'id_user' => $this->id_user,
            'name' => $this->name,
            'email' => $this->email,
            'comment' => $this->comment
        ];
    }
}
