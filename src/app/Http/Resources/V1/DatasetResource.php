<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\JsonResource;

class DatasetResource extends JsonResource
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
            'file'              =>  $this->file,
            'title'             =>  $this->title,
            'year'              =>  $this->year,
            'abstract'          =>  $this->abstract,
            'downloadCount'     =>  $this->downloadCount,
            'journal'           =>  $this->journal,
            'authors'           =>  $this->authors,
            'keywords'          =>  $this->keywords,
        ];
    }
}
