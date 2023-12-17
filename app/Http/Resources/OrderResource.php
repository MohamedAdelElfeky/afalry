<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'user' => new UserResource($this->user),
            'customer_name' => $this->customer_name,
            'district' => $this->district,
            'postal_code' =>  $this->postal_code,
            'email' => $this->email,
            'phone_number' => $this->phone_number,
            'extra_phone_number' =>  $this->extra_phone_number,
            'floor_no' => $this->floor_no,
            'order_total' => $this->order_total,

            'items' => OrderItemResource::collection($this->items),
            'created_at' => $this->created_at->toDateTimeString(),
        ];
    }
}
