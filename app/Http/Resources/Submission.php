<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Submission extends JsonResource
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
            'file' => $this->file,
            'point' => $this->point,
            'result' => $this->result,
            'user' => User::make($this->user),

        ];
    }
}
