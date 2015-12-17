<?php

namespace App\cvepdb\clients\Events;

use App\Events\Event;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

use Mail;

class Users extends Event
{
    use SerializesModels;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct()
    {
        // stuff
    }

    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        return [];
    }

    public function handle() {
        Mail::send('cvepdb.api.emails.test', ['user' => 'test test'], function ($m) {
            $m->from('contact@cavaencoreparlerdebits.fr', 'Your Application');
            $m->to('antoine@cvepdb.fr', 'test test')->subject('Your Reminder!');
        });
    }
}
