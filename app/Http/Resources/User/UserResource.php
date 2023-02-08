<?php

namespace App\Http\Resources\User;

use App\Http\Resources\Category\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id'=>$this->id,
            'title'=>$this->title,
            'address'=>$this->address,
            'map'=>$this->map,
            'phone'=>$this->phone,
            'website'=>$this->website,
            'category'=>new CategoryResource(Category::find($this->category)),
            'status'=>$this->status,
        ];
    }
}
