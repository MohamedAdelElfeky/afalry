<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;

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
        $priceAfterDiscount = null;

        switch ($this->type_discount) {
            case 'value':
                // Apply discount based on the 'discount' attribute
                $discountedPrice = $this->price - $this->discount;
                $priceAfterDiscount = max($discountedPrice, 0); // Ensure the price_after_discount is non-negative
                break;

            case 'present':
                $discountPercentage = $this->discount;

                // Calculate the price after applying the percentage discount
                $priceAfterDiscount = $this->price - ($this->price * $discountPercentage / 100);
                $priceAfterDiscount = max($priceAfterDiscount, 0);
                break;
            default:

                break;
        }

        return [
            'id' => $this->id,
            'product_erp' => $this->product_erp,
            'name' => $this->name,
            'description' => $this->description,
            'price' => $this->price,
            'discount' => $this->discount,
            'type_discount' => $this->type_discount,
            'price_after_discount' => $priceAfterDiscount,
            'balance' => $this->balance,
            'category' => $this->whenLoaded('category', function () {
                return new CategoryResource($this->category);
            }),
            'status' => $this->status,
            'images' => $this->images ? ImageResource::collection($this->images) : null,
            'product_attribute' =>  $this->productAttributes ? ProductAttributeResource::collection($this->productAttributes) : null,
            'comment' => $this->comments ? CommentResource::collection($this->comments) : null,
            'like' => $this->likes->where('user_id', Auth::id())->where('likable_id', $this->id)->count() > 0,

        ];
    }
}
