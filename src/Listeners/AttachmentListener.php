<?php

namespace Xurshiddd\LaravelAttachment\Listeners;

use Xurshiddd\LaravelAttachment\Events\AttachmentEvent;
use Xurshiddd\LaravelAttachment\Services\AttachmentService;
use Illuminate\Support\Arr;

class AttachmentListener
{
    public function __construct(protected AttachmentService $service) {}

    public function handle(AttachmentEvent $event): void
    {
        $this->service->uploadFile(
            Arr::wrap($event->files),
            $event->relation,
            $event->path,
            $event->identifier
        );
    }
}
