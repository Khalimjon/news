<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;


use App\Events\NewsCreated;
use App\Listeners\SendEmailToUser;
use App\Listeners\SendNotificationToAdmin;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        // Mapping of events to listeners
        'App\Events\NewsCreated' => [
            'App\Listeners\SendNewsNotification',
        ],

        NewsCreated::class => [
            SendEmailToUser::class,
            SendNotificationToAdmin::class
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}

