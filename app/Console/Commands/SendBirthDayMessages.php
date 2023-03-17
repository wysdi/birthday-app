<?php

namespace App\Console\Commands;

use App\Jobs\SendBirthdayEmail;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Console\Command;

class SendBirthDayMessages extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:birthday-messages';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send birthday messages to users at 9am on their local time';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        //
        $users = User::all();


        foreach ($users as $user) {
            $birthday = Carbon::parse($user->birthday);
            $now = Carbon::now()->setTimezone($user->location);



            if ($birthday->day == $now->day && $birthday->month == $now->month) {
//                set schedule send at 9 AM
                $scheduled = $birthday->setTimezone($user->location)
                    ->setDay($now->day)
                    ->setYear($now->year)
                    ->setHour(9)
                ;
                // Check if current hour still not pass 9
                if (!$scheduled->isPast()){
                    $delay = $scheduled->diffInMinutes($now);
//                    Use delay to send an email at specific times
                    SendBirthdayEmail::dispatch($user)->delay($delay);
                }

            }
        }
    }
}
