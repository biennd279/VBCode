<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class User extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'user' => $this->user,
            'name' => $this->name,
            'email' => $this->email,
//            'date_of_birth' => $this->date_of_birth,
            'cumulative_score' => $this->cumulative_score,
//            'role' => $this->whenLoaded('role')->role
        ];
    }
}
