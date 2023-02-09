<?php

namespace App\Repositories;

use App\Models\Advert;
use App\Models\Boost;
use Carbon\Carbon;
use Illuminate\Http\Exceptions\HttpResponseException;

class AdvertRepository
{


    public static function find(int $id, bool $incrementSeen = false): null|object
    {
        $advert = Advert::isActive()->find($id);
        if(!$advert){
            return StatusRepository::response(null,'advert_not_exist',404);
        }


        $incrementSeen ? $advert->update(['seen' => $advert->seen + 1]) : null;
        return $advert;
    }

    public static function findActive(int $id): object
    {
        $boost = Boost::whereAdvert($id)
            ->where('started_at', '<=', Carbon::now())
            ->where('expired_at', '>=', Carbon::now())
            ->isActive()->first();

        return $boost;
    }
}
