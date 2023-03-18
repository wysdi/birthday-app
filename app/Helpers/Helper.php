<?php


namespace App\Helpers;


use App\Models\User;
use Carbon\Carbon;

class Helper
{
    public static function getDelayFromSchedule(User $user, Carbon $carbon){

        $now = $carbon->setTimezone($user->location);
//                set schedule send at 9 AM
        $scheduled = Carbon::parse($user->birthday)->setTimezone($user->location)
            ->setDay($now->day)
            ->setYear($now->year)
            ->setHour(9)
        ;
        // Check if current hour still not pass 9
        if (!$scheduled->isPast()) {
            return $scheduled->diffInMinutes($now);
        }
        return false;
//                    Use delay to send an email at specific times

    }
}
