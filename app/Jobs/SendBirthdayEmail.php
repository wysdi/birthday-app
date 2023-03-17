<?php

namespace App\Jobs;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use \Illuminate\Support\Facades\Http;

class SendBirthdayEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $user;

    /**
     * Create a new job instance.
     *
     * @param  User  $user
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        //
        $endpoint = 'https://email-service.digitalenvision.com.au/send-email';
        $response = Http::post($endpoint, [
            'email'=>'wynsudiarta87@gmail.com',
            'message' => "Hey, {$this->user['full_name']} it’s your birthday",
        ]);
        if ($response->ok()) {
            echo "Birthday message sent to {$this->user['full_name']}\n";
        } else {
            echo "Error sending birthday message to {$this->user['full_name']}\n";
            \Illuminate\Support\Facades\Cache::add("unsent_message_{$this->user['full_name']}", now());
        }
    }
}
