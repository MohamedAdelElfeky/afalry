<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
/**
 * create br eng mohamed Adel Elfeky 
 * email : mohamedelfeky1995@gmail.com 
 * phone : +201010152694
 */
class ProductWAttCommentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'product' => new ProductResource($request),
            'product_attribute' =>  $this->productAttributes ? ProductAttributeResource::collection($this->productAttributes) : null,
            'comment' => $this->comments ? CommentResource::collection($this->comments) : null,
        ];
    }
}
