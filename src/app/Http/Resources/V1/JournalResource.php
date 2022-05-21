<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\JsonResource;

class JournalResource extends JsonResource
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
            'id'                =>  $this->id,
            'title'             =>  $this->title,
            'volume'            =>  $this->volume,
            'articles'          =>  $this->articles,
            'datasets'          =>  $this->datasets,
        ];
    }
}
