<?php

namespace App\Repositories;

use App\Models\Boost;
use Carbon\Carbon;

class BoostRepository
{
    public static function findActive(int $id) : null|object
    {
        $boost = Boost::whereAdvert($id)
            ->where('started_at', '<=', Carbon::now())
            ->where('expired_at', '>=', Carbon::now())
            ->isActive()->first();

        return $boost;
    }
}
