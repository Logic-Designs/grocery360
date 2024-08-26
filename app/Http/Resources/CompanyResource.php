<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CompanyResource extends JsonResource
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
            'title' => $this->title,
            'description' => $this->description,
            'category' => new CompanyCategoryResource($this->whenLoaded('category')),
            'image' => $this->image,
            'latest_items' => CompanyItemResource::collection($this->whenLoaded('latestItems')),
            'new_launches' => CompanyItemResource::collection($this->whenLoaded('newLaunches')),
            'products' => CompanyItemResource::collection($this->whenLoaded('products')),
        ];
    }
}
