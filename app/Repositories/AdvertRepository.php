<?php

namespace App\Repositories;

use App\Models\Advert;
use App\Models\Boost;
use Carbon\Carbon;

class AdvertRepository
{


    public static function find($id, $incrementSeen = false)
    {
        $advert = Advert::isActive()->find($id);
        $incrementSeen ? $advert->update(['seen' => $advert->seen + 1]) : null;
        return $advert;
    }

    public static function findActive($id)
    {
        $boost = Boost::whereAdvert($id)
            ->where('started_at', '<=', Carbon::now())
            ->where('expired_at', '>=', Carbon::now())
            ->isActive()->first();

        return $boost;
    }
}
