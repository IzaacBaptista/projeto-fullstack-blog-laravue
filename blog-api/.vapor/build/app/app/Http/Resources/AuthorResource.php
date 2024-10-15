<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AuthorResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'id_user' => $this->id_user,
            'name' => $this->name,
            'surname' => $this->surname,
            'about' => $this->about,
            'image' => $this->image,
            'linkedin' => $this->linkedin,
            'github' => $this->github,
            'instagram' => $this->instagram,
            'contact' => $this->contact
        ];
    }
}
