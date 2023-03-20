<?php

namespace App\Console\Commands;

use App\Helpers\Helper;
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
        $now = Carbon::now();

        foreach ($users as $user) {
            if ($user->isBirthday()) {
                $delay = Helper::getDelayFromSchedule($user, Carbon::now());
                if ($delay) {
                    SendBirthdayEmail::dispatch($user)->delay($now->addMinutes($delay));
                }
            }
        }
    }
}
