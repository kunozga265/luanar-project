<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\JsonResource;

class ProjectResource extends JsonResource
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
            'id'            =>  $this->id,
            'photo'         =>  $this->photo,
            'name'          =>  $this->name,
            'description'   =>  $this->description,
            'duration'      =>  $this->duration,
            'startDate'     =>  $this->startDate,
            'endDate'       =>  $this->endDate,
            'currency'      =>  $this->currency,
            'budget'        =>  $this->budget,
            'verified'      =>  $this->verified,
            'author'        =>  $this->author,
            'donor'         =>  $this->donor,
            'collaborators' =>  $this->collaborators,
            'deliverables'  =>  json_decode($this->deliverables),
        ];
    }
}
