<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UpcomingResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
            "id"=>$this->id,
            "date"=>date('d M,Y', strtotime($this->date)),
            "time"=>date('h:i A', strtotime($this->time)),
            "course"=>$this->course->name,
            "status"=>$this->status ? "true" : "false",
            "class_type"=>$this->class_type
        ];
    }
}
