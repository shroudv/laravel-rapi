<?php

namespace App\Http\Resources\Advert;

use App\Http\Resources\Category\CategoryResource;
use App\Models\Boost;
use App\Models\Category;
use App\Repositories\AdvertRepository;
use App\Repositories\BoostRepository;
use Illuminate\Http\Resources\Json\JsonResource;

class AdvertResource extends JsonResource
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
            'content'=>$this->content,
            'seen'=>$this->seen,
            'salary'=>$this->salary,
            'boosted'=>BoostRepository::findActive($this->id) ? true : false,
            'category'=>new CategoryResource(Category::find($this->category)),
            'status'=>$this->status,
        ];
    }
}
