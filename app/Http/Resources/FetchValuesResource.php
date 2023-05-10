<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\OperatorResource;
use App\Http\Resources\EntityResource;

class FetchValuesResource extends JsonResource
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
            'user' => OperatorResource::make($this->whenLoaded('user')),
            'entity' => EntityResource::make($this->whenLoaded('entity')),
            'values' => json_decode($this->values)
        ];
    }
}
