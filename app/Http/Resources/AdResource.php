<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AdResource extends JsonResource
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
            'image1' => $this->image1,
            'url1' => $this->url1,
            'image2' => $this->image2,
            'url2' => $this->url2,
            'image3' => $this->image3,
            'url3' => $this->url3,
        ];
    }
}
