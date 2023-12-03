<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * create br eng mohamed Adel Elfeky 
 * email : mohamedelfeky1995@gmail.com 
 * phone : +201010152694
 */
class ProductResource extends JsonResource
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
            'product_id' => $this->product_id,
            'name' => $this->name,
            'description' => $this->description,
            'price' => $this->price,
            'balance' => $this->balance,
            'category_id' => $this->category_id,
            'status' => $this->status,
            'type_rate' => $this->type_rate,
            'value_rate' => $this->value_rate,
            'images' => $this->images ? ImageResource::collection($this->images) : null,
        ];
    }
}
