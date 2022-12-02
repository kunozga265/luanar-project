<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ProjectCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'projects'   =>  ProjectResource::collection($this->collection),
            'meta'      =>  [
                'currentPage'       =>  $this->currentPage(),
                'total'             =>  $this->total(),
                'perPage'           =>  $this->perPage(),
                'count'             =>  $this->count(),
                'hasMorePages'      =>  $this->hasMorePages(),
                'lastPage'          =>  $this->lastPage()
            ]
        ];
    }
}
