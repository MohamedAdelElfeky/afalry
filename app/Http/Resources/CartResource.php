<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CartResource extends JsonResource
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
            'user' => new UserResource($this->whenLoaded('user')),
            'product' => new ProductResource($this->whenLoaded('product')),
            'quantity' => $this->quantity,
            'price' => $this->price,
            // 'order_id' => $this->order_id,
            'created_at' => Carbon::parse($this->created_at)->format('Y-m-d'),
        ];
    }

    
    public  function formattedCreatedAt(): string
    {
        return Carbon::parse($this->created_at)->format('Y-m-d');
    }
}
