<?php

namespace Xurshid\Attachment\Events;

use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Http\UploadedFile;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class AttachmentEvent
{
    use Dispatchable, SerializesModels;

    public function __construct(
        public array|UploadedFile $files,
        public MorphOne|MorphMany|MorphToMany|null $relation = null,
        public string $path = 'files',
        public ?string $identifier = null
    ) {}
}
