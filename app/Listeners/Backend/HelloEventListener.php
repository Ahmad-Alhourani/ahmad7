<?php
namespace App\Listeners\Backend;

/**
 * Class HelloEventListener.
 */
/**
 * Class HelloCreated.
 */
class HelloEventListener
{
    /**
     * @param $event
     */
    public function onCreated($event)
    {
        \Log::info('Hello Created');
    }

    /**
     * @param $event
     */
    public function onUpdated($event)
    {
        \Log::info('Hello  Updated');
    }

    /**
     * @param $event
     */
    public function onDeleted($event)
    {
        \Log::info('Hello Deleted');
    }

    /**
     * Register the listeners for the subscriber.
     *
     * @param \Illuminate\Events\Dispatcher $events
     */
    public function subscribe($events)
    {
        $events->listen(
            \App\Events\Backend\Hello\HelloCreated::class,
            'App\Listeners\Backend\HelloEventListener@onCreated'
        );

        $events->listen(
            \App\Events\Backend\Hello\HelloUpdated::class,
            'App\Listeners\Backend\HelloEventListener@onUpdated'
        );

        $events->listen(
            \App\Events\Backend\Hello\HelloDeleted::class,
            'App\Listeners\Backend\HelloEventListener@onDeleted'
        );
    }
}
