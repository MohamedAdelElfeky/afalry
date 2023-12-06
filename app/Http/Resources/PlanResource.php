<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PlanResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'des' => $this->des,
            'ranking' => $this->ranking,
            'days' => $this->days,
            'monthly_price' => $this->monthly_price,
            'yearly_price' => $this->yearly_price,
            'if_free' => $this->if_free,
        ];
    }
}
