<?php

namespace App\Http\Resources\V1;

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
          'id'              =>  $this->id,
          'avatar'          =>  $this->avatar,
          'firstName'       =>  $this->firstName,
          'middleName'      =>  $this->middleName,
          'lastName'        =>  $this->lastName,
          'biography'       =>  $this->biography,
          'articles'        =>  $this->articles()->where('verified',1)->get(),
          'datasets'        =>  $this->datasets()->where('verified',1)->get(),
          'collaborations'  =>  $this->collaborations()->where('verified',1)->get(),
          'projects'        =>  $this->projects()->where('verified',1)->get(),
        ];
    }
}
