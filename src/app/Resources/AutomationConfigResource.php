<?php


namespace App\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AutomationConfigResource extends JsonResource
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
            'name' => $this->name,
            'type' => $this->type,
            'detection_profile_id' => $this->detection_profile_id
        ];
    }
}
