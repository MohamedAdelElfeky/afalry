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
            'product_erp' => $this->product_erp,
            'name' => $this->name,
            'description' => $this->description,
            'price' => $this->price,
            'balance' => $this->balance,
            'category' => $this->whenLoaded('category', function () {
                return new CategoryResource($this->category);
            }),
            'status' => $this->status,
            'type_rate' => $this->type_rate,
            'value_rate' => $this->value_rate,
            'images' => $this->images ? ImageResource::collection($this->images) : null,
            'product_attribute' =>  $this->productAttributes ? ProductAttributeResource::collection($this->productAttributes) : null,
            'comment' => $this->comments ? CommentResource::collection($this->comments) : null,
        ];
    }
}
