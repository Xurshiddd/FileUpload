<?php

namespace Xurshiddd\LaravelAttachment;

use Illuminate\Support\ServiceProvider;

class AttachmentServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');

        $this->publishes([
            __DIR__.'/../database/migrations' => database_path('migrations'),
        ], 'migrations');
    }
}
