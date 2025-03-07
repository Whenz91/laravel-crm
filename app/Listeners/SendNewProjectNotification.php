<?php

namespace App\Listeners;

use App\Events\ProjectCreated;
use App\Models\Client;
use App\Models\User;
use App\Notifications\ProjectCreated as NotificationsProjectCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendNewProjectNotification implements ShouldQueue
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(ProjectCreated $event): void
    {
        if(auth()->user()->id != $event->project->user_id) {
            $user = User::find($event->project->user_id);
            $user->notify(new NotificationsProjectCreated($event->project));
        }

        $client = Client::find($event->project->client_id);
        $client->notify(new NotificationsProjectCreated($event->project));
    }
}
